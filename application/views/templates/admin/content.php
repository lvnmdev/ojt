<?php 
$this->load->view('templates/admin/top-navbar');
$this->load->view('templates/admin/side-navbar');
if (isset($content)) {
    $this->load->view($content);
}
else {
    echo 'Content not found.';
}
?>