<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<p class='path-nav'><a href="<?= base_url('Admin/dashboard'); ?>"> Home</a>
					<i class="fa fa-chevron-right"></i> Pending Hiring</p>
			</div>

			<div class="card-content">
				<div class="card-title">
					<h1>Pending Hiring List</h1>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id='table_id' class='table table-striped table-hover'>
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Date Registered</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody id="show_pending_applicant">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
