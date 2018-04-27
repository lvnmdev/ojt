<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USTP Online OJT Application</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome-all.min.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/fontawesome-all.min.js')?>"></script>
</head>

<body>
	<header class='top-navbar container-fluid'>
		<div class='col-xs-5 col-sm-4 col-md-3 col-ls-3' style='padding:0;'>
			<div class='ustp-logo '>
				<img src="<?= base_url('assets/img/logo/ustp.jpg') ?>" alt="USTP">
			</div>
		</div>

		<div class='user-profile'>
			<div class="dropdown show">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="<?= base_url('assets/img/icons/default-profile.png') ?>" alt="">
					<?= $this->session->userdata('username')?>
						<span class="caret"></span>
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					<a href="<?php echo base_url("Main/logout ")?>">
						<i class="fa fa-sign-out-alt"></i> Logout
					</a>
				</div>
			</div>
		</div>
	</header>
