<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }
    public function show_info(){
        $user = $this->session->userdata('username');
        $query = $this->db->select('*')->from('tbl_company_info')->where('user_name',$user)->get();

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

    public function edit_info(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'comp_name' => $this->input->post('name'),
            'comp_hr' => $this->input->post('hrname'),
            'comp_contact' => $this->input->post('contact'),
            'comp_tin' => $this->input->post('tin'),
            'comp_permit' => $this->input->post('permit'),
            'comp_opdate' => $this->input->post('opdate'),
            'comp_addst' => $this->input->post('addst'),
            'comp_addbrgy' => $this->input->post('addbrgy'),
            'comp_postcode' => $this->input->post('postal'),
            'comp_desc' => $this->input->post('desc'),
        );
        $query = $this->db->select('*')->from('tbl_company_info')->where('user_name',$field['user_name'])->get();

        if($query->num_rows()>0){
            $this->db->where('user_name',$field['user_name']);
            $this->db->update('tbl_company_info',$field);
            $result[1] = 'update';
            $result[0] = true;
            return $result;

        }else{
            $this->db->insert('tbl_company_info',$field);
            $result[1] = 'insert';
            $result[0] = true;
            return $result;
            }
        }
//Functionals for Job Posting
        public function show_jobs(){
            $user = $this->session->userdata('username');
            $query = $this->db->select('*')->from('tbl_job_posting')->where('user_name',$user)->get();

            if($query->num_rows()>0){
                $result[0] = true;
                $result[1] = $query->result();

                return $result;
            }else {
                $result[0] = false;
                $result[1] = "";
                
                return $result;
            }
            
        }

        public function post_job(){
            $field = array(
                'user_name' => $this->session->userdata('username'),
                'position' => $this->input->post('position'),
                'no_applicants' => $this->input->post('no_applicants'),
                'pref_sex' => $this->input->post('pref_sex'),
                'pref_civstat' => $this->input->post('pref_civstat'),
                'pref_educ' => $this->input->post('pref_educ'),
                'requirements' => $this->input->post('requirements')
            );
    
            $this->db->insert('tbl_job_posting',$field);
            $result[1] = 'insert';
            $result[0] = true;
            return $result;
            }






    }


