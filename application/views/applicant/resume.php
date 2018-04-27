<!-- Page wrapper  -->
<div class="page-wrapper">
	<!-- Container fluid  -->
	<div class="container-fluid">
		<!-- Bread crumb and right sidebar toggle -->
		<div class="row page-titles">
			<div class="col-md-6 col-8 align-self-center">
				<h3 class="text-themecolor m-b-0 m-t-0">
                    <a type="button" class="btn btn-success" id="btnedit_res">EDIT RESUME</a>
                    <ul id="resume_dropdown" style='display:none;'>
                        <li><a id='addqual' type='button' class='btn btn-primary'>Add Qualifications/Skills</a></li>
                        <li><a id='addwork' type='button' class='btn btn-primary'>Add Working Experince</a></li>
                        <li><a id='addacco' type='button' class='btn btn-primary'>Add Accomplishments</a></li>
                        <li><a id='addeduc' type='button' class='btn btn-primary'>Add Education</a></li>
                        <li><a id='addsemi' type='button' class='btn btn-primary'>Add Seminars Attended</a></li>
                    </ul>
				</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="javascript:void(0)">Home</a>
					</li>
					<li class="breadcrumb-item active">Resume</li>
				</ol>
			</div>
			<div class="col-md-6 col-4 align-self-center">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-block">
								<p>QUALIFICATIONS</p>
								<p>
									<ul id='resume_qualifications'>

									</ul>
								</p>
								<br>

								<p>WORK EXPERIENCE</p>
								<p>
									<ul id='resume_experience'>
										
									</ul>
								</p>
								<br>

								<p>ACCOMPLISHMENTS</p>
								<p>
									<ul id='resume_accomplishments'>
										
									</ul>
								</p>
								<br>

								<p>EDUCATION</p>
								<p>
									<ul id='resume_education'>
									
									</ul>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
    </div>
    

    <div id="edit_resume" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="modal-title"></h1>
			</div>
			<div class="modal-body">
				<form id="form_resume" class="form-horizontal">
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
