<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }

    public function show_company() {
        $status = array('2', '0');
        $query = $this->db->select('*')->from('tbl_company_info')->join('tbl_users','tbl_company_info.user_name = tbl_users.user_name','inner')->where_in('user_status',$status)->get();
        if($query){
            $result[0] = true;
            $result[1] = $query->result();

            return $result;
        }
        else {
            $result[0] = false;
            $result[1] = "";
            
            return $result;
        }
    }

    public function show_applicant() {
        $status = array('2', '0');
        $query =  $this->db->select('*')->from('tbl_applicant_bio')->join('tbl_users','tbl_applicant_bio.user_name = tbl_users.user_name','inner')->where_in('user_status',$status)->get();
        if($query){
            $result[0] = true;
            $result[1] = $query->result();

            return $result;
            }
        else {
            $result[0] = false;
            $result[1] = "";
            
            return $result;
        }
    }                                                   

    public function show_pending_company() {
      $query = $this->db->select('*')->from('tbl_company_info')->join('tbl_users','tbl_company_info.user_name = tbl_users.user_name','inner')->where('user_status','1')->where('user_type','1')->get();
        if($query){
            $result[0] = true;
            $result[1] = $query->result();

            return $result;
        }
        else {
            $result[0] = false;
            $result[1] = "";
            
            return $result;
        }
    }

    public function show_pending_applicant() {
      $query = $this->db->select('*')->from('tbl_users')->join('tbl_applicant_bio','tbl_users.user_name = tbl_applicant_bio.user_name','inner')->where('user_status','1')->where('user_type','2')->get();
        if($query){
            $result[0] = true;
            $result[1] = $query->result();

            return $result;
            }
        else {
            $result[0] = false;
            $result[1] = "";
            
            return $result;
        }
    }

    public function notification() {
        $count_applicant = $this->db->query('SELECT COUNT(user_id) as "count_applicant" FROM tbl_users WHERE `user_type` = "2" GROUP BY user_type ');
        $count_company = $this->db->query('SELECT COUNT(user_id) as "count_company" FROM tbl_users WHERE `user_type` = "1" GROUP BY user_type');
        $count_p_applicant = $this->db->query('SELECT COUNT(user_id) as "count_p_applicant" FROM tbl_users WHERE `user_type` = "2" AND `user_status` = "1" GROUP BY user_type ');
        $count_p_company = $this->db->query('SELECT COUNT(user_id) as "count_p_company" FROM tbl_users WHERE `user_type` = "1" AND `user_status` = "1" GROUP BY user_type');
        $count_employed = $this->db->query('SELECT COUNT(*) as "count_employed" FROM tbl_graduate_info WHERE `is_employed` = "1"');
        $count_unemployed = $this->db->query('SELECT COUNT(*) as "count_unemployed" FROM tbl_graduate_info WHERE `is_employed` = "0"');
        
        $count_employed_per_year = $this->db->query('SELECT year_graduated as "year",COUNT(*) as "count_employed" FROM tbl_graduate_info WHERE `is_employed` = "1" GROUP BY `year_graduated`');
        $count_unemployed_per_year = $this->db->query('SELECT year_graduated as "year", COUNT(*) as "count_unemployed" FROM tbl_graduate_info WHERE `is_employed` = "0" GROUP BY `year_graduated`');

        
        if ($count_applicant && $count_company && $count_p_applicant && $count_p_company && $count_employed && $count_unemployed && $count_employed_per_year && $count_unemployed_per_year) {
            $result[0] = true;
            $result[1] = $count_applicant->result();
            $result[2] = $count_company->result();
            $result[3] = $count_p_applicant->result();
            $result[4] = $count_p_company->result();
            $result[5] = $count_employed->result();
            $result[6] = $count_unemployed->result();
            $result[7] = $count_employed_per_year->result();
            $result[8] = $count_unemployed_per_year->result();

            return $result;
        }
    }

    public function show_app_user() {
        $id = $this->input->post('id');
        $query = $this->db->select('*')->from('tbl_applicant_bio')->join('tbl_users','tbl_applicant_bio.user_name = tbl_users.user_name','inner')->where('tbl_users.user_name',$id)->get();

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

    public function show_comp_user() {
        $id = $this->input->post('id');
        $query = $this->db->select('*')->from('tbl_company_info')->join('tbl_users','tbl_company_info.user_name = tbl_users.user_name','inner')->where('tbl_users.user_name',$id)->get();

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

    public function change_user_status() {
        $username = $this->input->post('id');
        $status_no = $this->input->post('status_no');

        $this->db->set('user_status',$status_no);
        $this->db->where('user_name',$username);
        $this->db->update('tbl_users');
        return true;
    }

    public function show_employed_graduates() {
        $sql = "SELECT concat(tbl_applicant_bio.fname,' ',tbl_applicant_bio.mname,' ',tbl_applicant_bio.lname) as name, tbl_applicant_bio.sex, tbl_graduate_info.college_graduated, tbl_graduate_info.degree_graduated,tbl_graduate_info.year_graduated,tbl_graduate_info.company_name,tbl_graduate_info.job_position,tbl_graduate_info.date_hired FROM tbl_applicant_bio INNER JOIN tbl_graduate_info on tbl_applicant_bio.user_name = tbl_graduate_info.user_name WHERE tbl_graduate_info.is_employed = '1'";
        $query = $this->db->query($sql);

        if($query){
            $result[0] = true;
            $result[1] = $query->result();  
        }else{
            $result[0] = false;
        }
        return $result;
    }
    public function show_unemployed_graduates() {
        $sql = "SELECT concat(tbl_applicant_bio.fname,' ',tbl_applicant_bio.mname,' ',tbl_applicant_bio.lname) as name, tbl_applicant_bio.sex, tbl_graduate_info.college_graduated, tbl_graduate_info.degree_graduated,tbl_graduate_info.year_graduated FROM tbl_applicant_bio INNER JOIN tbl_graduate_info on tbl_applicant_bio.user_name = tbl_graduate_info.user_name WHERE tbl_graduate_info.is_employed = '0'";
        $query = $this->db->query($sql);

        if($query){
            $result[0] = true;
            $result[1] = $query->result();  
        }else{
            $result[0] = false;
        }
        return $result;
    }
}
?>
