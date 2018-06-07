<?php
$query_graduate_form = $this->db->select('*')->from('tbl_graduate_info')->where('user_name',$_SESSION['username'])->get();
if ($_SESSION['userstatus'] == 1 && $query_graduate_form->num_rows() > 0) {
    redirect('Applicant/dashboard');
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
						<h1>Graduate Info | Form</h1>
						<p style="color:red;">You are required to fill all fields.</p>
					</div>
					<div class="card-body">
						<form id="graduate_form_info" class="form-horizontal" method="post">
							<div class="form-group">
								<label for="name" class="label-control col-md-4">College <span class="required-form">*</span></label>
								<div class="col-md-8">
									<select id='e_g_college_graduated' type="text" name="g_college_graduated" class="form-control" required>
										<option value ="">-- Select --</option>
										<option value="College of Engineering and Architecture">College of Engineering and Architecture</option>
										<option value="College of Information Technology and Computing">College of Information Technology and Computing</option>
										<option value="College of Science and Mathematics">College of Science and Mathematics</option>
										<option value="College of Science and Technology Education">College of Science and Technology Education</option>
										<option value="College of Technology">College of Technology</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="label-control col-md-4">Degree <span class="required-form">*</span></label>
								<div class="col-md-8">
									<select id='e_g_degree_graduated' type="text" name="g_degree_graduated" class="form-control" required>
										<option value="">-- Select --</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="label-control col-md-4">Year Graduated <span class="required-form">*</span></label>
								<div class="col-md-8">
									<input id='e_g_year_graduated' type="number" name="g_year_graduated" class="form-control" placeholder="YYYY" min="2000" max="9999" required>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="label-control col-md-4">Employment <span class="required-form">*</span></label>
								<div class="col-md-8">
									<div class="col-md-6">
										<input id="isNotEmployed" type="radio" name="g_employment" value="0" checked>&nbsp
										<label>Unemployed</label>
									</div>
									<div class="col-md-6">
										<input id="isEmployed" type="radio" name="g_employment" value="1">&nbsp
										<label>Employed</label>
									</div>
								</div>
							</div>
							<div id="employed_inputs" style="display:none">
								<div class="form-group">
									<label for="name" class="label-control col-md-4">Date Hired <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_date_hired' type="date" name="g_date_hired" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="label-control col-md-4">Job Position <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_job_position' type="text" name="g_job_position" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="label-control col-md-4">Company Name <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_company_name' type="text" name="g_company_name" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="label-control col-md-4">Business Nature <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_business_nature' type="text" name="g_business_nature" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="label-control col-md-4">Company Address <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_company_address' type="text" name="g_company_address" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="label-control col-md-4">HR Person <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_hr_person' type="text" name="g_hr_person" class="form-control" value="" required>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="label-control col-md-4">HR Contact No. <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_hr_no' type="tel" name="g_hr_no" class="form-control" value="" maxlength="11" required>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="label-control col-md-4">HR Email <span class="required-form">*</span></label>
									<div class="col-md-8">
										<input id='e_g_hr_email' type="email" name="g_hr_email" class="form-control" value="" required>
									</div>
								</div>
							</div>

							<div class="card-footer" style="padding-left:0;">
								<button type="submit" id="btnsubmit_info" class="btn btn-primary">
									<i class="fa fa-paper-plane"></i> Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

    </html>
    <script>
        document.getElementById("e_g_year_graduated").oninput = function () {
            if (this.value.length > 4) {
                this.value = this.value.slice(0,4); 
            }
        }
    </script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-select.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/datatables.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/fontawesome-all.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/dashboard_app.js');?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/style.js');?>"></script>
