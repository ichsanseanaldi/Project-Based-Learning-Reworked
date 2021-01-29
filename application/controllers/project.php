<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_project');
		$this->load->library('form_validation');
	}

	public function index()
	{
    	$id_project = $this->session->id_project;
		$data= $this->M_project->getById($id_project);

   		if(!$data->isPertanyaanPendahuluan){
      		redirect('pertanyaanPendahuluan');

		}

		else {

			$id_project=$this->session->id_project;
			$args['project']=$this->M_project->getById($id_project);
			$args['data']=$this->M_project->getTahapan($id_project);

      		$this->load->view('v_project',$args);
    	}
	}

	public function addTahap()
	{
		$this->load->view('v_addTahap');
	}

	public function addTpross()
	{
		$config['upload_path']='./upload/';
		$config['allowed_types']="*";
		$config['encrypt_name']=TRUE;
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('file')){
			print_r($this->upload->display_errors());
			die();

		}else{
			$data['id_project']=$this->session->id_project;
			$data['nama_tahap']=$this->input->post('nama_tahap');
			$data['materi']=$this->upload->data('file_name');
			$data['tugas']=$this->input->post('tugas');
			$data['keterangan']=$this->input->post('deskripsi');

			$this->form_validation->set_rules('nama_tahap','nama_tahap','trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('tugas','tugas','trim|required|min_length[5]');
			$this->form_validation->set_rules('deskripsi','deskripsi','trim|required|min_length[5]');

			$this->form_validation->set_message('required', 'Tolong Field ini diisi !');
			$this->form_validation->set_message('min_length', 'Isi Field Minimal 5 Huruf !');


			if ($this->form_validation->run() != FALSE) {
				$this->M_project->addTahapan($data);
				redirect('project');
			}
			else{
				$this->load->view('v_addTahap');
			}
		}
	}

	public function goTahap($id)
	{
		$this->session->id_tahap = $id;
		$arg['data']=$this->M_project->getsingleTahap($id);
		$this->load->view('v_tahap',$arg);
	}

	public function goNilai($id){
		$this->session->id_tahap = $id;
		redirect('penilaian');
	}

	public function golistKelompok()
	{
		$arg['kelompok']=$this->M_project->getKelompok($this->session->id_project);
		$this->load->view('v_lKelompok',$arg);
	}

	public function goaddKelompok()
	{
		$arg['id_project']=$this->session->id_project;
		$this->load->view('v_addKelompok');
	}


	function username_check_blank($str){

		$pattern = '/ /';
		$result = preg_match($pattern, $str);

		if ($result){
			$this->form_validation->set_message('username_check_blank', 'Field tidak boleh memakai spasi');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function addKelompok()
	{
	$data['id_project']=$this->session->id_project;
	$data['username']=$this->input->post('username');
	$data['nama_kelompok']=$this->input->post('namaKelompok');
	$data['password']=$this->input->post('password');

	$this->form_validation->set_rules('username','username','trim|required|alpha_numeric|min_length[1]|max_length[25]|callback_username_check_blank');
	$this->form_validation->set_rules('password','password','trim|required|min_length[5]|max_length[25]|callback_username_check_blank');
	$this->form_validation->set_rules('namaKelompok','namaKelompok','trim|required|min_length[1]|max_length[25]');

	$this->form_validation->set_message('required', 'Tolong Field ini diisi !');
	$this->form_validation->set_message('min_length', 'Isi Field Minimal 1 Huruf !');
	$this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf !');



		if ($this->form_validation->run() != FALSE) {
			$this->M_project->addKelompok($data);
			redirect('project/golistKelompok');
			// redirect('project/goaddAnggota',);
		}
		else {
			$this->load->view('v_addKelompok');
		}
	}

	public function goaddAnggota($id)
	{
		$this->session->id_kelompok=$id;
		$this->load->view('v_addAnggota');
	}
	public function addAnggota(){
		$nama_anggota=$this->input->post('nama_anggota');
		// print_r($nama_anggota);
		$id=$this->session->id_kelompok;
		foreach ($nama_anggota as $key){
			$data['id_kelompok']=$id;
			$data['nama_anggota']=$key;
			$this->M_project->addAnggota($data);
		}

		redirect('project/golistKelompok');
	}

	public function goseeKelompok($id)
	{
		$arg['kelompok']=$this->M_project->getsingleKelompok($id);
		$arg['anggota']=$this->M_project->getAnggota($id);
		$this->load->view('v_seeKelompok',$arg);

	}

	public function deleteTahap($id)
	{
		$tahap=$this->M_project->getsingleTahap($id);
		$file_name=$tahap->materi;
		$path='./upload/';
		unlink($path.$file_name);
		$kelompok=$this->M_project->getJawabanTahap($id);
		foreach ($kelompok as $key) {
			$file_name = $key->jawaban;
			unlink($path.$file_name);
		}
		$this->M_project->deleteTahap($id);
		redirect('project');
	}


	public function deleteProject($id)
	{
		$tahap=$this->M_project->getTahapan($id);
		$path='./upload/';
		foreach ($tahap as $key) {
			$file_name=$key->materi;
			unlink($path.$file_name);
			$JP=$this->M_project->getJawabanTahap($key->id_tahap);
				foreach ($JP as $kucai) {
					$file_name=$kucai->jawaban;
					unlink($path.$file_name);
				}
		}
		$this->M_project->deleteProject($id);
		redirect('guru');
	}

	public function updateProject()
	{
		$args['project']=$this->M_project->getById($this->session->id_project);
		$this->load->view('v_updateProject',$args);
	}

	public function updateProjectPross()
	{
		$id= $this->session->id_project;
		$data['nama_project'] = $this->input->post('nama_project');
		$data['kelas'] = $this->input->post('kelas');
		$data['keterangan_project'] = $this->input->post('keterangan_project');
		$this->M_project->updateProject($id,$data);
		redirect('project');
	}

	public function updateTahap()
	{
		$args['tahap']=$this->M_project->getsingleTahap($this->session->id_tahap);
		$this->load->view('v_updateTahap',$args);
	}

	public function updateTPross()
	{
		$tahap = $this->M_project->getsingleTahap($this->session->id_tahap);
		$config['upload_path']='./upload/';
		$config['allowed_types']="*";
		$config['encrypt_name']=TRUE;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('file')){
			unlink('./upload/'.$tahap->materi);
			$data['materi']=$this->upload->data('file_name');
		}
			$data['nama_tahap']=$this->input->post('nama_tahap');
			$data['tugas']=$this->input->post('tugas');
			$data['keterangan']=$this->input->post('deskripsi');
			$this->M_project->updateTahap($this->session->id_tahap,$data);
			redirect('project/goTahap/'.$this->session->id_tahap);
	}

	public function deleteKelompok($id){

		$data = $this->M_project->getJawabanTahapByIdKelompok($id);
		$path = './upload/';
		foreach ($data as $key) {
			unlink($path.$key->jawaban);
		}
		$this->M_project->deleteKelompok($id);
		redirect('project/golistKelompok');

	}


}
