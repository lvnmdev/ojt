<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {
    public function __construct(){
		parent::__construct();
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
				'user_name' => $this->input->post('username'),
				'user_pass' => $this->input->post('password'),
				'user_email' => $this->input->post('email'),
				'user_type' => $this->input->post('usertype')
			);
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
			$result[0] = $query->row();
			$result[1] = true;
			return $result;
		}else{
			return false;
		}
	
	}

}