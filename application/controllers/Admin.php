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
}