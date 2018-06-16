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
					<li><strong>Date registered: </strong><span id="u_date_registered"></span></li>
					<li><strong>Last time you have updated your biodata: </strong> <span id="u_date_biodata"></span></li>
					<li><strong>Last time you have updated your graduate info: </strong><span id="u_date_graduate_info"></span></li>
				</ul>
			</div>

			<div class="row">
				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Applicant/ongoing_application")?>'>
								<div class='dashboard-badge'>
									<span id='applications_count' class='dashboard-badge-no'></span>
								</div>
							</a>
						</div>
						<div class="text-center">
							<div class="dashboard-badge-label">
								<h4>Ongoing Applications</h4>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Applicant/application")?>'>
								<div class='dashboard-badge'>
									<span id='jobs_count' class='dashboard-badge-no'></span>
								</div>
							</a>
							<div class="text-center">
								<div class="dashboard-badge-label">
									<h4>Available Jobs</h4>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Applicant/resume")?>'>
								<div class='dashboard-badge'>
									<span id='has_resume' class='dashboard-badge-no'></span>
								</div>
							</a>
							<div class="text-center">
								<div class="dashboard-badge-label">
									<h4>Resume</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var page_info = 'dashboard';
</script>
