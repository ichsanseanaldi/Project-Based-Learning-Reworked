<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelompok extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kelompok');
	}

	public function index()
	{	
		if($this->session->logged_in !=0){
			$id=$this->session->id_kelompok;
			$arg['kelompok']=$this->M_kelompok->getKelompok($id);
			$arg['project']=$this->M_kelompok->getProject($arg['kelompok']->id_project);
			$arg['anggota']=$this->M_kelompok->getAnggota($id);
			$this->session->id_project=$arg['kelompok']->id_project;
			$arg['tahap']=$this->M_kelompok->enlightment($id,$this->session->id_project);
			$this->load->view('v_kelompok',$arg);
		}
		else{
			redirect('welcome/loginKelompok');
		}
		
	}

	public function goPP()
	{
		$arg['PP']=$this->M_kelompok->getPP($this->session->id_project);
		$this->load->view('v_PP',$arg);
	}
	public function addJP()
	{
		$PP = $this->M_kelompok->getPP($this->session->id_project);

		$count=0;
		foreach ($PP as $key) {
			$jawaban=$this->input->post('jawaban['.$count.']');
			$arg['id_pendahuluan']=$key->id_pendahuluan;
			$arg['id_kelompok']=$this->session->id_kelompok;
			$arg['jawaban']=$jawaban;
			$this->M_kelompok->UpdateStatus($this->session->id_kelompok);
			$this->M_kelompok->addJP($arg);
			$count++;
		}
		redirect('kelompok');
	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect('Welcome/loginKelompok');
	}

	public function goTahap($id)
	{

		$this->session->id_tahap=$id;
		$arg['tahap']=$this->M_kelompok->getSingleTahap($id);
		$this->load->view('v_tahapanKelompok',$arg);

	}
	public function addJT()
	{
		$config['upload_path']='./upload/';
		$config['allowed_types']="*";
		$config['encrypt_name']=FALSE;
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('file')){
				print_r($this->upload->display_errors());
				die();
				//$this->load->view('v_addTahap',$error);

		}else{
			$data['id_tahap']=$this->session->id_tahap;
			$data['id_kelompok']=$this->session->id_kelompok;
			$data['jawaban']=$this->upload->data('file_name');
			$data['selesai']='yes';
			$this->M_kelompok->addJT($data);
			redirect('kelompok');
		}
	}

}
