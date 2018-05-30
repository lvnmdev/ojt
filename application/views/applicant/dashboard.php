<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<h1>Welcome
					<?= $this->session->userdata('username')?>!</h1>
				<p>Here is today's newsletter!</p>
				<ul>
					<li>Last time signed in: 4/22/18 2:31pm</li>
				</ul>
			</div>

			<div class="row">
				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4">
									<a href='<?= base_url("Applicant/ongoing_application")?>'>
										<div class='dashboard-badge'>
											<span id='applications_count' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-8">
									<div class="dashboard-badge-label">
										<h4>Ongoing Applications</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4">
									<a href='<?= base_url("Applicant/application")?>'>
										<div class='dashboard-badge'>
											<span id='jobs_count' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-8">
									<div class="dashboard-badge-label">
										<h4>Available Jobs</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4">
									<a href='<?= base_url("Applicant/")?>'>
										<div class='dashboard-badge'>
											<span id='' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-8">
									<div class="dashboard-badge-label">
										<h4>???</h4>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="ze_question" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" style="margin: 10% 26%;text-align:center;">
	<div class="modal-dialog modal-form modal-biodata" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Are you currently employed?</h1>
			</div>
			<div class="modal-body">
				<form method='post'>
					<div>
						<a href="graduate_info" type="button" class="btn btn-primary">
							<i class='fa fa-check btn-icon'></i>Yes</a>
						<a href="resume" type="button" class="btn btn-danger">
							<i class='fa fa-times btn-icon'></i>No</a>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	var page_info = 'dashboard';
</script>
