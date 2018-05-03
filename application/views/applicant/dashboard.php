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

			<div>
				<div class='col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href=''>
								<div class='dashboard-badge'>
									<span id='applications_count' class='dashboard-badge-no'></span>
								</div>

							</a>
							<label>On-Going Applications</label>
						</div>
					</div>
				</div>

				<div class='col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href=''>
								<div class='dashboard-badge'>
									<span id='jobs_count' class='dashboard-badge-no'></span>
								</div>
							</a>
							<label>Available Jobs</label>
						</div>
					</div>
				</div>

				<div class='col-md-4'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href="">
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
