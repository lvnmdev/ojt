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

			<div class="card-content">
				<canvas id="myChart" class="graph-canvas"></canvas>
			</div>
		</div>
	</div>
</div>
<script>
var ctx = $("#myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
            label: '# of Applicants',
            data: [13, 19, 25, 17, 22, 15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
