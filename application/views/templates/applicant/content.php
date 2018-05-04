<?php 
$this->load->view('templates/applicant/top-navbar');
$this->load->view('templates/applicant/side-navbar');
if (isset($content)) {
    $this->load->view($content);
}
else {
    echo 'Content not found.';
}

$this->load->view('templates/applicant/footer');
?>