<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }


    public function show_bio(){
        $user = $this->session->userdata('username');
        $query = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$user)->get();

        if($query->num_rows()>0){
            $result[0] = true;
            $result[1] = $query->row();

            return $result;
        }else {
            $result[0] = false;
            $result[1] = "";
            
            return $result;
        }
        
    }

    public function edit_bio(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'nationality' => $this->input->post('nationality'),
            'religion' => $this->input->post('religion'),
            'sex' => $this->input->post('sex'),
            'haddress' => $this->input->post('haddress'),
            'caddress' => $this->input->post('caddress'),
            'birthdate' => $this->input->post('birthdate'),
            'momfname' => $this->input->post('momfname'),
            'mombday' => $this->input->post('mombday'),
            'momwork' => $this->input->post('momwork'),
            'dadfname' => $this->input->post('dadfname'),
            'dadbday' => $this->input->post('dadbday'),
            'dadwork' => $this->input->post('dadwork')
        );

        $query = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$field['user_name'])->get();
        if($query->num_rows()>0){
            $this->db->where('user_name',$field['user_name']);
            $this->db->update('tbl_applicant_bio',$field);
            $result[1] = 'update';
            $result[0] = true;
            return $result;

        }else{
            $this->db->insert('tbl_applicant_bio',$field);
            $result[1] = 'insert';
            $result[0] = true;
            return $result;
            }
        }


    public function insert_skill(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'skill' => $this->input->post('skill')
        );
            $this->db->insert('tbl_resume_skills',$field);

            if($this->db->affected_rows > 0){
                return true;
            }else{
                return false;                
            }

    }

    public function insert_accomplisment(){
        
    }

    public function insert_workingxp(){
        
    }

    public function insert_education(){
        
    }

    public function insert_seminar(){
        
    }
}
