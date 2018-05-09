<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
    public function __construct(){
		  parent::__construct();
    }

    public function show_company() {
      $query = $this->db->select('*')->from('tbl_company_info')->get();
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
      $query = $this->db->select('*')->from('tbl_applicant_bio')->get();
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
      $query = $this->db->select('*')->from('tbl_users')->where('user_status','1')->where('user_type','1')->get();
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
      $query = $this->db->select('*')->from('tbl_users')->where('user_status','1')->where('user_type','2')->get();
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

        if ($count_applicant && $count_company) {
            $result[0] = true;
            $result[1] = $count_applicant->result();
            $result[2] = $count_company->result();

            return $result;
        }
    }
}
?>
