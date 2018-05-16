<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {	
	function __constructor(){
		parent::__constructor();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Origin: <origin>");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Request-Method: OPTIONS, POST, GET, PUT, DELETE');
	}

	public function require_form() {
		$this->load->view('applicant/info_form');
	}

	public function dashboard(){
        $data['content'] = 'applicant/dashboard';
        
		$this->load->view('templates/applicant/content', $data);
	}
	
	public function application() {
		$data['content'] = 'applicant/application';
        
		$this->load->view('templates/applicant/content', $data);
	}

	public function biodata() {
		$data['content'] = 'applicant/biodata';
        
		$this->load->view('templates/applicant/content', $data);
	}

	public function resume() {
		$data['content'] = 'applicant/resume';
        
		$this->load->view('templates/applicant/content', $data);
	}

	public function ongoing_application() {
		$data['content'] = 'applicant/ongoing_application';
        
		$this->load->view('templates/applicant/content', $data);
	}
	public function user_settings(){        
		$data['content'] = 'user_settings';
        
		$this->load->view('templates/applicant/content', $data);
	}

	public function employed() {
		$data['content'] = 'applicant/employed';
        
		$this->load->view('templates/applicant/content', $data);
	}
	
	public function upload(){
		$this->applicant->upload_photo();
		redirect('Applicant/user_settings');
	}

	//Functionals (Biodata)

	public function show_bio(){
		$result = $this->applicant->show_bio();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
			$msg['pic'] = $result[2];
		}

		echo json_encode($msg);
		
	}

	public function edit_bio(){
		$result = $this->applicant->edit_bio();
		$msg['success'] = false;

		if($result[0]){
			$msg['success'] = true;
			$msg['operation'] = $result[1];
		}
		echo json_encode($msg);
	}

	//Functionals (Resume)
	public function show_resume(){
		$result = $this->applicant->show_resume();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['skills'] = $result[1];
			$msg['accomplishment'] = $result[2];
			$msg['education'] = $result[3];
			$msg['seminars'] = $result[4];
			$msg['workxp'] = $result[5];
		}

		echo json_encode($msg);
		
	}

	public function edit_resume(){
		$data_input = $this->input->post('data_input');
		$msg['success'] = false;

		switch ($data_input){
			case 'skill':
				$result = $this->applicant->insert_skill();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'work':
				$result = $this->applicant->insert_workxp();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'education':
				$result = $this->applicant->insert_education();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'accomplishment':
				$result = $this->applicant->insert_accomplishment();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'seminar':
				$result = $this->applicant->insert_seminars();

				if($result){
					$msg['success'] = true;
				}
				break;	
			default:
				$msg['operation'] = 'failed';
				
       
		}
		echo json_encode($msg);		


	}
	public function delete_resume(){
		$data_input = $this->input->post('field');
		$msg['success'] = false;

		switch ($data_input){
			case 'skill':
				$result = $this->applicant->delete_skill();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'work':
				$result = $this->applicant->delete_workxp();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'education':
				$result = $this->applicant->delete_education();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'accomplishment':
				$result = $this->applicant->delete_accomplishment();

				if($result){
					$msg['success'] = true;
				}
				break;
			case 'seminar':
				$result = $this->applicant->delete_seminars();

				if($result){
					$msg['success'] = true;
				}
				break;	
			default:
				$msg['operation'] = 'failed';
				
       
		}
		echo json_encode($msg);
	}

	//ongoing application

	public function show_ongoing_applications(){
		$result = $this->applicant->show_ongoing_applications();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}
		echo json_encode($msg);
	}

/////////////////JOBS FUNCTIONALS WUBBA LUBBA DUB DUB	
	public function show_available_jobs(){
		$result = $this->applicant->show_available_jobs();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
		}

		echo json_encode($msg);
		
	}

	public function apply_job(){
		$result = $this->applicant->apply_job();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}

		echo json_encode($msg);

	}
//////////////////////////////Dashboard Functionals!
	public function count_dashboard(){
		$result = $this->applicant->count_dashboard();
		$msg['success'] = false;
		if($result[0]){
			$msg['success'] = true;
			$msg['data'] = $result[1];
			$msg['data1'] = $result[2];
		}

		echo json_encode($msg);
	}
//////////////////////////////////////////FOR EDITING LOGIN CREDENTIALS!
	public function edit_username(){
		$result = $this->applicant->change_username();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
			$_SESSION['username'] = $this->input->post('new_user');
		}
		echo json_encode($msg);
       
	}
//////////////////////////////////////////For PDF PURPOSES!
	public function to_pdf(){
		$result = $this->applicant->show_resume();
		$msg['success'] = false;
		if($result[0]){
			$_POST['skill'] = $result[1];
			$_POST['accomplishment'] = $result[2];
			$_POST['education'] = $result[3];
			$_POST['seminars'] = $result[4];
			$_POST['workxp'] = $result[5];
		}
		$this->load->library('Pdf');
		$this->load->view('templates/applicant/to_resume');
	}
}
