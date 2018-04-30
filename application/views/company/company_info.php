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
				<div class='card-title'>
					<h1 id='company_name'></h1>
				</div>
				<div class='card-body'>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Company Description:</strong></p><p id='company_desc' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>HR Manager:</strong></p><p id='company_hr' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Contact No:</strong></p><p id='company_contact' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Company TIN(BIR):</strong></p><p id='company_tin' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Business Permit:</strong></p><p id='company_permit' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Operational Date:</strong></p><p id='company_opdate' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Street:</strong></p><p id='company_street' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Barangay:</strong></p><p id='company_barangay' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
					<div class="row">
						<p class='col-xs-12 col-sm-3 col-md-2'><strong>Postal Code:</strong></p><p id='company_postal' class='col-xs-12 col-sm-9 col-md-10'></p>
					</div>
				</div>
				<div class='card-footer'>
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
