<?php 
$this->load->view('templates/company/top-navbar');
$this->load->view('templates/company/side-navbar');
if (isset($content)) {
    $this->load->view($content);
}
else {
    echo 'Content not found.';
}
?>