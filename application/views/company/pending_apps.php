<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>
					<a href="<?= base_url('Company/dashboard'); ?>"> Home</a>
					<i class="fa fa-chevron-right"></i> Pending Applications</p>
			</div>

			<div class='card-content'>
				<div class='card-title'>
					<h1>Pending Application</h1>
				</div>
				<div class='card-body'>
					<div class="table-responsive">
						<table id="table_id" class="table table-condensed table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Applicant Name</th>
									<th scope="col">Position Applied</th>
									<th scope="col">Sex</th>
									<th scope="col">Date Applied</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody id="show_applicants">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="view_applicant" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="modal-title"></h1>
			</div>
			<div class="modal-body">
				<div class="card-content">
				<div>
					<h3 class='resume-title'>QUALIFICATIONS</h3>
					<div id='resume_skills'>

					</div>
				</div>

				<div>
					<h3 class='resume-title'>WORK EXPERIENCE</h3>
					<div id='resume_xp'>

					</div>
				</div>

				<div>
					<h3 class='resume-title'>ACCOMPLISHMENTS</h3>
					<div id='resume_accomplishments'>

					</div>
				</div>

				<div>
					<h3 class='resume-title'>EDUCATION</h3>
					<div id='resume_education'>

					</div>
				</div>

				<div>
					<h3 class='resume-title'>SEMINARS</h3>
					<div id="resume_seminar">

					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class='fa fa-times btn-icon'></i>Deny</button>
				<button type="button" id="btnsubmit_post" class="btn btn-primary">
					<i class='fa fa-save btn-icon'></i>Hire</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
