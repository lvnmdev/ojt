<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {
    public function __construct(){
		parent::__construct();

		$this->load->helper('security');
	}


	//Functionals

	public function isAccountExist(){
		$username = $this->input->post('username');
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('user_name', $username);

		$result =  $this->db->get();
		
		if($result->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function register(){
		$field = array(
				'user_name' =>  $this->input->post('username'),
				'user_pass' =>  $this->input->post('password'),
				'user_email' => $this->input->post('repassword'),
				'user_type' =>  $this->input->post('email')
			);

		$field = $this->security->xss_clean($field);
		
		$q1 = $this->db->insert('tbl_users',$field);

		if ($q1){
			return true;
		} 
		else{
			return false;
		}
	}

	public function login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');		
		$this->db->where('user_name', $user);
		$this->db->where('user_pass', $pass);
		$query = $this->db->get('tbl_users');		
		
		if($query->num_rows()==1){
			$field = array(
				'user_ip' => $_SERVER['REMOTE_ADDR'],
				'login_attempt' => 1,
				'login_status' => "1"
			);
			$this->db->insert('tbl_login_logs',$field);
			$result[0] = $query->row();
			$result[1] = true;
			return $result;

		}else{

			$this->db->select('user_ip');
			$this->db->from('tbl_login_logs');
			$this->db->where('user_ip', $_SERVER['REMOTE_ADDR']);

			$query_ip =  $this->db->get();

			if($query_ip->num_rows() > 0){
				
			}else {
				$field = array(
					'user_ip' => $_SERVER['REMOTE_ADDR'],
					'login_attempt' => 0,
					'login_status' => "0"
				);
				$this->db->insert('tbl_login_logs',$field);
			}

			$latest='SELECT MAX(tbl_login_logs.login_date) AS LatestLog,login_attempt FROM tbl_login_logs WHERE user_ip = "'.$_SERVER['REMOTE_ADDR'].'"';
			$query_latest = $this->db->query($latest);
			$dets = $query_latest->row()->LatestLog;
			$attempts = (int)$query_latest->row()->login_attempt;
			if ($attempts == 3){
				$result[0] = "3";
				$result[1] = false;
			}else{
				$result[0] = "You have failed";
				$result[1] = false;
				$attempts++;
				$this->db->where('login_date',$dets);
				$this->db->set('login_attempt',$attempts);
				$this->db->update('tbl_login_logs');
			}
			return $result;
		}
	}

}