<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>Home
					<i class="fa fa-chevron-right"></i> Company Info</p>
			</div>

			<div class="card-content">
				<div id="comp_info_field">
					<h1>Company name:</h1>
					<p>Company Description:</p>
					<p>HR Manager:</p>
					<p>Contact No: </p>
					<p>Company TIN(BIR): </p>
					<p>Business Permit: </p>
					<p>Operational Date:</p>
					<p>Street:</p>
					<p>Barangay:</p>
					<p>Postal Code:</p>
				</div>
				<div>
					<a id="btnedit_info" type="button" class="btn btn-success"><i class='fa fa-edit btn-icon'></i>EDIT COMPANY INFO</a>
				</div>
			</div>
		</div>
	</div>

	<div id="edit_info" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Company Information</h4>
				</div>
				<div class="modal-body">
					<form id="form_info" class="form-horizontal">
						<input type="hidden" name="txtId" value="0">
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Name</label>
							<div class="col-md-8">
								<input id='comp_info_name' type="text" name="name" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Description</label>
							<div class="col-md-8">
								<input id='comp_info_desc' type="text" name="desc" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">HR Manager</label>
							<div class="col-md-8">
								<input id='comp_info_hr' type="text" name="hrname" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Contact No</label>
							<div class="col-md-8">
								<input id='comp_info_contact' type="text" name="contact" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company TIN (BIR)</label>
							<div class="col-md-8">
								<input id='comp_info_tin' type="text" name="tin" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Business Permit</label>
							<div class="col-md-8">
								<input id='comp_info_permit' type="text" name="permit" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Operational Data</label>
							<div class="col-md-8">
								<input id='comp_info_opdate' type="date" name="opdate" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Address: Street</label>
							<div class="col-md-8">
								<input id='comp_info_addst' type="text" name="addst" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Company Address: Barangay</label>
							<div class="col-md-8">
								<input id='comp_info_addbrgy' type="text" name="addbrgy" class="form-control" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="label-control col-md-4">Postal Code</label>
							<div class="col-md-8">
								<input id='comp_info_postal' type="text" name="postal" class="form-control" value="">
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btnsubmit_info" class="btn btn-primary">Submit</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

</div>
