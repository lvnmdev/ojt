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
}