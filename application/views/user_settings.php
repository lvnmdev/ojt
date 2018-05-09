<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<h1>
					<i class="fa fa-user-cog"></i> User Settings</h1>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class='card-content'>
						<img id="prof_pic" style="width:100px;height:100px;" src="<?= base_url('assets/img/icons/default-profile.png') ?>" alt="Profile"
						class="img img-responsive">
						<form action="upload" method="post" enctype="multipart/form-data">
							<label for="">Select image to upload:</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-paperclip"></i>
								</div>
								<div class="form-control">
									<input type="file" name="image" id="image">
								</div>
								<div class="input-group-btn">
									<button type="submit" name="submit" class="btn btn-default">
										<i class="fa fa-upload"></i> Upload Image</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-content">
						<div class="card-title">
							<h1>Change Password</h1>
						</div>
						<div class="card-body">
							<form method="post" class="form-group">
								<label for="">Password:</label>
								<input type="password" name="" id="" class="form-control" required>
								<label for="">New Password:</label>
								<input type="password" class="form-control" required>
								<label for="">Confirm New Password</label>
								<input type="password" class="form-control" required>
								<div class="card-footer" style="padding-left:0;">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-location-arrow"></i> Submit</button>
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
