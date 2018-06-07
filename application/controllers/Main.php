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

	public function index() {
		$this->load->view('user_login');
	}

	public function pending() {
		$this->load->view('acc_pending');
	}

	public function inactive() {
		$this->load->view('acc_inactive');
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
		$_SESSION['lockout'] = 0;
		$return=$this->model->login();
		$msg['success'] = false;
		if($return[1]){
			$msg['success'] = true;
			$session_data = array(
				'id' => ($return[0]->user_id),
				'username' => ($return[0]->user_name),
				'password' => ($return[0]->user_pass),
				'email' => ($return[0]->user_email),
				'usertype' => ($return[0]->user_type),
				'userstatus' => ($return[0]->user_status)
			);
			$this->session->set_userdata($session_data);			
			$msg['data'] = $this->session->userdata('usertype');
			$msg['user'] = $this->session->userdata('username');
			$msg['status'] = $this->session->userdata('userstatus');
		}
		$msg['message'] = $return[0];
		$msg['lock'] = $_SESSION['lockout'];		
		echo json_encode($msg);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}


	public function locktimer(){
		$msg['lock'] = false;		
		if($_SESSION['lockout'] > 0){
			$_SESSION['lockout'] = $_SESSION['lockout'] - 1;
			$msg['lockout'] = $_SESSION['lockout'];
			$_SESSION['lock'] = true;
			$msg['lock'] = $_SESSION['lock'];		
		}else{	
			$msg['lock'] = false;		
		}		
		echo json_encode($msg);
	}

	public function unlock(){
		$this->db->select('user_ip');
		$this->db->from('tbl_login_logs');
		$this->db->where('user_ip', $_SERVER['REMOTE_ADDR']);

		$query_ip =  $this->db->get();

		if($query_ip->num_rows() > 0){
			$latest='SELECT MAX(tbl_login_logs.login_date) AS LatestLog,login_attempt FROM tbl_login_logs WHERE user_ip = "'.$_SERVER['REMOTE_ADDR'].'"';
			$query_latest = $this->db->query($latest);
			$dets = $query_latest->row()->LatestLog;
			$this->db->where('login_date',$dets);
			$this->db->set('login_attempt',0);
			$this->db->update('tbl_login_logs');
		}else {
			$field = array(
				'user_ip' => $_SERVER['REMOTE_ADDR'],
				'login_attempt' => 1,
				'login_status' => "1"
			);
			$this->db->insert('tbl_login_logs',$field);
		}
	}
}