<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<p class='path-nav'><a href="<?= base_url('Admin/dashboard'); ?>"> Home</a>
					<i class="fa fa-chevron-right"></i> Company</p>
			</div>
			<div class="card-content">
				<div class="card-title">
					<h1>Company List</h1>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id='table_id' class='table table-striped table-hover'>
							<thead>
								<tr>
									<th>Company Name</th>
									<th>Company Description</th>
									<th>Company HR</th>
									<th>Company Email</th>
									<th>Contact Number</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="show_company">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="comp_info" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Company Information</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Company Name:</strong>
					</p>
					<p id='g_date_graduated' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Company Description:</strong>
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
						<strong>Company TIN(BIR):</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Company Permit:</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Contact No.</strong>
					</p>
					<p id='g_hr_person' class='col-xs-12 col-sm-9 col-md-6'></p>
				</div>
				<div class="row">
					<p class='col-xs-12 col-sm-3 col-md-4'>
						<strong>Operational Date:</strong>
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
						<i class="fas fa-user-check btn-icon"></i>Approve</button>
					<button class="btn btn-danger">
						<i class="fa fa-user-times btn-icon"></i>Deny</button>
				</center>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>