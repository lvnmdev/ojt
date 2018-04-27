<div class="mid-container2">
	<div class="title-header">
		<h1 class="text-center">USTP Online OJT Application</h1>
	</div>

	<div class="card-container">
		<div class='container-fluid text-success'>
			<p id="banner-message"></p>
		</div>
		<div class='container-fluid text-danger'>
			<p id="banner-failed"></p>
		</div>

		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form id="regform">
				<div class="form-group">
					<input class="min-form" type="text" name="username" placeholder="Username">
					<div class='container-fluid text-danger' id="banner-warning1" style="display:none"></div>
				</div>
				<div class="form-group">
					<input class="min-form" type="email" name="email" placeholder="Email">
					<div class='container-fluid text-danger' id="banner-warning2" style="display:none"></div>
				</div>
				<div class="form-group">
					<input class="min-form" type="password" name="password" placeholder="Password">
					<div class='container-fluid text-danger' id="banner-warning3" style="display:none"></div>
				</div>
				<div class="form-group">
					<input class="min-form" type="password" name="repassword" placeholder="Confirm Password">
				</div>
				<div class="form-group">
					<label style="color:whitesmoke;">User Type:</label>
					<br>
					<select class="min-form" name="usertype">
						<option class="form-control" value="2">Applicant</option>
						<option class="form-control" value="1">Company</option>
						<option class="form-control" value="0">Admin</option>
					</select>
				</div>
				<div class="form-group">
					<input type="button" id="regbtn" class="min-btn" value="Register"></input>
				</div>
			</form>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-12">
			<p>Already have an account?
				<a href="<?= base_url('/');?>"> Login!</a>
			</p>
		</div>
	</div>
</div>
</div>
