<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {	
	function __constructor(){
		parent::__constructor();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Origin: <origin>");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Request-Method: OPTIONS, POST, GET, PUT, DELETE');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('user_login');
	}

//Functional
	public function registerUser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$email = $this->input->post('email');
		
		if(empty($username)){
			$msg['success'] = 'empty1';
		}else if(empty($password)){
			$msg['success'] = 'empty3';
		}else if(empty($email)){
			$msg['success'] = 'empty2';
		}else if ($password!=$repassword){
				$msg['success']='mismatch';
		}else if (preg_match('/[^a-z_\-0-9]/i', $username)){
				$msg['success']='invalid';
		}else{
			$result=$this->model->isAccountExist();
			
			if ($result){
				$msg['success'] = 'existing';	

			}else{
				$result1=$this->model->register();
				if($result1){
					$msg['success'] = 'added';
				}
				}
			}
		echo json_encode($msg);
	}

	

	public function loginUser(){
		$return=$this->model->login();
		$msg['success'] = false;
		if($return[1]){
			$msg['success'] = true;
			$session_data = array(
				'username' => ($return[0]->user_name),
				'password' => ($return[0]->user_pass),
				'email' => ($return[0]->user_email),
				'usertype' => ($return[0]->user_type),
			);
			$this->session->set_userdata($session_data);			
			$msg['data'] = $this->session->userdata('usertype');
			$msg['user'] = $this->session->userdata('username');				
		}
		echo json_encode($msg);

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}