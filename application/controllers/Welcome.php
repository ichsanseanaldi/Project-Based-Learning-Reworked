<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_login');
	}

	public function index()
	{
	if($this->session->logged_in == 0){

		$this->load->view('v_login');
	}else{
		if($this->session->akses == 'admin'){
			redirect('admin');
		}else{
			redirect('guru');
		}
	}

}
	
	function username_check_blank($str){

		$pattern = '/ /';
		$result = preg_match($pattern, $str);

		if ($result){
			$this->form_validation->set_message('username_check_blank', 'Field tidak boleh memakai Spasi !');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function login(){

	$username = $this->input->post('username');
	$password = $this->input->post('password');

	$this->form_validation->set_rules('username','username','trim|required|callback_username_check_blank|max_length[25]');
	$this->form_validation->set_rules('password','password','trim|required|callback_username_check_blank|max_length[25]');

	$this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf !');

		if ($this->form_validation->run() != FALSE) {
			$args = array('username' => $username , 'password' => $password);
			$args1= $this->M_login->getUserPass($args);
			if($args1->akses == 'admin'){
				$this->session->logged_in = 1;
				$this->session->user_id = $args1->id_user;
				$this->session->akses = 'admin';
				redirect('admin');
			}elseif($args1->akses == 'Guru/User'){
				if($args1->status=='linked'){
					$this->session->logged_in = 1;
					$this->session->user_id = $args1->id_user;
					$this->session->akses = 'user';
					redirect('guru');
				}else{
					$error="akun belum aktif (harap hubungi admin)";
					$this->session->set_flashdata('error',$error);
					redirect('welcome');
				}
			}else{
				$error="username atau password salah";
				$this->session->set_tempdata('error',$error,5);
				redirect('welcome');
			}
		}else {
			$this->load->view('v_login');
		}

	}

	public function loginKelompok(){
		$this->load->view('v_loginKelompok');
	}



	public function loginKelompokP()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username','username','trim|required|callback_username_check_blank|max_length[25]');
		$this->form_validation->set_rules('password','password','trim|required|callback_username_check_blank|max_length[25]');
		
		$this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf');

		if ($this->form_validation->run() != FALSE) {

			$args = array('username' => $username , 'password' => $password);
			$args1= $this->M_login->getUserPassK($args);

			if ($args1) {
				$this->session->logged_in = 1;
				$this->session->id_kelompok = $args1->id_kelompok;
				redirect('kelompok');
			}else{
				$error="username atau password salah";
				$this->session->set_flashdata('error',$error);
				redirect('welcome/loginKelompok');
			}
		}else{
			$this->load->view('v_loginKelompok');

		}
	}
}
