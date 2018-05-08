<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {	
	function __constructor(){
		parent::__constructor();
	}

	public function dashboard(){
        $data['content'] = 'admin/dashboard';
        
		$this->load->view('templates/admin/content', $data);
	}
	
	public function company() {
		$data['content'] = 'admin/company';
        
		$this->load->view('templates/admin/content', $data);
	}

	public function pending_company() {
		$data['content'] = 'admin/pending_company';
        
		$this->load->view('templates/admin/content', $data);
	}

	public function applicants() {
		$data['content'] = 'admin/applicants';
        
		$this->load->view('templates/admin/content', $data);
	}

	public function pending_applicants() {
		$data['content'] = 'admin/pending_applicants';
        
		$this->load->view('templates/admin/content', $data);
	}

	//Functionals

	public function show_company() {
		$result = $this->admin->show_company();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}
		echo json_encode($msg);
	}

	public function show_applicant() {
		$result = $this->admin->show_applicant();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}
		echo json_encode($msg);
	}

	public function show_pending_company() {
		$result = $this->admin->show_pending_company();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}
		echo json_encode($msg);
	}

	public function show_pending_applicant() {
		$result = $this->admin->show_pending_applicant();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}
		echo json_encode($msg);
	}

	public function notification() {
		$result = $this->admin->notification();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['count_applicant'] = $result[1];
			$msg['count_company'] = $result[2];
		}
		echo json_encode($msg);
	}
}