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
				<div class='col-xs-12 col-sm-6 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Admin/companies")?>'>
								<div class='dashboard-badge'>
									<span id='company_no' class='dashboard-badge-no'></span>
								</div>
							</a>
							<div class="text-center">
								<div class="dashboard-badge-label">
									<h4>Company</h4>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-6 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Admin/pending_companies")?>'>
								<div class='dashboard-badge'>
									<span id='pending_company_no' class='dashboard-badge-no'></span>
								</div>
							</a>
						</div>
						<div class="text-center">
							<div class="dashboard-badge-label">
								<h4>Pending Company</h4>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-6 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Admin/applicants")?>'>
								<div class='dashboard-badge'>
									<span id='app_no' class='dashboard-badge-no'></span>
								</div>
							</a>
						</div>
						<div class="text-center">
							<div class="dashboard-badge-label">
								<h4>Applicants</h4>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-6 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href='<?= base_url("Admin/pending_applicants")?>'>
								<div class='dashboard-badge'>
									<span id='pending_app_no' class='dashboard-badge-no'></span>
								</div>
							</a>
						</div>
						<div class="text-center">
							<div class="dashboard-badge-label">
								<h4>Pending Applicants</h4>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card-content">
						<div class="row">
							<div class="col-md-6">
								<canvas id="user_stat_chart" class="graph-canvas"></canvas>
							</div>
							<div class="col-md-6">
								Users
								<div class="row">
									<div class="col-md-6">
										<span>80%</span>
										<h1>Applicant</h1>
									</div>
									<div class="col-md-6">
										<span>20%</span>
										<h1>Company</h1>
									</div>
								</div>
								Percentage
							</div>
						</div>
					</div>
				</div>
				<div class='col-md-12'>
					<div class="card-content">
						<div class="row">
							<div class="col-md-6">
								<canvas id="pending_user_stat_chart" class="graph-canvas"></canvas>
							</div>
							<div class="col-md-6">
								Employment Status
								<div class="row">
									<div class="col-md-6">
										<span>80%</span>
										<h1>Employed</h1>
									</div>
									<div class="col-md-6">
										<span>20%</span>
										<h1>Unemployed</h1>
									</div>
								</div>
								Percentage
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class="card-content">
						<div style="overflow-x:auto">
							<canvas id="annual_employment_stat" class="graph-canvas"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
