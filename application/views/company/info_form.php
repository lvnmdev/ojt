<?php 
$query_comp = $this->db->select('*')->from('tbl_company_info')->where('user_name',$_SESSION['username'])->get();
if ($query_comp->num_rows() > 0) {
        redirect('Company/dashboard');
    }
?>

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
			<div class="card-content" style="margin-bottom:20px;">
				<div class="card-title">
					<h1 class="modal-title" style="color:black !important;">Company Information</h1>
                    <h4 style="color:red;">Please fill all fields. You are required to.</h4>
				</div>
				<div class="card-body">
					<form id="form_info" class="form-horizontal">
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Name</label>
							<div class="col-md-8">
								<input id='comp_info_name' type="text" name="name" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Description</label>
							<div class="col-md-8">
								<input id='comp_info_desc' type="text" name="desc" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">HR Manager</label>
							<div class="col-md-8">
								<input id='comp_info_hr' type="text" name="hrname" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Contact No</label>
							<div class="col-md-8">
								<input id='comp_info_contact' type="text" name="contact" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company TIN (BIR)</label>
							<div class="col-md-8">
								<input id='comp_info_tin' type="text" name="tin" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Business Permit</label>
							<div class="col-md-8">
								<input id='comp_info_permit' type="text" name="permit" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Operational Data</label>
							<div class="col-md-8">
								<input id='comp_info_opdate' type="date" name="opdate" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Address: Street</label>
							<div class="col-md-8">
								<input id='comp_info_addst' type="text" name="addst" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Address: Barangay</label>
							<div class="col-md-8">
								<input id='comp_info_addbrgy' type="text" name="addbrgy" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Postal Code</label>
							<div class="col-md-8">
								<input id='comp_info_postal' type="text" name="postal" class="form-control" value="" required>
							</div>
						</div>
						<div class="card-footer" style="padding-left:0;">
							<button type="submit" id="btnsubmit_info" class="btn btn-primary"><i class="fa fa-location-arrow btn-icon"></i>Submit</button>
						</div>
					</form>
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
<script type="text/javascript" src="<?= base_url('assets/js/dashboard_comp.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/style.js');?>"></script>
