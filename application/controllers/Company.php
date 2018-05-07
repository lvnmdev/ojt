<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {	
	function __constructor(){
		parent::__constructor();
	}

	public function require_form() {
		$data['content'] = 'company/info_form';
        
		$this->load->view('templates/company/content', $data);
	}

	public function dashboard() {
        $data['content'] = 'company/dashboard';
        
		$this->load->view('templates/company/content', $data);
	}
	
	public function employees() {
		$data['content'] = 'company/employees';
        
		$this->load->view('templates/company/content', $data);
	}

	public function post_job() {
		$data['content'] = 'company/post_job';
        
		$this->load->view('templates/company/content', $data);
	}

	public function pending_apps() {
		$data['content'] = 'company/pending_apps';
        
		$this->load->view('templates/company/content', $data);
	}
	
	public function company_info() {
		$data['content'] = 'company/company_info';
        
		$this->load->view('templates/company/content', $data);
	}


	//Functional 
	public function show_info(){
		$result = $this->company->show_info();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}

		echo json_encode($msg);
		
	}
	public function edit_info(){
		$result = $this->company->edit_info();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
			$msg['operation'] = $result[1];
		}
		echo json_encode($msg);
	}

	//Job Posting Functionals
	public function show_jobs(){
		$result = $this->company->show_jobs();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}

		echo json_encode($msg);
		
	}
	public function show_job_edit(){
		$result = $this->company->show_edit_job();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
			
		}
		echo json_encode($msg);
	}

	public function post_job_hiring(){
		$result = $this->company->post_job();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
			$msg['operation'] = $result[1];
		}
		echo json_encode($msg);
	}

	public function edit_job(){
		$result = $this->company->edit_job();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	public function end_job(){
		$result = $this->company->end_job();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_pending_applications(){
		$result = $this->company->show_pending_applications();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}

		echo json_encode($msg);
	}
}