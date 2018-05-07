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
				<div class='col-xs-12 col-sm-3 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 	col-sm-12 col-md-5">
									<a href='<?= base_url("Admin/")?>'>
										<div class='dashboard-badge'>
											<span id='company_no' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7">
									<div class="dashboard-badge-label">
										<h4>Company</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-3 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-5">
									<a href='<?= base_url("Admin/")?>'>
										<div class='dashboard-badge'>
											<span id='pending_company_no' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7">
									<div class="dashboard-badge-label">
										<h4>Pending Company</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-3 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-5">
									<a href='<?= base_url("Admin/")?>'>
										<div class='dashboard-badge'>
											<span id='app_no' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7">
									<div class="dashboard-badge-label">
										<h4>Applicants</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='col-xs-12 col-sm-3 col-md-3'>
					<div class='card-content'>
						<div class='dashboard-notify'>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-5">
									<a href='<?= base_url("Admin/")?>'>
										<div class='dashboard-badge'>
											<span id='pending_app_no' class='dashboard-badge-no'></span>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-7">
									<div class="dashboard-badge-label">
										<h4>Pending Applicants</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="card-content">
						<canvas id="user_stat_chart" class="graph-canvas"></canvas>
					</div>
				</div>
				<div class='col-md-6'>
					<div class="card-content">
						<canvas id="pending_user_stat_chart" class="graph-canvas"></canvas>
					</div>
				</div>
			</div>
			<div class="row">
				<div class='col-md-12'>
					<div class="card-content">
						<div style="overflow-x:auto">
							<canvas id="myChart" class="graph-canvas"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(function () { 
	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			datasets: [{
				label: '# of Applicants',
				data: [13,19,25,17,22,15,34,63,43,22,8,28],
				backgroundColor: ['rgb(251, 180, 20, 0.25)'],
				borderColor: ['#fbb414'],
				borderWidth: 2
			}, {
				label: '# of Company',
				data: [21,43,1,35,6,51,25,25,53,23,62,11],
				backgroundColor: ['rgb(26, 23, 81, 0.25)'],
				borderColor: ['#1a1751'],
				borderWidth: 2
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
});

</script>
