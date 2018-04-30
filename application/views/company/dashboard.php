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
					<li>Pending Application: 5</li>
					<li>Available Employees: 23</li>
					<li>Last time signed in: 4/22/18 2:31pm</li>
				</ul>
			</div>

			<div class='card-content'>
				<div>
					<h2>
						Here is today's available jobs for you!
					</h2>
				</div>
				<div>
					<div class="table-responsive">
					<table class='table table-striped table-hover'>
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Position</th>
								<th>Slot/s</th>
								<th>Date Posted</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Syntactics</td>
								<td>Web Designer</td>
								<td>2</td>
								<td>04/25/2018</td>
								<td></td>
							</tr>
							<tr>
								<td>City Health</td>
								<td>IT Specialist</td>
								<td>4</td>
								<td>04/25/2018</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

