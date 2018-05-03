$(function () {
		show_bio_data();
		resume_checker();		
		show_resume();
		show_available_jobs();
		show_pending_application();

	function show_pending_application(){
		var html = '';
		var i;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'count_applications',
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				$('#applications_count').html(response.data.pending_applicant)

			},
			error: function () {
				alert('Error');

			}
		});
	}
	
	function resume_checker(){
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if(!response.success){
					window.location.href = 'resume';
				}
			},
			error: function () {
				alert('Error');
			}

	});
}


	//For Biodata Functions Start HERE!
	function show_bio_data() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_bio',
			async: true,
			dataType: 'json',
			success: function (response) {
				var html = '';
				console.log(response);
				if (response.success) {
					$("#user_fullname").val(response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname);
					$("#user_sex").val(response.data.sex);
					$("#user_birthdate").val(response.data.birthdate);
					$("#user_nationality").val(response.data.nationality);
					$("#user_religion").val(response.data.religion);
					$("#user_home_address").val(response.data.haddress);
					$("#user_current_address").val(response.data.caddress);
					$("#mother_fullname").val(response.data.momfname);
					$("#mother_birthdate").val(response.data.mombday);
					$("#mother_occupation").val(response.data.momwork);
					$("#father_fullname").val(response.data.dadfname);
					$("#father_birthdate").val(response.data.dadbday);
					$("#father_occupation").val(response.data.dadwork);
				}

			},
			error: function () {
				alert('Error');
			}
		});
	}

	$('#btnedit_bio').click(function () {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_bio',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$("#bio_fname").val(response.data.fname);
					$("#bio_mname").val(response.data.mname);
					$("#bio_lname").val(response.data.lname);
					$("#bio_nationality").val(response.data.nationality);
					$("#bio_religion").val(response.data.religion);
					$("#bio_h").val(response.data.haddress);
					$("#bio_c").val(response.data.caddress);
					$("#bio_bday").val(response.data.birthdate);
					$("#bio_momfname").val(response.data.momfname);
					$("#bio_mombday").val(response.data.mombday);
					$("#bio_momwork").val(response.data.momwork);
					$("#bio_dadfname").val(response.data.dadfname);
					$("#bio_dadbday").val(response.data.dadbday);
					$("#bio_dadwork").val(response.data.dadwork);
				}
			},
			error: function () {
				alert('Error');
			}
		});
		$('#edit_bio').modal('show');
	})

	$('#btnsubmit_bio').click(function () {
		var formData = $('#form_bio').serialize();
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_bio',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.operation == 'insert') {
					alert('data inserted');
				} else if (response.operation == 'update') {
					alert('data updated');
				}
				location.reload();

			},
			error: function () {
				alert('Error');
			}
		});
	});
	//For Biodata Functions End HERE!
	//For Resume Functions Start HERE!
	var form = '<div class="form-group">' +
		'<input id="data_input" style="display:none;" name="data_input" class="form-control">' +

		'<label id="super_input" class="label-control col-md-2"></label>' +
		'<div class="col-md-6">' +
		'<input id="input" type="text" name="" class="form-control">' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form1">' +
		'<label id="super_input1" class="label-control col-md-2"></label>' +
		'<div class="col-md-6">' +
		'<input id="input1" name="" class="form-control">' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form2">' +
		'<label id="super_input2" class="label-control col-md-2"></label>' +
		'<div class="col-md-6">' +
		'<input id="input2" name="" class="form-control">' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form3">' +
		'<label id="super_input3" class="label-control col-md-2"></label>' +
		'<div class="col-md-6">' +
		'<input id="input3" name="" class="form-control">' +
		'</div>' +
		'</div>'

	$('#addqual').click(function () {
		var i = 0;
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Qualifications/Skills');
		$('#form_resume').html(form);
		$('#super_input').text('Add Skill');

		$('#input').attr('name', 'skill');

		$('#hide_form1').css({
			'display': 'none'
		});
		$('#hide_form2').css({
			'display': 'none'
		});
		$('#hide_form3').css({
			'display': 'none'
		});

		$('#data_input').val('skill');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				if (data.skills) {
					for (i = 0; i < data.skills.length; i++) {
						html += '<ul class="resume-list">' +
							'<li>' + data.skills[i].skill + '&nbsp<span><a type="button" class="resume-delete"><i class="fa fa-times"></i></a></span></li>' +
							'</ul>';
					}
					$('#edit_form_resume').html(html);
				}
			},
			error: function (data) {

			}
		})
	})

	$('#addwork').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Working Experience');
		$('#form_resume').html(form);

		$('#super_input').text('Position');
		$('#super_input1').text('Company');
		$('#super_input2').text('Date Started');
		$('#super_input3').text('Date Ended');

		$('#input1').attr('type', 'text');
		$('#input2').attr('type', 'date');
		$('#input3').attr('type', 'date');

		$('#input').attr('name', 'position');
		$('#input1').attr('name', 'company');
		$('#input2').attr('name', 'date_start');
		$('#input3').attr('name', 'date_end');

		$('#data_input').val('work');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				if (data.workxp) {
					for (i = 0; i < data.workxp.length; i++) {
						html += '<ul class="resume-list">' +
							'<li>' + data.workxp[i].position + '&nbsp<span><a type="button" class="resume-delete"><i class="fa fa-times"></i></a></span></li>' +
							'<li>' + data.workxp[i].company + '</li>' +
							'<li>' + data.workxp[i].date_start + '</li>' +
							'<li>' + data.workxp[i].date_end + '</li>' +
							'</ul>';
					}
					$('#edit_form_resume').html(html);
				}
			},
			error: function (data) {

			}
		})
	})

	$('#addacco').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Accomplishments');
		$('#form_resume').html(form);

		$('#super_input').text('Accomplishment');
		$('#super_input1').text('Affiliation');

		$('#input1').attr('type', 'text');

		$('#input').attr('name', 'accomplishment');
		$('#input1').attr('name', 'affiliation');

		$('#data_input').val('accomplishment');

		$('#hide_form2').css({
			'display': 'none'
		});
		$('#hide_form3').css({
			'display': 'none'
		});

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				if (data.accomplishment) {
					for (i = 0; i < data.accomplishment.length; i++) {
						html += '<ul class="resume-list">' +
							'<li>' + data.accomplishment[i].accomplishment + '&nbsp<span><a type="button" class="resume-delete"><i class="fa fa-times"></i></a></span></li>' +
							'<li>' + data.accomplishment[i].affiliation + '</li>' +
							'</ul>';
					}
					$('#edit_form_resume').html(html);
				}
			},
			error: function (data) {

			}
		})
	})

	$('#addeduc').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Educational Background');
		$('#form_resume').html(form);

		$('#super_input').text('Level');
		$('#super_input1').text('Name of School');
		$('#super_input2').text('Date Started');
		$('#super_input3').text('Date Graduated');

		$('#input1').attr('type', 'text');
		$('#input2').attr('type', 'date');
		$('#input3').attr('type', 'date');

		$('#input').attr('name', 'level');
		$('#input1').attr('name', 'school');
		$('#input2').attr('name', 'start');
		$('#input3').attr('name', 'graduate');

		$('#data_input').val('education');

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				if (data.education) {
					for (i = 0; i < data.education.length; i++) {
						html += '<ul class="resume-list">' +
							'<li>' + data.education[i].level + '&nbsp<span><a type="button" class="resume-delete"><i class="fa fa-times"></i></a></span></li>' +
							'<li>' + data.education[i].school + '</li>' +
							'<li>' + data.education[i].start + '</li>' +
							'<li>' + data.education[i].graduated + '</li>' +
							'</ul>';
					}
					$('#edit_form_resume').html(html);
				}
			},
			error: function (data) {

			}
		})

	})

	$('#addsemi').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Seminars Attended');
		$('#form_resume').html(form);

		$('#super_input').text('Name of Seminar');
		$('#super_input1').text('Date');
		$('#super_input2').text('Conducted by');

		$('#input1').attr('type', 'date');
		$('#input2').attr('type', 'text');

		$('#input').attr('name', 'seminar');
		$('#input1').attr('name', 'seminar_date');
		$('#input2').attr('name', 'conductedby');

		$('#data_input').val('seminar');

		$('#hide_form3').css({
			'display': 'none'
		});

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				if (data.seminars) {
					for (i = 0; i < data.seminars.length; i++) {
						html += '<ul class="resume-list">' +
							'<li>' + data.seminars[i].seminar + '&nbsp<span><a type="button" class="resume-delete"><i class="fa fa-times"></i></a></span></li>' +
							'<li>' + data.seminars[i].seminar_date + '</li>' +
							'<li>' + data.seminars[i].conductedby + '</li>' +
							'</ul>';
					}
					$('#edit_form_resume').html(html);
				}
			},
			error: function (data) {

			}
		})

	})

	$('#btnsubmit_resume').click(function () {
		var formData = $('#form_resume').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_resume',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					alert('inserted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});
	})

	function show_resume() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				console.log(data);
				var skills = '';
				var xp = '';
				var accomplishments = '';
				var seminar = '';
				var education = '';
				var i;
				if (data.seminars) {
					for (i = 0; i < data.seminars.length; i++) {
						seminar += '<ul class="resume-list">' +
							'<li>' + data.seminars[i].seminar + '</li>' +
							'<li>' + data.seminars[i].seminar_date + '</li>' +
							'<li>' + data.seminars[i].conductedby + '</li>' +
							'</ul>';
					}
					$('#resume_seminar').html(seminar);
				}
				if (data.accomplishment) {
					for (i = 0; i < data.accomplishment.length; i++) {
						accomplishments += '<ul class="resume-list">' +
							'<li>' + data.accomplishment[i].accomplishment + '</li>' +
							'<li>' + data.accomplishment[i].affiliation + '</li>' +
							'</ul>';
					}
					$('#resume_accomplishments').html(accomplishments);
				}
				if (data.skills) {
					for (i = 0; i < data.skills.length; i++) {
						skills += '<ul class="resume-list">' +
							'<li>' + data.skills[i].skill + '</li>' +
							'</ul>';
					}
					$('#resume_skills').html(skills);
				}
				if (data.workxp) {
					for (i = 0; i < data.workxp.length; i++) {
						xp += '<ul class="resume-list">' +
							'<li>' + data.workxp[i].position + '</li>' +
							'<li>' + data.workxp[i].company + '</li>' +
							'<li>' + data.workxp[i].date_start + '</li>' +
							'<li>' + data.workxp[i].date_end + '</li>' +
							'</ul>';
					}
					$('#resume_xp').html(xp);
				}

				if (data.education) {
					for (i = 0; i < data.education.length; i++) {
						education += '<ul class="resume-list">' +
							'<li>' + data.education[i].level + '</li>' +
							'<li>' + data.education[i].school + '</li>' +
							'<li>' + data.education[i].start + '</li>' +
							'<li>' + data.education[i].graduated + '</li>' +
							'</ul>';
					}
					$('#resume_education').html(education);
				}



			},
			error: function () {
				alert('Error');
			}
		});
	}



	function show_available_jobs() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_available_jobs',
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response.data);
				var html = '';
				var i;
				if (response.data) {
					for (i = 0; i < response.data.length; i++) {
						html += '<tr>' +
							'<td>' + response.data[i].comp_name + '</td>' +
							'<td>' + response.data[i].position + '</td>' +
							'<td>' + response.data[i].no_applicants + '</td>' +
							'<td>' + response.data[i].pref_sex + '</td>' +
							'<td>' + response.data[i].pref_civstat + '</td>' +
							'<td>' + response.data[i].pref_educ + '</td>' +
							'<td>' + response.data[i].requirements + '</td>' +
							'<td>' + response.data[i].date_posted + '</td>' +
							'<td><button class="btn btn-success apply" value="' + response.data[i].job_id + '">Apply </button></td>' +
							'</tr>'
					}
					$('#show_jobs').html(html)
				}
			},
			error: function () {
				alert('Error');
			}
		});
	}
	var job_id_app;
	$('.apply').click(function (e) {
		job_id_app = $(e.currentTarget).val();
		$('#apply_job').modal('show');
		$('.modal-title').text('Confirm Apply');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_available_jobs',
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response.data);
				var html = '';
				var i;
				if (response.data) {
					for (i = 0; i < response.data.length; i++) {
						if (response.data[i].job_id == job_id_app) {
							html += '<tr>' +
								'<td>' + response.data[i].comp_name + '</td>' +
								'<td>' + response.data[i].position + '</td>' +
								'<td>' + response.data[i].no_applicants + '</td>' +
								'<td>' + response.data[i].pref_sex + '</td>' +
								'<td>' + response.data[i].pref_civstat + '</td>' +
								'<td>' + response.data[i].pref_educ + '</td>' +
								'<td>' + response.data[i].requirements + '</td>' +
								'<td>' + response.data[i].date_posted + '</td>' +
								'</tr>'
						}
					}
					$('#job_desc').html(html)
				}
			},
			error: function () {
				alert('Error');
			}
		})
	})

	$('#confirm_app').click(function () {
		var job_id = job_id_app;
		console.log(job_id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'apply_job',
			data: {
				id: job_id
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					alert('inserted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});
	})
})
