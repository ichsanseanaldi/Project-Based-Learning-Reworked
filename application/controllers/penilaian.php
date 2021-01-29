<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penilaian extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		$this->load->model('M_penilaian');
	}

	public function index()
	{
		$arg['project']=$this->M_penilaian->getSingleProject($this->session->id_project);
		$arg['tahap']=$this->M_penilaian->getSingleTahap($this->session->id_tahap);
		$arg['rejoice']=$this->M_penilaian->getRejoice($this->session->id_tahap);
		$this->load->view('v_penilaian',$arg);
	}

	public function Nilai()
	{
		$ids['id_kelompok'] = $this->input->post('id_kelompok');
		$ids['id_tahap'] = $this->session->id_tahap;

		$arg['nilai']=$this->input->post('nilai');
		$this->M_penilaian->updateNilai($ids,$arg);
		redirect('penilaian');


	}

}
?>
