<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$args['data'] = $this->M_admin->getAll();
		$this->load->view('v_admin',$args);
	}
	public function addUser(){

		$this->load->view('v_tambahUser');

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

	public function addUserProcces(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses = $this->input->post('akses');

		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|is_unique[user.username]|min_length[5]|max_length[25]|callback_username_check_blank');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[25]|callback_username_check_blank');

		$this->form_validation->set_message('min_length', 'Isi Field Minimal 5 Huruf !');
		$this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf !');
		$this->form_validation->set_message('is_unique', 'Username Telah Dipakai');

		if ($this->form_validation->run() != FALSE) {
			if($akses == 'admin'){
				$status = 'disable';
			}else{
				$status = 'linkable';
			}
			$args = array('username' => $username , 'password' => $password ,'akses' =>$akses,'status'=>$status);
			$this->M_admin->addRecord($args);
			redirect('admin');

		} else {
			$this->load->view('v_tambahUser');
		}



	}

	public function updateUser($id){
		$args['data']= $this->M_admin->getById($id);
		$this->load->view('v_updateUser',$args);
	}

	public function updateProcess(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		
		
		$this->form_validation->set_rules('username','username','trim|required|alpha_numeric|is_unique[user.username]|min_length[5]|max_length[25]|callback_username_check_blank');
		$this->form_validation->set_rules('password','password','trim|required|min_length[5]|max_length[25]|callback_username_check_blank');

		$this->form_validation->set_message('min_length', 'Isi Field Minimal 5 Huruf !');
		$this->form_validation->set_message('max_length', 'Isi Field Maksimal 25 Huruf !');
		$this->form_validation->set_message('is_unique', 'Username Telah Dipakai');

		if ($this->form_validation->run() != FALSE) {
			$data = array('username' => $username ,'password'=>$password);
			$this->M_admin->updateById($id,$data);
			redirect("admin");
		}
		else{
			$args['data']= $this->M_admin->getById($id);
			$this->load->view('v_updateUser',$args);
		}
		
	}

	public function linkUser($id)
	{
		$data = array('status' =>'linked');
		$this->M_admin->updateById($id,$data);
		$data1 = array('id_user' => $id, 'isNew' =>'yes');

		$this->M_admin->addGuru($data1);
		redirect('admin');
	}

	public function deleteRecord($id)
	{
		$this->M_admin->deleteRecord($id);
		redirect('admin');
	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect('Welcome');



	}

}
