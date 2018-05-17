<?php
	$query_app = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$_SESSION['username'])->get();
    if (isset($_SESSION['username'])){
        if ($_SESSION['usertype']==0){
            redirect('Admin/dashboard');
		}
		else if($_SESSION['usertype']==1){
            redirect('Company/dashboard');
		}
		else {
			if ($_SESSION['userstatus'] == 1){
				if ($query_app->num_rows() > 0) {
					redirect('Main/pending');
				}
				else {
					redirect('Company/info_form');
				}
			}
		}
    }else{
		redirect('/');
	}

?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>USTP | Graduate Tracer</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-select.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome-all.min.css')?>">
		<script src="<?= base_url('assets/js/angular/angular.js')?>"></script>
		<script src="<?= base_url('assets/js/angular/toastr.js')?>"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/angular/toastr.css')?>">
	</head>

	<body>
		<div class="folding-cube-wrapper">
			<div class="folding-cube-body">
				<div class="cube-1 cube"></div>
				<div class="cube-2 cube"></div>
				<div class="cube-4 cube"></div>
				<div class="cube-3 cube"></div>
			</div>
		</div>
		<header class='top-navbar container-fluid'>
			<div class='user-profile'>
				<div class="dropdown">
					<a role='button' class="dropdown-toggle user-info" type="button" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="true">
						<img id="prof_pic" style="width:50px;height:50px;" src="<?= base_url('assets/img/icons/default-profile.png') ?>" alt="Profile" class="img img-circle">
						
						<?= $this->session->userdata('username')?>
							<span class="caret"></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="user-dropdown">
						<ul class="user-info-opt">
							<a href="<?php echo base_url("Applicant/user_settings")?>">
								<li>
									<i class="fas fa-user-cog"></i> User Settings
								</li>
							</a>
							<a href="<?php echo base_url("Main/logout")?>">
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
