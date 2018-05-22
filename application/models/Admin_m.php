<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }

    public function show_company() {
      $query = $this->db->select('*')->from('tbl_company_info')->join('tbl_users','tbl_company_info.user_name = tbl_users.user_name','inner')->where('user_status','2')->get();
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
      $query =  $this->db->select('*')->from('tbl_applicant_bio')->join('tbl_users','tbl_applicant_bio.user_name = tbl_users.user_name','inner')->where('user_status','2')->get();
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

        if ($count_applicant && $count_company && $count_p_applicant && $count_p_company) {
            $result[0] = true;
            $result[1] = $count_applicant->result();
            $result[2] = $count_company->result();
            $result[3] = $count_p_applicant->result();
            $result[4] = $count_p_company->result();

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
}
?>
