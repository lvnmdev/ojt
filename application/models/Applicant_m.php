 
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant_m extends CI_Model {
    public function __construct(){
		parent::__construct();
    }


    public function show_bio(){
        $user = $this->session->userdata('username');
        $id = $this->session->userdata('id');
        $query = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$user)->get();
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
            return true;
           

    }

    public function insert_accomplishment(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'accomplishment' => $this->input->post('accomplishment'),
            'affiliation' => $this->input->post('affiliation')
        );
            $this->db->insert('tbl_resume_accomplishment',$field);
            return true;       
    }

    public function insert_workxp(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'position' => $this->input->post('position'),
            'company' => $this->input->post('company'),
            'date_start' => $this->input->post('date_start'),
            'date_end' => $this->input->post('date_end')
        );
            $this->db->insert('tbl_resume_workxp',$field);
            return true;       
    }

    public function insert_education(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'level' => $this->input->post('level'),
            'school' => $this->input->post('school'),
            'start' => $this->input->post('start'),
            'graduated' => $this->input->post('graduate')
        );
            $this->db->insert('tbl_resume_education',$field);
            return true;       
    }

    public function insert_seminars(){
        $field = array(
            'user_name' => $this->session->userdata('username'),
            'seminar' => $this->input->post('seminar'),
            'seminar_date' => $this->input->post('seminar_date'),
            'conductedby' => $this->input->post('conductedby'),
        );
            $this->db->insert('tbl_resume_seminars',$field);
            return true;       
    }

    public function show_resume(){
        $user = $this->session->userdata('username');
        $query1 = $this->db->select('*')->from('tbl_resume_skills')->where('user_name',$user)->get();
        $query2 = $this->db->select('*')->from('tbl_resume_accomplishment')->where('user_name',$user)->get();
        $query3 = $this->db->select('*')->from('tbl_resume_education')->where('user_name',$user)->get();
        $query4 = $this->db->select('*')->from('tbl_resume_seminars')->where('user_name',$user)->get();
        $query5 = $this->db->select('*')->from('tbl_resume_workxp')->where('user_name',$user)->get();

        $result[0] = false;
        $result[1] = '';
        $result[2] = '';
        $result[3] = '';
        $result[4] = '';
        $result[5] = '';

        if($query1->num_rows()>0){
            $result[0] = true;
            $result[1] = $query1->result();

        }
        if($query2->num_rows()>0){
            $result[0] = true;
            $result[2] = $query2->result();

        }
        if($query3->num_rows()>0){
            $result[0] = true;
            $result[3] = $query3->result();

        }
        if($query4->num_rows()>0){
            $result[0] = true;
            $result[4] = $query4->result();

        }
        if($query5->num_rows()>0){
            $result[0] = true;
            $result[5] = $query5->result();

        }
        return $result;
    }

    public function show_ongoing_applications() {
        $user = $this->session->userdata('username');
        $query = $this->db->select('tbl_pending_application.*')->select('tbl_job_posting.*')->select('tbl_company_info.*')->from('tbl_pending_application')->join('tbl_job_posting','tbl_pending_application.job_id = tbl_job_posting.job_id','inner')->join('tbl_company_info','tbl_job_posting.user_name = tbl_company_info.user_name','inner')->where('tbl_pending_application.user_name',$user)->get();

        $result[0] = false;

        if ($query->num_rows()>0) {
            $result[0] = true;
            $result[1] = $query->result();
        }

        return $result;
    }
        
    public function delete_skill(){
            $id = $this->input->post('id');
            $this->db->where('skill_id', $id);
            $this->db->delete('tbl_resume_skills');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        
    }
    public function delete_workxp(){
            $id = $this->input->post('id');
            $this->db->where('work_id', $id);
            $this->db->delete('tbl_resume_workxp');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        
    }
    public function delete_education(){
            $id = $this->input->post('id');
            $this->db->where('educ_id', $id);
            $this->db->delete('tbl_resume_education');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        
    }
    public function delete_accomplishment(){
            $id = $this->input->post('id');
            $this->db->where('accomplishment_id', $id);
            $this->db->delete('tbl_resume_accomplishment');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        
    }
    public function delete_seminars(){
            $id = $this->input->post('id');
            $this->db->where('seminar_id', $id);
            $this->db->delete('tbl_resume_seminars');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        
    }



    public function show_available_jobs(){
        $sql = 'SELECT tbl_company_info.comp_name,tbl_job_posting.* From tbl_job_posting INNER JOIN tbl_company_info on tbl_company_info.user_name = tbl_job_posting.user_name WHERE tbl_job_posting.status = 1;';
        $query = $this->db->query($sql);

        if($query){
            $result[0] = true;
            $result[1] = $query->result();

            return $result;
        }else {
            $result[0] = false;
            $result[1] = "";

            return $result;
        }
        
    }

    public function apply_job(){
        $field = array(
            'job_id' => $this->input->post('id'),
            'user_name' => $this->session->userdata('username'),
        );

        $query = $this->db->insert('tbl_pending_application',$field);

        if($query){
            return true;
        }else{
            return false;
            
        }
    }
    public function cancel_job(){
        $pending_id = $this->input->post('id');

        $this->db->set('app_status','0');
        $this->db->where('pending_id',$pending_id);
        $this->db->update('tbl_pending_application');
        return true;
    }
/////////////////////////////////////////////////////////////Dashboard and Settings Functionals
    public function count_dashboard(){
        $user = $this->session->userdata('username');
        $sql = 'SELECT count(tbl_pending_application.pending_id) as pending_applicant FROM tbl_pending_application WHERE tbl_pending_application.user_name = "'.$user.'" GROUP BY tbl_pending_application.user_name;';
        $sql1 = 'SELECT count(tbl_job_posting.job_id) as jobs_posted FROM tbl_job_posting GROUP BY tbl_job_posting.status';
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        if($query || $query1){
            $result[0] = true;
            $result[1] = $query->row();
            $result[2] = $query1->row();
            return $result;
        }else {
            $result[0] = false;
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
            unlink($target);
            $this->db->where('user_id',$field['user_id']);
            $this->db->update('tbl_photo_upload',$field);
            move_uploaded_file( $_FILES['image']['tmp_name'], $target);             
                           
        }else{
            $this->db->insert('tbl_photo_upload',$field);
            move_uploaded_file( $_FILES['image']['tmp_name'], $target);                
        }
    }

/////////////////////////////////////////////////////CHANGE Login Credentials Baby!
        public function change_username(){
            $user = $this->session->userdata('username');
            $user_name = $this->input->post('user_name');
            $this->db->set('user_name',$user_name);
            $this->db->where('user_name',$user);
            $this->db->update('tbl_users');
            return true;
        
        }

        public function change_password(){
            $user = $this->session->userdata('username');
            $user_pass = $this->input->post('pass_new');
            $this->db->set('user_pass',$user_pass);
            $this->db->where('user_name',$user);
            $this->db->update('tbl_users');
            return true;
        
        }
}
