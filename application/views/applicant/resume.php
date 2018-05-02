<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<!-- Bread crumb and right sidebar toggle -->
			<div class='card-content'>
				<p class='path-nav'>Home
					<i class="fa fa-chevron-right"></i> Resume</p>
			</div>

			<div class="card-content">
				<div>
					<h4 class='resume-title'>QUALIFICATIONS</h4>
					<div id='resume_skills'>

					</div>
					<a id='addqual' type='button' class='btn btn-success'><i class="fa fa-edit"></i> Add Qualifications/Skills</a>
				</div>
				
				<div>
					<h4 class='resume-title'>WORK EXPERIENCE</h4>
					<div id='resume_xp'>

					</div>
					<a id='addwork' type='button' class='btn btn-success'><i class="fa fa-edit"></i> Add Working Experince</a>
				</div>

				<div>
					<h4 class='resume-title'>ACCOMPLISHMENTS</h4>
					<div id='resume_accomplishments'>

					</div>
					<a id='addacco' type='button' class='btn btn-success'><i class="fa fa-edit"></i> Add Accomplishments</a>
				</div>

				<div>
					<h4 class='resume-title'>EDUCATION</h4>
					<div id='resume_education'>

					</div>
					<a id='addeduc' type='button' class='btn btn-success'><i class="fa fa-edit"></i> Add Education</a>
				</div>

				<div>
					<h4 class='resume-title'>SEMINARS</h4>
					<div id="resume_seminar">

					</div>
					<a id='addsemi' type='button' class='btn btn-success'> <i class="fa fa-edit"></i>Add Seminars Attended</a>
				</div>
			</div>

		</div>

		<div id="edit_resume" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-form" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h1 class="modal-title"></h1>
					</div>
					<div class="modal-body">
						<div class=''>
							<div id="edit_form_resume">
							</div>
						</div>
						<div>
							<hr>
							<form id="form_resume" class="form-horizontal">
							</form>
							<hr>
							<button id="btnsubmit_resume" class="btn btn-primary">
								<i class='fa fa-plus btn-icon'></i>Add</button>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">
							<i class='fa fa-times btn-icon'></i>Close</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	var page_info = 'nobiodata';
</script>
