<div class='col-xs-7 col-sm-8 col-md-9 col-ls-9'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>Home <i class="fa fa-chevron-right"></i> Biodata</p>
			</div>

			<div class="card-content">
				<div id="bio_field">
					<p>Fullname: | Sex: | Birthdate: </p>
					<p> Nationality: | Religion: </p>
					<p>Home Address: | Current Address: </p>

					<br>
					<p>MOTHER/GUARDIAN</p>
					<p>Fullname: | Birthdate: | Occupation:</p>

					<br>
					<p>FATHER/GUARDIAN</p>
					<p>Fullname: | Birthdate: | Occupation:</p>
				</div>
				<a id="btnedit_bio" type="button" class="btn btn-success"><i class='fa fa-edit btn-icon'></i>Edit</a>
			</div>
		</div>
	</div>
</div>

<div id="edit_bio" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="modal-title">Biodata</h1>
			</div>
			<div class="modal-body">
				<form id="form_bio" class="form-horizontal">
					<input type="hidden" name="txtId" value="0">
					<div class="form-group">
						<label for="name" class="label-control col-md-2">First Name</label>
						<div class="col-md-3">
							<input id='bio_fname' type="text" name="fname" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-2">Middle Name</label>
						<div class="col-md-3">
							<input id='bio_mname' type="text" name="mname" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Last Name</label>
						<div class="col-md-8">
							<input id='bio_lname' type="text" name="lname" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Nationality</label>
						<div class="col-md-8">
							<input id='bio_nationality' type="text" name="nationality" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Religion</label>
						<div class="col-md-8">
							<input id='bio_religion' type="text" name="religion" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Sex</label>
						<div class="col-md-8">
							<select name="sex" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Home Address</label>
						<div class="col-md-8">
							<input id='bio_h' type="text" name="haddress" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Current Address</label>
						<div class="col-md-8">
							<input id='bio_c' type="text" name="caddress" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Birthdate</label>
						<div class="col-md-8">
							<input id='bio_bday' type="date" name="birthdate" class="form-control" value="">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Mother Maiden Name</label>
						<div class="col-md-8">
							<input id='bio_momfname' type="text" name="momfname" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Mother Birthdate</label>
						<div class="col-md-8">
							<input id='bio_mombday' type="date" name="mombday" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Mother Occupation</label>
						<div class="col-md-8">
							<input id='bio_momwork' type="text" name="momwork" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Father Full Name</label>
						<div class="col-md-8">
							<input id='bio_dadfname' type="text" name="dadfname" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Father Birthdate</label>
						<div class="col-md-8">
							<input id='bio_dadbday' type="date" name="dadbday" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="label-control col-md-4">Father Occupation</label>
						<div class="col-md-8">
							<input id='bio_dadwork' type="text" name="dadwork" class="form-control" value="">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class='fa fa-times btn-icon'></i>Cancel</button>
				<button type="button" id="btnsubmit_bio" class="btn btn-primary"><i class='fa fa-save btn-icon'></i>Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
