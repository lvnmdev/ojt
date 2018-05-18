<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }

    public function notification() {
        $user = $this->session->userdata('username');
        $count_p_jobs =  $this->db->select('count(*) as `count_p_jobs`')->from('tbl_job_posting')->where('user_name',$user)->where('status','1')->get();
        $count_p_apps =  $this->db->select('count(*) as `count_p_apps`')->from('tbl_pending_application')->join('tbl_job_posting','tbl_pending_application.job_id = tbl_job_posting.job_id','inner')->where('tbl_job_posting.user_name',$user)->get();

        $result[0] = false;

        if ($count_p_jobs && $count_p_apps) {
            $result[0] = true;
            $result[1] = $count_p_jobs->result();
            $result[2] = $count_p_apps->result();

            return $result;
        }
    }

    public function show_info(){
        $user = $this->session->userdata('username');
        $id = $this->session->userdata('id');
        $query = $this->db->select('*')->from('tbl_company_info')->where('user_name',$user)->get();
        $query2 = $this->db->select('*')->from('tbl_photo_upload')->where('user_id',$id)->get();
        if($query->num_rows()>0){
            $result[0] = true;
            $result[1] = $query->row();
            $result[2] = $query2->row();

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
        $query = $this->db->select('*')->from('tbl_job_posting')->where('user_name',$user)->where('status',1)->get();

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

    public function show_edit_job(){
        $id = $this->input->post('id');
        $query = $this->db->select('*')->from('tbl_job_posting')->where('job_id',$id)->where('status',1)->get();

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

    public function edit_job(){
            $field = array(
                'job_id' => $this->input->post('id'),
                'position' => $this->input->post('position'),
                'no_applicants' => $this->input->post('no_applicants'),
                'pref_sex' => $this->input->post('pref_sex'),
                'pref_civstat' => $this->input->post('pref_civstat'),
                'pref_educ' => $this->input->post('pref_educ'),
                'requirements' => $this->input->post('requirements')
            );
            
            $this->db->where('job_id',$field['job_id']);
            $this->db->update('tbl_job_posting',$field);
            if($this->db->affected_rows()>0){
                $result[0] = true;
                return $result;
            }
        }

    public function end_job(){
        $job_id = $this->input->post('job_id');
        $field = array(
            'status' => 0
        );
        $this->db->where('job_id',$job_id);
        $this->db->update('tbl_job_posting',$field);
        
        if($this->db->affected_rows()>0){
            $result[0] = true;
            return $result;
        }
    }

    public function show_pending_applications(){
        $user = $this->session->userdata('username');
        $sql = "SELECT concat(tbl_applicant_bio.fname,' ',tbl_applicant_bio.mname,' ',tbl_applicant_bio.lname) as applicant_name, tbl_job_posting.position, tbl_applicant_bio.sex, tbl_pending_application.date_applied, tbl_applicant_bio.user_name from tbl_pending_application INNER JOIN tbl_applicant_bio on tbl_applicant_bio.user_name = tbl_pending_application.user_name INNER JOIN tbl_job_posting on tbl_job_posting.job_id = tbl_pending_application.job_id WHERE tbl_job_posting.user_name = '$user'";

        $query = $this->db->query($sql);

        if($query){
            $result[0] = true;
            $result[1] = $query->result();
            return $result;
        }
    }

    public function upload_photo(){
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = $_SESSION['id'].'_pic.'.$ext; 

        $target = 'C:/xampp/htdocs/ojt/assets/img/profile_pics/'.$newname;
        $link = 'assets/img/profile_pics/'.$newname;

        $field = array(
            'user_id' => $this->session->userdata('id'),
            'photo_path' => $link
        );
        $query = $this->db->select('*')->from('tbl_photo_upload')->where('user_id',$field['user_id'])->get();
        if($query->num_rows()>0){
            $this->db->where('user_id',$field['user_id']);
            $this->db->update('tbl_photo_upload',$field);
            unlink($target);
            move_uploaded_file( $_FILES['image']['tmp_name'], $target);                
        }else{
            $this->db->insert('tbl_photo_upload',$field);
            move_uploaded_file( $_FILES['image']['tmp_name'], $target);                
        }
    }
}


