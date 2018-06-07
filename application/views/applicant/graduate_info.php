<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>
					<a href="<?= base_url(" Applicant/dashboard ")?>">Home</a>
					<i class="fa fa-chevron-right"></i> Graduate Information</p>
			</div>

			<div class="card-content">
				<div class='card-title'>
					<h1 id='user_profile_name'></h1>
				</div>
				<div class='card-body'>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>College:</strong>
						</p>
						<p id='user_college_graduated' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Degree:</strong>
						</p>
						<p id='user_degree_graduated' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Year Graduated:</strong>
						</p>
						<p id='user_year_graduated' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Employment Status:</strong>
						</p>
						<p id='user_employment_stat' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Date Hired:</strong>
						</p>
						<p id='user_date_hired' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Job Position:</strong>
						</p>
						<p id='user_job_position' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Company Name:</strong>
						</p>
						<p id='user_company_name' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Business Nature:</strong>
						</p>
						<p id='user_business_nature' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Company Address:</strong>
						</p>
						<p id='user_company_address' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>HR Person:</strong>
						</p>
						<p id='user_hr_person' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>HR Contact No:</strong>
						</p>
						<p id='user_hr_contact_no' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>HR Email:</strong>
						</p>
						<p id='user_hr_email' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
				</div>
				<div class='card-footer'>
					<div class="row">
						<a id="btnedit_info" type="button" class="btn btn-success graduate_edit">
							<i class='fa fa-edit btn-icon'></i>Edit Graduate Info</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="graduate_edit_info" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Graduate Information</h4>
			</div>
			<div class="modal-body">
				<form id="graduate_form_info" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="name" class="label-control col-md-4">College</label>
						<div class="col-md-8">
							<select id='e_g_college_graduated' type="text" name="g_college_graduated" class="form-control" required>
								<option>--Select--</option>
								<option value="College of Engineering and Architecture">College of Engineering and Architecture</option>
								<option value="College of Information Technology and Computing">College of Information Technology and Computing</option>
								<option value="College of Science and Mathematics">College of Science and Mathematics</option>
								<option value="College of Science and Technology Education">College of Science and Technology Education</option>
								<option value="College of Technology">College of Technology</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Degree</label>
						<div class="col-md-8">
							<select id='e_g_degree_graduated' type="text" name="g_degree_graduated" class="form-control" required>
								<option>--Select--</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Date Graduated</label>
						<div class="col-md-8">
							<input id='e_g_year_graduated' type="month" name="g_year_graduated" class="form-control" value="" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Employment</label>
						<div class="col-md-8">
							<div class="col-md-6">
								<input id="isNotEmployed" type="radio" name="g_employment" value="0" checked>&nbsp
								<label>Unemployed</label>
							</div>
							<div class="col-md-6" style="padding-left:0;">
								<input id="isEmployed" type="radio" name="g_employment" value="1">&nbsp
								<label>Employed</label>
							</div>
						</div>
					</div>
					<div id="employed_inputs" style="display:none">
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Date Hired</label>
							<div class="col-md-8">
								<input id='e_g_date_hired' type="date" name="g_date_hired" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Job Position</label>
							<div class="col-md-8">
								<input id='e_g_job_position' type="text" name="g_job_position" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Name</label>
							<div class="col-md-8">
								<input id='e_g_company_name' type="text" name="g_company_name" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Business Nature</label>
							<div class="col-md-8">
								<input id='e_g_business_nature' type="text" name="g_business_nature" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Address</label>
							<div class="col-md-8">
								<input id='e_g_company_address' type="text" name="g_company_address" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">HR Person</label>
							<div class="col-md-8">
								<input id='e_g_hr_person' type="text" name="g_hr_person" class="form-control" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="label-control col-md-4">HR Contact No.</label>
							<div class="col-md-8">
								<input id='e_g_hr_no' type="tel" name="g_hr_no" class="form-control" value="" maxlength="11" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="label-control col-md-4">HR Email</label>
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
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
