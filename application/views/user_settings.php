<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<p class='path-nav'>
					<a href="<?= base_url(" Applicant/dashboard ")?>">Home</a>
					<i class="fa fa-chevron-right"></i> User Settings</p>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class='card-content'>
						<div class="card-body">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6">
									<div class="col-xs-12 col-sm-3 col-md-4">
										<div class="user-profile-pic">
											<img id="prof_pic1" src="<?= base_url('assets/img/icons/default-profile.png') ?>" alt="Profile" class="img img-responsive">
										</div>
									</div>
									<div class="col-xs-12 col-sm-9 col-md-8">
										<div class="user-profile-details">
											<h1 id="user_profile_name">

											</h1>
											<h3>
												(<?= $this->session->userdata('username')?>)
											</h3>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row" style="padding-left:10px;">
								<div class="col-xs-12 col-sm-12 col-md-5">
									<div class="user-change-profile">
										<form action="upload" method="post" enctype="multipart/form-data">
											<label>Select image to upload:</label>
											<div class="input-group" style="z-index:0;">
												<div class="input-group-addon">
													<i class="fa fa-paperclip"></i>
												</div>
												<div class="form-control">
													<input type="file" name="image" id="image" style="position:absolute;width:100%;">
												</div>
												<div class="input-group-btn">
													<button type="submit" name="submit" class="btn btn-default">
														<i class="fa fa-upload"></i> Upload Image</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="card-content">
						<div>
							<div class="card-title">
								<h1>Change Username</h1>
							</div>
							<div class="card-body">
								<form method="post" class="form-group">
									<label for="">Username:</label>
									<input type="username" class="form-control" required>
									<label for="">New Username:</label>
									<input type="username" class="form-control" required>
									<label for="">Password:</label>
									<input type="username" class="form-control" required>
									<div class="card-footer" style="padding-left:0;">
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-location-arrow"></i> Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="card-content">
						<div>
							<div class="card-title">
								<h1>Change Password</h1>
							</div>
							<div class="card-body">
								<form method="post" class="form-group">
									<label for="">Password:</label>
									<input type="password" class="form-control" required>
									<label for="">New Password:</label>
									<input type="password" class="form-control" required>
									<label for="">Confirm New Password</label>
									<input type="password" class="form-control" required>
									<div class="card-footer" style="padding-left:0;">
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-location-arrow"></i> Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
