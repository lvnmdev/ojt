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
								<div class="col-md-4">
									<a href='<?= base_url("Applicant/pending_application")?>'>
										<div class='dashboard-badge'>
											<span id='applications_count' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-md-8">
									<label>Ongoing Applications</label>
								</div>
<<<<<<< HEAD
							</a>
							<label>On-Going Applications</label>
=======
							</div>
>>>>>>> 3e73fe5c4f9bb0183673d944e76c1a519f50d905
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-md-4">
									<a href='<?= base_url("Applicant/application")?>'>
										<div class='dashboard-badge'>
											<span id='jobs_count' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-md-8">
									<label>Available Jobs</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-md-4">
									<a href='<?= base_url("Applicant/")?>'>
										<div class='dashboard-badge'>
											<span id='' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-md-8">
									<label>???</label>
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
