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
				<div class='col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href=''>
								<div class='dashboard-badge'>
									<span class='dashboard-badge-no'>5</span>
								</div>

							</a>
							<h4><strong>Company</strong></h4>
						</div>
					</div>
				</div>

				<div class='col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href=''>
								<div class='dashboard-badge'>
									<span class='dashboard-badge-no'>3</span>
								</div>
							</a>
							<h4><strong>Pending Company</strong></h4>
						</div>
					</div>
				</div>

				<div class='col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href="">
								<div class='dashboard-badge'>
									<span class='dashboard-badge-no'>14</span>
								</div>
							</a>
							<h4><strong>Applicants</strong></h4>
						</div>
					</div>
				</div>

				<div class='col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<a href="">
								<div class='dashboard-badge'>
									<span class='dashboard-badge-no'>14</span>
								</div>
							</a>
							<h4><strong>Pending Applicants</strong></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
