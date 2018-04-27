<div class='col-xs-7 col-sm-8 col-md-10 col-ls-9'>
	<div class='card-content'>
		<h1>Welcome
			<?= $this->session->userdata('username')?>!</h1>
		<p>Here is today's newsletter!</p>
		<ul>
			<li>Pending Application: 5</li>
			<li>Last time signed in: 4/22/18</li>
			<li>Gash</li>
		</ul>
	</div>
	<div class='card-content'>
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
