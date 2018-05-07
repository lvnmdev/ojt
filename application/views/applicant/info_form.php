<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
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
	<div class="page-wrapper">
		<div class="container">
			<div class="card-content">
				<div class="card-title">
					<h1>Biodata</h1>
					<h4 style="color:red;">Please fill all fields. You are required to.</h4>
				</div>
				<div class="card-body">
					<form id="form_bio">
						<div class='row'>
							<div class='col-xs-12 col-sm-4 col-md-4'>
								<div class="form-group ">
									<label for="name" class="label-control">First Name</label>
									<input id='bio_fname' type="text" name="fname" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-4 col-md-4'>
								<div class="form-group">
									<label for="name" class="label-control">Middle Name</label>
									<input id='bio_mname' type="text" name="mname" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-4 col-md-4'>
								<div class="form-group">
									<label for="name" class="label-contro">Last Name</label>
									<input id='bio_lname' type="text" name="lname" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group">
									<label for="name" class="label-control">Sex</label>
									<br>
									<select name="sex" class="selectpicker" style='width:100%;' required>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group ">
									<label for="name" class="label-control">Birthdate</label>
									<input id='bio_bday' type="date" name="birthdate" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group">
									<label for="name" class="label-control">Nationality</label>
									<input id='bio_nationality' type="text" name="nationality" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group">
									<label for="name" class="label-control">Religion</label>
									<input id='bio_religion' type="text" name="religion" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Home Address</label>
									<input id='bio_h' type="text" name="haddress" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-contro">Current Address</label>
									<input id='bio_c' type="text" name="caddress" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<hr style='width:100%;'>
							<div class='col-xs-12 col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Mother Maiden Name</label>
									<input id='bio_momfname' type="text" name="momfname" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group ">
									<label for="name" class="label-control">Mother Birthdate</label>
									<input id='bio_mombday' type="date" name="mombday" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-4 col-md-4'>
								<div class="form-group ">
									<label for="name" class="label-control">Mother Occupation</label>
									<input id='bio_momwork' type="text" name="momwork" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Father Full Name</label>
									<input id='bio_dadfname' type="text" name="dadfname" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-sm-3 col-md-3'>
								<div class="form-group">
									<label for="name" class="label-control">Father Birthdate</label>
									<input id='bio_dadbday' type="date" name="dadbday" class="form-control" value="" required>
								</div>
							</div>
							<div class='col-xs-12 col-sm-4 col-md-4'>
								<div class="form-group ">
									<label for="name" class="label-control">Father Occupation</label>
									<input id='bio_dadwork' type="text" name="dadwork" class="form-control" value="" required>
								</div>
							</div>
						</div>
						<div>
							<input type="button" id="btnsubmit_bio" class="btn btn-primary">
							<i class='fa fa-save btn-icon'></i>Submit</input>
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
