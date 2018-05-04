<?php
    if (isset($_SESSION['username'])){
        if($_SESSION['usertype']==1){
            redirect('Company/dashboard');
        }else if($_SESSION['usertype']==2){
            redirect('Applicant/dashboard');
        }
    }else{
		redirect('Main/index');
	}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>USTP Online OJT Application</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-select.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome-all.min.css')?>">
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-select.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/datatables.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/fontawesome-all.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/dashboard_admin.js');?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/style.js');?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/chart.bundle.min.js');?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/moment.min.js');?>"></script>
	</head>

	<body>
		<header class='top-navbar container-fluid'>
			<div class='user-profile'>
				<div class="dropdown">
					<a role='button' class="dropdown-toggle user-info" type="button" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="true">
						<img src="<?= base_url('assets/img/icons/default-profile.png') ?>">
						<?= $this->session->userdata('username')?>
							<span class="caret"></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="user-dropdown">
						<ul class="user-info-opt">
							<a href="<?php echo base_url("Applicant/settings ")?>">
								<li>
									<i class="fa fa-cog"></i> Settings
								</li>
							</a>
							<a href="<?php echo base_url("Main/logout ")?>">
								<li>
									<i class="fa fa-sign-out-alt"></i> Logout
								</li>
							</a>
						</ul>
					</div>
				</div>
			</div>
			<div class='side-nav-open'>
				<a type='button' id='openNav'>
					<i class='fa fa-bars'></i>
				</a>
			</div>
			<button id='scrollup-btn' class='scrollup-btn'>
				<i class='fa fa-chevron-up'></i>
			</button>
		</header>
