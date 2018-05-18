<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<p class='path-nav'><a href="<?= base_url('Admin/dashboard'); ?>"> Home</a>
					<i class="fa fa-chevron-right"></i> Applicants</p>
			</div>

			<div class="card-content">
				<div class="card-title">
					<h1>Applicant List</h1>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id='table_id' class='table table-striped table-hover'>
							<thead>
								<tr>
									<th>Username</th>
									<th>Name</th>
									<th>Sex</th>
									<th>Email</th>
									<th>Contact Number</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="show_applicant">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="app_info" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Applicant Information</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Name:</strong>
					</p>
					<p id='g_date_graduated' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Sex:</strong>
					</p>
					<p id='g_company_name' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Email:</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Contact No:</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Date Registered:</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button class="btn btn-success">
						<i class="fas fa-user-check btn-icon"></i>Activate</button>
					<button class="btn btn-danger">
						<i class="fa fa-user-times btn-icon"></i>Deactivate</button>
				</center>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
