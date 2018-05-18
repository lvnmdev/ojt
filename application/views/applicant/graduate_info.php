<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>
					<a href="<?= base_url("Applicant/dashboard ")?>">Home</a>
					<i class="fa fa-chevron-right"></i> Graduate Information</p>
			</div>

			<div class="card-content">
				<div class='card-title'>
					<h1 id='user_profile_name'></h1>
				</div>
				<div class='card-body'>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Date Graduated:</strong>
						</p>
						<p id='user_date_graduated' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Date Hired:</strong>
						</p>
						<p id='user_date_hired' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>Company Name:</strong>
						</p>
						<p id='user_company_name' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'>
							<strong>HR Person:</strong>
						</p>
						<p id='user_hr_person' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-md-12'>
							<strong>HR Contact Info:</strong>
						</p>
                        <p class='col-xs-12 col-sm-3 col-md-2' style="padding-left:20px;">Contact No.</p>
                        <p id='user_hr_contact_no' class='col-xs-12 col-sm-9 col-md-10'></p>
                        <p class='col-xs-12 col-sm-3 col-md-2' style="padding-left:20px;">Email</p>
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
						<label for="name" class="label-control col-md-4">Date Graduated</label>
						<div class="col-md-8">
							<input id='e_g_date_graduated' type="date" name="g_date_graduated" class="form-control" value="" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Date Hired</label>
						<div class="col-md-8">
							<input id='e_g_date_hired' type="date" name="g_date_hired" class="form-control" value="" required>
						</div>
					</div>
                    <div class="form-group">
						<label for="name" class="label-control col-md-4">Company Name</label>
						<div class="col-md-8">
							<input id='e_g_company_name' type="text" name="g_company_name" class="form-control" value="" required>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">HR Person</label>
						<div class="col-md-8">
							<input id='e_g_hr_person' type="text" name="g_hr_person" class="form-control" value="" required>
						</div>
					</div>
					<div class="form-group">
						<label class="label-control col-md-12">HR Contact Info:</label>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-md-4"> &nbsp Contact No.</label>
						<div class="col-md-8">
							<input id='e_g_hr_no' type="number" name="g_hr_no" class="form-control" value="" maxlength="11" required>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-md-4"> &nbsp Email</label>
						<div class="col-md-8">
							<input id='e_g_hr_email' type="email" name="g_hr_email" class="form-control" value="" required>
						</div>
					</div>
					<div class="card-footer" style="padding-left:0;">
						<button type="submit" id="btnsubmit_info" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
