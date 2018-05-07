<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>
					<a href="<?= base_url(" Applicant/dashboard ")?>">Home</a>
					<i class="fa fa-chevron-right"></i> Biodata</p>
			</div>

			<div class="card-content">
				<div class='card-title'>
					<h1>Biodata</h1>
				</div>
				<div class="card-body">
					<div class="biodata-form">
						<div class="row">
							<div class='col-xs-12 col-md-12'>
								<h3>User</h3>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-4'>
								<p>Name:</p>
								<input class='form-control' id='user_fullname' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-1'>
								<p>Sex:</p>
								<input class='form-control' id='user_sex' type="text" readonly>
							</div>
							<div class=' col-xs-12 col-md-2'>
								<p>Birthdate:</p>
								<input class='form-control' id='user_birthdate' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-2'>
								<p>Nationality:</p>
								<input class='form-control' id='user_nationality' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-3'>
								<p>Religion:</p>
								<input class='form-control' id='user_religion' type="text" readonly>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-12'>
								<p>Home Address:</p>
								<input class='form-control' id='user_home_address' type="text" readonly>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-12'>
								<p>Current Address:</p>
								<input class='form-control' id='user_current_address' type="text" readonly>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-12'>
								<h3>Mother / Guardian</h3>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-4'>
								<p>Name:</p>
								<input class='form-control' id='mother_fullname' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-3'>
								<p>Birthdate:</p>
								<input class='form-control' id='mother_birthdate' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-3'>
								<p>Occupation:</p>
								<input class='form-control' id='mother_occupation' type="text" readonly>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-12'>
								<h3>Father / Guardian</h3>
							</div>
						</div>
						<div class="row">
							<div class='col-xs-12 col-md-4'>
								<p>Name:</p>
								<input class='form-control' id='father_fullname' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-3'>
								<p>Birthdate:</p>
								<input class='form-control' id='father_birthdate' type="text" readonly>
							</div>
							<div class='col-xs-12 col-md-3'>
								<p>Occupation:</p>
								<input class='form-control' id='father_occupation' type="text" readonly>
							</div>
						</div>
					</div>
					<div class='card-footer'>
						<a id="btnedit_bio" type="button" class="btn btn-success">
							<i class='fa fa-edit btn-icon'></i>Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="edit_bio" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-form modal-biodata" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style='color:white;'>&times;</span>
				</button>
				<h1 class="modal-title">Biodata</h1>
			</div>
			<div class="modal-body">
				<form id="form_bio">
					<div class='row'>
						<div class='col-xs-12 col-sm-4 col-md-4'>
							<div class="form-group ">
								<label for="name" class="label-control">First Name</label>
								<input id='bio_fname' type="text" name="fname" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-4'>
							<div class="form-group">
								<label for="name" class="label-control">Middle Name</label>
								<input id='bio_mname' type="text" name="mname" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-4'>
							<div class="form-group">
								<label for="name" class="label-contro">Last Name</label>
								<input id='bio_lname' type="text" name="lname" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group">
								<label for="name" class="label-control">Sex</label>
								<br>
								<select name="sex" class="selectpicker" style='width:100%;'>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group ">
								<label for="name" class="label-control">Birthdate</label>
								<input id='bio_bday' type="date" name="birthdate" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group">
								<label for="name" class="label-control">Nationality</label>
								<input id='bio_nationality' type="text" name="nationality" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group">
								<label for="name" class="label-control">Religion</label>
								<input id='bio_religion' type="text" name="religion" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-12 col-md-12'>
							<div class="form-group">
								<label for="name" class="label-control">Home Address</label>
								<input id='bio_h' type="text" name="haddress" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-12 col-md-12'>
							<div class="form-group">
								<label for="name" class="label-contro">Current Address</label>
								<input id='bio_c' type="text" name="caddress" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<hr style='width:100%;'>
						<div class='col-xs-12 col-sm-12 col-md-12'>
							<div class="form-group">
								<label for="name" class="label-control">Mother Maiden Name</label>
								<input id='bio_momfname' type="text" name="momfname" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group ">
								<label for="name" class="label-control">Mother Birthdate</label>
								<input id='bio_mombday' type="date" name="mombday" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-4'>
							<div class="form-group ">
								<label for="name" class="label-control">Mother Occupation</label>
								<input id='bio_momwork' type="text" name="momwork" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-12 col-md-12'>
							<div class="form-group">
								<label for="name" class="label-control">Father Full Name</label>
								<input id='bio_dadfname' type="text" name="dadfname" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-xs-12 col-sm-3 col-md-3'>
							<div class="form-group">
								<label for="name" class="label-control">Father Birthdate</label>
								<input id='bio_dadbday' type="date" name="dadbday" class="form-control" value="">
							</div>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-4'>
							<div class="form-group ">
								<label for="name" class="label-control">Father Occupation</label>
								<input id='bio_dadwork' type="text" name="dadwork" class="form-control" value="">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class='fa fa-times btn-icon'></i>Cancel</button>
				<button type="button" id="btnsubmit_bio" class="btn btn-primary">
					<i class='fa fa-save btn-icon'></i>Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
	var page_info = 'biodata';
</script>
