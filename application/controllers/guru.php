<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guru extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_guru');
    $this->load->library('form_validation');

	}

	public function index()
	{
    unset($_SESSION['id_project']);
    $id=$this->session->user_id;
    $data=$this->M_guru->getByUserId($id);
    $this->session->id_guru=$data->id_guru;
    $project=$this->M_guru->getProjectByIdGuru($data->id_guru);

    if ($data->isNew == "yes") {
      $this->load->view('v_startGuru');
    }else {
      $args['data']=$data;
      $args['mew']=$project;
      $this->load->view('v_guru',$args);
    }

	}

  public function updateStart(){
    $userId=$this->input->post('id_user');
    $nama = $this->input->post('nama');
    $deskripsi = $this->input->post('deskripsi');

    $this->form_validation->set_rules('nama','nama','trim|required|is_unique[guru.nama]|min_length[1]|max_length[20]');
    $this->form_validation->set_rules('deskripsi','deskripsi','trim|required|min_length[1]|max_length[50]');

    $this->form_validation->set_message('required', 'Tolong Field ini diisi !');
    $this->form_validation->set_message('min_length', 'Isi Field Minimal 5 Huruf !');
    $this->form_validation->set_message('is_unique', 'Nama Guru sudah ada !');

    if ($this->form_validation->run() != FALSE) {
      $data = array('nama' => $nama,'deskripsi'=>$deskripsi,'isNew'=>'no');
      $this->M_guru->updateByUserId($userId,$data);
      redirect('guru');
    }
    else{
      $this->load->view('v_startGuru');
    }
  }

	public function logOut(){
		$this->session->sess_destroy();
		redirect('Welcome');

	}

  public function addProject(){
    $this->load->view('v_addProject');
  }


  public function addProjectPross(){

    $id_guru=$this->session->id_guru;
    $nama_project=$this->input->post('nama_project');
    $kelas = $this->input->post('kelas');
    $keterangan_project = $this->input->post('keterangan_project');

    $this->form_validation->set_rules('nama_project','nama_project','trim|required|is_unique[project.nama_project]|min_length[4]|max_length[25]',
                                      array('min_length' => 'isi field minimal 4 huruf'));
    $this->form_validation->set_rules('kelas','kelas','trim|required|min_length[2]|max_length[25]',
                                      array('min_length' => 'isi field minimal 2 huruf'));
    $this->form_validation->set_rules('keterangan_project','keterangan_project','trim|required|min_length[5]');

    $this->form_validation->set_message('required', 'Tolong Field ini diisi !');
    $this->form_validation->set_message('min_length', 'isi field minimal 5 huruf');
    $this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf !');
    $this->form_validation->set_message('is_unique', 'Nama Project sudah ada !');

    if ($this->form_validation->run() != FALSE) {
      $data = array('id_guru' => $id_guru ,'nama_project' => $nama_project, 'kelas' => $kelas, 'keterangan_project' => $keterangan_project);
      $this->M_guru->addProject($data);
      redirect('guru');
    }
    else{
      $this->load->view('v_addProject');
    }

  }

  public function toProject($id)
  {
    $this->session->id_project=$id;
    redirect('project');
  }


}
