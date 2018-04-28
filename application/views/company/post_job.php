<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>Home
					<i class="fa fa-chevron-right"></i>POST JOB HIRINGS</p>
			</div>

			<div class="card-content">
				<button id='btnpost_job' class="btn btn-success">ADD JOB HIRING</button>
				<div id='hirings'>
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
						<tbody id="showempdata">
						</tbody>
					</table>

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
									<input type="text" name="caddress" class="form-control" >
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">No of Applicants Needed</label>
									<input type="text" name="caddress" class="form-control" >
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Preferred Sex</label>
									<select name="" id="">
										<option value="">Male</option>
										<option value="">Female</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Preferred Civil Status</label>
									<select name="" id="">
										<option value="">Single</option>
										<option value="">Married</option>
										<option value="">Either</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Education</label>
									<select name="" id="">
										<option value="">Elementary Graduate</option>
										<option value="">Highschool Level</option>
										<option value="">Highschool Graduate</option>
										<option value="">College Level</option>
										<option value="">College Graduate</option>
										<option value="">Vocational</option>
									</select>
								</div>
							</div>
							<div class='col-sm-12 col-md-12'>
								<div class="form-group">
									<label for="name" class="label-control">Requirements</label>
									<input type="text" name="caddress" class="form-control" >
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

	</div>
	<!-- /.modal-dialog -->
</div>
