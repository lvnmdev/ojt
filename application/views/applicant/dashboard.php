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
							<div>
								<a href='<?= base_url("Applicant/pending_application")?>'>
								<div class='dashboard-badge'>
									<span id='applications_count' class='dashboard-badge-no'></span>
								</div>
							</a>
<<<<<<< HEAD
							<label>On-Going Applications</label>
=======
							</div>
							<div>
								<label>Pending Applications</label>
							</div>
							
>>>>>>> e3cd4def09383ec6d2c6f12797d65fb2ef46da66
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
							<label>Available Jobs</label>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-4 col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href="<?= base_url()?>">
								<div class='dashboard-badge'>
									<span class='dashboard-badge-no'></span>
								</div>
							</a>
							<label></label>
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
