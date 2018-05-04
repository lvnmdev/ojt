<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>Home
					<i class="fa fa-chevron-right"></i> Post Job Hiring</p>
			</div>

			<div class="card-content">
				<div class='card-title'>
					<h1>Post Job</h1>
				</div>
				<div class='card-body'>
					<button value="1" id='btnpost_job' class="btn btn-success">
						<i class='fa fa-plus'></i> Add Post</button>
					<br>
					<br>
					<div id='hirings'>
						<div class='table-responsive'>
							<table id="table_id" class="table table-condensed table-striped table-hover">
								<thead class="jumbotron">
									<tr>
										<th scope="col">Position</th>
										<th scope="col">No. of Applicants Needed</th>
										<th scope="col">Preferred Sex</th>
										<th scope="col">Preferred Civil Status</th>
										<th scope="col">Education</th>
										<th scope="col">Requirements</th>
										<th scope="col">Date Posted</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody id="show_jobs">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="add_job" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-form" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="modal-title"></h1>
					</div>
					<div class="modal-body">
						<form id="form_add_job" class="form-horizontal">
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Position</label>
									<input style='display:hidden;' id='jf_0' type="hidden" name="id" class="form-control">
									<input id="jf_1" type="text" name="position" class="form-control">
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">No. of Applicants Needed</label>
									<input id="jf_2" type="text" name="no_applicants" class="form-control">
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Preferred Sex</label>
									<br>
									<select name="pref_sex" class='selectpicker'>
										<option id="jf_3" value="">-- Select --</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Either">Either</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Preferred Civil Status</label>
									<br>
									<select name="pref_civstat" class='selectpicker'>
										<option id="jf_4" value="">-- Select --</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Either">Either</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Education</label>
									<br>
									<select name="pref_educ" class='selectpicker'>
										<option id="jf_5" value="">-- Select --</option>
										<option value="College Graduate">College Graduate</option>
										<option value="College Level">College Level</option>
										<option value="Highschool Graduate">Highschool Graduate</option>
										<option value="Highschool Level">Highschool Level</option>
										<option value="Vocational">Vocational</option>
										<option value="Elementary Graduate">Elementary Graduate</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Requirements</label>
									<input id="jf_6" placeholder="Separate multiple requirements with a comma (,)" type="text" name="requirements" class="form-control">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							<i class='fa fa-times btn-icon'></i>Cancel</button>
						<button type="button" id="btnsubmit_post" class="btn btn-primary">
							<i class='fa fa-save btn-icon'></i>Save</button>
						<button type="button" id="btnsubmit_post_edit" class="btn btn-success">
							<i class='fa fa-edit btn-icon'></i>Edit</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

	</div>
	<!-- /.modal-dialog -->
</div>
