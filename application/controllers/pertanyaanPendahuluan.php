<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PertanyaanPendahuluan extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		$this->load->model('M_PD');
	}

	public function index()
	{
		$id_project = $this->session->id_project;
		$data=$this->M_PD->getByIdProject($id_project);
		$args['data']=$data;
		$data1=$this->M_PD->getProject($id_project);
		$args['project']=$data1;
    	$this->load->view('v_pertanyaanPendahuluan',$args);
	}

	public function addSP()
	{
		$this->load->view('v_addSP');
	}

	public function addSPPRCS()
	{
		$soal = $this->input->post('soal');
		$id_project= $this->session->id_project;

		foreach($soal as $key){
			$data['id_project']=$id_project;
			$data['soal']=$key;
			$this->M_PD->addRecord($data);
		}
		// $data = array('id_project' => $id_project,'soal' => $soal);
		// $this->M_PD->addRecord($data);
		redirect('pertanyaanPendahuluan');
	}
	public function updateStatus()
	{
		$end = array('isPertanyaanPendahuluan' => 'yes');
		$id_project= $this->session->id_project;
		$hasil=$this->M_PD->updateStatus($end,$id_project);
		if ($hasil) {
			redirect('project');
		}else {
			echo "gagal";
		}
	}

	public function goNilai()
	{
		$arg['project']=$this->M_PD->getProject($this->session->id_project);
		$arg['kelompok']=$this->M_PD->getKelompok($this->session->id_project);
		$this->load->view('v_NP',$arg);
	}

	public function goKN($id)
	{
		$data=$this->M_PD->Rejoice($id);
		$arg['rejoice']=$data;
		if($data){
			$this->load->view('v_NPN',$arg);
		}else{
			redirect('pertanyaanPendahuluan/goNilai');

		}
	}

	public function deletePP($id)
	{
		$this->M_PD->deletePP($id);
		redirect('pertanyaanPendahuluan');
	}

	public function justSEE()
	{
		$id_project = $this->session->id_project;
		$data=$this->M_PD->getByIdProject($id_project);
		$args['data']=$data;
		$data1=$this->M_PD->getProject($id_project);
		$args['project']=$data1;
    $this->load->view('v_LpertanyaanPendahuluan',$args);
	}
	public function nilaiPP($id)
	{
		$arg['nilai_PP']=$this->input->post('nilai');
		$this->M_PD->NilaiPP($id,$arg);
		redirect('pertanyaanPendahuluan/goNilai');
	}

}
