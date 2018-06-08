<?php
$query_app = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$_SESSION['username'])->get();
if ($_SESSION['userstatus'] == 1 && $query_app->num_rows() > 0) {
    redirect('Applicant/graduate_form');
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>USTP | Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-select.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome-all.min.css')?>">
	</head>
	
	<body class="require-form">
		<div class="form-banner"></div>
		<div class="page-wrapper">
			<div class="container">
				<div class="form-strip"></div>
				<div class="card-content form-body" style="margin-bottom:20px;">
					<div class="card-title">
						<h1>Biodata | Form</h1>
						<p style="color:red;">You are required to fill all fields.</p>
					</div>
					<div class="card-body">
						<form id="form_bio" method='post'>
							<div class='row'>
								<div class='col-xs-12 col-sm-4 col-md-4'>
									<div class="form-group ">
										<label for="name" class="label-control">First Name <span class="required-form">*</span></label>
										<input id='bio_fname' type="text" name="fname" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-4'>
									<div class="form-group">
										<label for="name" class="label-control">Middle Name <span class="required-form">*</span></label>
										<input id='bio_mname' type="text" name="mname" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-4'>
									<div class="form-group">
										<label for="name" class="label-control">Last Name <span class="required-form">*</span></label>
										<input id='bio_lname' type="text" name="lname" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group">
										<label for="name" class="label-control">Sex <span class="required-form">*</span></label>
										<br>
										<select id="bio_sex" name="sex" class="form-control" required>
											<option value="">-- Select --</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group ">
										<label for="name" class="label-control">Birthdate <span class="required-form">*</span></label>
										<input id='bio_bday' type="date" name="birthdate" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group ">
										<label for="name" class="label-control">Civil Status <span class="required-form">*</span></label>
										<br>
										<select id="bio_civil_status" name="civil_status" class="form-control" required>
											<option value="">-- Select --</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
											<option value="Widowed">Widowed</option>
											<option value="Separated">Separated</option>
											<option value="Divorced">Divorced</option>
										</select>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group ">
										<label for="name" class="label-control">Contact No. <span class="required-form">*</span></label>
										<input id='bio_contact_no' type="tel" name="contact_no" class="form-control" value="" maxlength="11" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group">
										<label for="name" class="label-control">Nationality <span class="required-form">*</span></label>
										<input id='bio_nationality' type="text" name="nationality" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-2'>
									<div class="form-group">
										<label for="name" class="label-control">Religion <span class="required-form">*</span></label>
										<input id='bio_religion' type="text" name="religion" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-12 col-md-12'>
									<div class="form-group">
										<label for="name" class="label-control">Home Address <span class="required-form">*</span></label>
										<input id='bio_h' type="text" name="haddress" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-12 col-md-12'>
									<div class="form-group">
										<label for="name" class="label-contro">Current Address <span class="required-form">*</span></label>
										<input id='bio_c' type="text" name="caddress" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<hr style='width:100%;'>
								<div class='col-xs-12 col-sm-12 col-md-12'>
									<div class="form-group">
										<label for="name" class="label-control">Mother Maiden Name <span class="required-form">*</span></label>
										<input id='bio_momfname' type="text" name="momfname" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-3 col-md-3'>
									<div class="form-group ">
										<label for="name" class="label-control">Mother Birthdate <span class="required-form">*</span></label>
										<input id='bio_mombday' type="date" name="mombday" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-4'>
									<div class="form-group ">
										<label for="name" class="label-control">Mother Occupation <span class="required-form">*</span></label>
										<input id='bio_momwork' type="text" name="momwork" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-12 col-md-12'>
									<div class="form-group">
										<label for="name" class="label-control">Father Full Name <span class="required-form">*</span></label>
										<input id='bio_dadfname' type="text" name="dadfname" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-xs-12 col-sm-3 col-md-3'>
									<div class="form-group">
										<label for="name" class="label-control">Father Birthdate <span class="required-form">*</span></label>
										<input id='bio_dadbday' type="date" name="dadbday" class="form-control" value="" required>
									</div>
								</div>
								<div class='col-xs-12 col-sm-4 col-md-4'>
									<div class="form-group ">
										<label for="name" class="label-control">Father Occupation <span class="required-form">*</span></label>
										<input id='bio_dadwork' type="text" name="dadwork" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div class="card-footer" style="padding-left:0;">
								<button type="submit" id="btnsubmit_bio" class="btn btn-primary">
									<i class='fa fa-location-arrow btn-icon'></i>Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-select.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/datatables.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/fontawesome-all.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/dashboard_app.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/style.js');?>"></script>
