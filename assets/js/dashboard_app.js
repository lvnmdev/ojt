var job_ids = [];

$(function () {
	show_bio_data();
	show_resume();
	show_ongoing_applications();
	count_dashboard();
	show_available_jobs();
	show_graduate_info();

	$('#graduate_form_info').submit(function () {
		var formData = $('#graduate_form_info').serialize();
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_graduate_info',
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
			},
			error: function () {
				alert('Error');
			}
		});
	});

	function show_graduate_info() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_graduate_info',
			async: true,
			dataType: 'json',
			success: function (response) {	
				console.log(response);
				if (response.success) {
					$("#user_date_graduated").html(response.data[0].date_graduated);
					$("#user_date_hired").html(response.data[0].date_hired);
					$("#user_company_name").html(response.data[0].company_name);
					$("#user_hr_person").html(response.data[0].hr_person);
					$("#user_hr_contact_no").html(response.data[0].hr_contact_no);
					$("#user_hr_email").html(response.data[0].hr_email);
				}
			},
			error: function () {
				alert('Error');
			}
		});
	}


	function count_dashboard() {
		var html = '';
		var i;
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'count_dashboard',
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.data != null) {
					$('#applications_count').html(response.data.pending_applicant);
				} else {
					$('#applications_count').html(0);
				}
				if (response.data1 != null) {
					if (response.data != null) {
						console.log(response.data1.jobs_posted)

						console.log(response.data.pending_applicant)


						$('#jobs_count').html(response.data1.jobs_posted - response.data.pending_applicant);
					}
					else {
						$('#jobs_count').html(response.data1.jobs_posted);
					}
				} else {
					$('#jobs_count').html(0);
				}
			},
			error: function () {
				alert('Error');
			}

		});
	}
	var image = 0;
	$('.btn-default').attr('disabled', 'disabled');
	$('#image').click(function () {
		$('.btn-default').removeAttr('disabled');
		setInterval(function () {
			if ($('#image').val().length < 1) {
				$('.btn-default').attr('disabled', 'disabled');
			} else {
				$('.btn-default').removeAttr('disabled');
			}
		}, 0)
	})
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
					$("#user_contact_no").val(response.data.contact_no);
					$("#user_religion").val(response.data.religion);
					$("#user_home_address").val(response.data.haddress);
					$("#user_current_address").val(response.data.caddress);
					$("#mother_fullname").val(response.data.momfname);
					$("#mother_birthdate").val(response.data.mombday);
					$("#mother_occupation").val(response.data.momwork);
					$("#father_fullname").val(response.data.dadfname);
					$("#father_birthdate").val(response.data.dadbday);
					$("#father_occupation").val(response.data.dadwork);
					if (response.pic) {
						$('#prof_pic').attr('src', '../../ojt/' + response.pic.photo_path);
						$('#prof_pic1').attr('src', '../../ojt/' + response.pic.photo_path);
					} else {

					}
					$('#user_profile_name').html(response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname);

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
					$("#bio_contact_no").val(response.data.contact_no);
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

	$('#form_bio').submit(function () {
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
			},
			error: function () {
				alert('Error');
			}
		});
	});
	
	//For Biodata Functions End HERE!
	//For Resume Functions Start HERE!
	$('#btnsubmit_resume').attr('disabled', 'disabled');
	var form = '<div class="form-group">' +
		'<input id="data_input" style="display:none;" name="data_input" class="form-control">' +

		'<label id="super_input" class="label-control col-md-3" style="padding: 6px 12px;"></label>' +
		'<div class="col-md-8">' +
		'<input id="input" type="text" name="" class="form-control" >' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form1">' +
		'<label id="super_input1" class="label-control col-md-3" style="padding: 6px 12px;"></label>' +
		'<div class="col-md-8">' +
		'<input id="input1" name="" class="form-control" >' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form2">' +
		'<label id="super_input2" class="label-control col-md-3" style="padding: 6px 12px;"></label>' +
		'<div class="col-md-8">' +
		'<input id="input2" name="" class="form-control" >' +
		'</div>' +
		'</div>' +

		'<div class="form-group" id="hide_form3">' +
		'<label id="super_input3" class="label-control col-md-3" style="padding: 6px 12px;"></label>' +
		'<div class="col-md-8">' +
		'<input id="input3" name="" class="form-control" >' +
		'</div>' +
		'</div>'
	var checker;
	var checker1;
	$('#addqual').click(function () {
		$('#edit_form_resume').html('');
		var i = 0;
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Qualifications/Skills');
		$('#form_content').html(form);
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
		$('#input').keyup(function () {
			var checker = $('#input').val();
			if (checker.length > 0) {
				if (/^[a-zA-Z0-9- ]*$/.test(checker) == true) {
					$('#btnsubmit_resume').removeAttr('disabled');

				}
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				if (data.skills) {
					var edit_skills = "";
					for (i = 0; i < data.skills.length; i++) {
						edit_skills += '<div class="col-xs-11 col-sm-11 col-md-11"><ul class="resume-list">' +
							'<li>' + data.skills[i].skill + '</li>' +
							'</div></ul>' +
							'<div class="col-xs-1 col-sm-1 col-md-1">' +
							'<button class="resume-delete skill-delete" id="' + i + '" value="' + data.skills[i].skill_id + '"><i class="fa fa-times"></i></button>' +
							'</div>';
					}
					$('#edit_form_resume').html(edit_skills);
				}
			},
			error: function (data) {

			}
		})
	})




	$('#addwork').click(function () {
		$('#edit_form_resume').html('');
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Working Experience');
		$('#form_content').html(form);

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
		$('#input2').attr('required', 'required');
		$('#input3').attr('required', 'required');

		$('#data_input').val('work');



		$('#input').keyup(function () {
			checker = $('#input').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$('#input1').keyup(function () {
			checker1 = $('#input1').val();
			if (checker.length > 0 && checker1.length > 0) {
				if (/^[a-zA-Z0-9- ]*$/.test(checker) == false) {
					$('#btn_submit_resume').attr('disabled', 'disabled');
				}
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});


		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var edit_workxp = '';
				if (data.workxp) {
					for (i = 0; i < data.workxp.length; i++) {
						edit_workxp += '<div class="col-xs-11 col-sm-11 col-md-11"><ul class="resume-list">' +
							'<li>' + data.workxp[i].position + '</li>' +
							'<li>' + data.workxp[i].company + '</li>' +
							'<li>' + data.workxp[i].date_start + '</li>' +
							'<li>' + data.workxp[i].date_end + '</li>' +
							'</div></ul>' +
							'<div class="col-xs-1 col-sm-1 col-md-1">' +
							'<button class="resume-delete work-delete" id="' + i + '" value="' + data.workxp[i].work_id + '"><i class="fa fa-times"></i></button>' +
							'</div>';

					}
					$('#edit_form_resume').html(edit_workxp);
				}
			},
			error: function (data) {

			}
		})
	})

	$('#addacco').click(function () {
		$('#edit_form_resume').html('');
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Accomplishments');
		$('#form_content').html(form);

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
		$('#input').keyup(function () {
			checker = $('#input').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$('#input1').keyup(function () {
			checker1 = $('#input1').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var edit_accomplishment = '';
				if (data.accomplishment) {
					for (i = 0; i < data.accomplishment.length; i++) {
						edit_accomplishment += '<div class="col-xs-11 col-sm-11 col-md-11"><ul class="resume-list">' +
							'<li>' + data.accomplishment[i].accomplishment + '</li>' +

							'<li>' + data.accomplishment[i].affiliation + '</li>' +
							'</div></ul>' +
							'<div class="col-xs-1 col-sm-1 col-md-1">' +
							'<button class="resume-delete acc-delete" id="' + i + '" value="' + data.accomplishment[i].accomplishment_id + '"><i class="fa fa-times"></i></button>' +
							'</div>';
					}
					$('#edit_form_resume').html(edit_accomplishment);
				}
			},
			error: function (data) {

			}
		})
	});
	$('#addeduc').click(function () {
		$('#edit_form_resume').html('');
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Educational Background');
		$('#form_content').html(form);

		$('#super_input').text('Level');
		$('#super_input1').text('Name of School');
		$('#super_input2').text('Date Started');
		$('#super_input3').text('Date Graduated');

		$('#input1').attr('type', 'text');
		$('#input2').attr('type', 'date');
		$('#input3').attr('type', 'date');
		$('#input2').attr('required', 'required');
		$('#input3').attr('required', 'required');

		$('#input').attr('name', 'level');
		$('#input1').attr('name', 'school');
		$('#input2').attr('name', 'start');
		$('#input3').attr('name', 'graduate');

		$('#data_input').val('education');
		$('#input').keyup(function () {
			checker = $('#input').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$('#input1').keyup(function () {
			checker1 = $('#input1').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var edit_education = '';
				if (data.education) {
					for (i = 0; i < data.education.length; i++) {
						edit_education += '<div class="col-xs-11 col-sm-11 col-md-11"><ul class="resume-list">' +
							'<li>' + data.education[i].level + '</li>' +

							'<li>' + data.education[i].school + '</li>' +
							'<li>' + data.education[i].start + '</li>' +
							'<li>' + data.education[i].graduated + '</li>' +
							'</div></ul>' +
							'<div class="col-xs-1 col-sm-1 col-md-1">' +
							'<button class="resume-delete educ-delete" id="' + i + '" value="' + data.education[i].educ_id + '"><i class="fa fa-times"></i></button>' +
							'</div>';

					}
					$('#edit_form_resume').html(edit_education);
				}
			},
			error: function (data) {

			}
		})

	})

	$('#addsemi').click(function () {
		$('#edit_form_resume').html('');
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Seminars Attended');
		$('#form_content').html(form);

		$('#super_input').text('Name of Seminar');
		$('#super_input1').text('Date');
		$('#super_input2').text('Conducted by');

		$('#input1').attr('type', 'date');
		$('#input2').attr('type', 'text');

		$('#input').attr('name', 'seminar');
		$('#input1').attr('name', 'seminar_date');
		$('#input1').attr('required', 'required');
		$('#input2').attr('name', 'conductedby');

		$('#data_input').val('seminar');

		$('#hide_form3').css({
			'display': 'none'
		});
		$('#input').keyup(function () {
			checker = $('#input').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$('#input2').keyup(function () {
			checker1 = $('#input2').val();
			if (checker.length > 0 && checker1.length > 0) {
				$('#btnsubmit_resume').removeAttr('disabled');
			} else {
				$('#btnsubmit_resume').attr('disabled', 'disabled');
			}
		});
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_resume',
			async: true,
			dataType: 'json',
			success: function (data) {
				var edit_seminars = '';
				if (data.seminars) {
					for (i = 0; i < data.seminars.length; i++) {
						edit_seminars += '<div class="col-xs-11 col-sm-11 col-md-11"><ul class="resume-list">' +
							'<li>' + data.seminars[i].seminar + '</li>' +
							'<li>' + data.seminars[i].seminar_date + '</li>' +
							'<li>' + data.seminars[i].conductedby + '</li>' +
							'</div></ul>' +
							'<div class="col-xs-1 col-sm-1 col-md-1">' +
							'<button class="resume-delete semi-delete" id="' + i + '" value="' + data.seminars[i].seminar_id + '"><i class="fa fa-times"></i></button>' +
							'</div>';

					}
					$('#edit_form_resume').html(edit_seminars);
				}
			},
			error: function (data) {

			}
		})

	})

	$('#form_resume').submit(function () {
		$("#btnsubmit_resume").attr("disabled", "disabled");
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
			async: false,
			dataType: 'json',
			success: function (data) {
				console.log(data);
				info = data;
				if (!data.success) {
					$('#ze_question').modal('show');
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function(e){
						e.preventDefault();						
					});
					$("ul.side-navbar").children().click(function (e) {
						e.preventDefault();
					})
				}
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
				} else {
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function (e) {
						e.preventDefault();
					});
				}
				if (data.accomplishment) {
					for (i = 0; i < data.accomplishment.length; i++) {
						accomplishments += '<ul class="resume-list">' +
							'<li>' + data.accomplishment[i].accomplishment + '</li>' +
							'<li>' + data.accomplishment[i].affiliation + '</li>' +
							'</ul>';
					}
					$('#resume_accomplishments').html(accomplishments);
				} else {
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function (e) {
						e.preventDefault();
					});
				}
				if (data.skills) {
					for (i = 0; i < data.skills.length; i++) {
						skills += '<ul class="resume-list">' +
							'<li>' + data.skills[i].skill + '</li>' +
							'</ul>';
					}
					$('#resume_skills').html(skills);
				} else {
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function (e) {
						e.preventDefault();
					});
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
				} else {
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function (e) {
						e.preventDefault();
					});
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
				} else {
					$(".btn-info").attr("disabled", "disabled");
					$(".btn-info").click(function (e) {
						e.preventDefault();
					});
				}
			}
		})
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
						if (jQuery.inArray(response.data[i].job_id, job_ids) < 0) {
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
					}
				}
				$('#show_jobs').html(html)
			}
		});
	}

	function show_ongoing_applications() {
		var job_id = [];

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_ongoing_applications',
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response.data);
				var html = '';
				var i;
				if (response.data) {
					for (i = 0; i < response.data.length; i++) {
						job_id.push(response.data[i].job_id);
						html += '<tr>' +
							'<td>' + response.data[i].comp_name + '</td>' +
							'<td>' + response.data[i].comp_hr + '</td>' +
							'<td>' + response.data[i].position + '</td>' +
							'<td>' + response.data[i].requirements + '</td>' +
							'<td>' + response.data[i].date_posted + '</td>' +
							'<td>' + response.data[i].date_applied + '</td>'
						if (response.data[i].app_status == "1") {
							html += '<td><button class="btn btn-danger cancel" value="' + response.data[i].pending_id + '"><i class="fa fa-times"></i> Cancel</button></td>' +
								'</tr>'
						} else if (response.data[i].app_status == "0") {
							html += '<td><button class="btn btn-primary cancel" value="' + response.data[i].pending_id + '"><i class="fa fa-times"></i> Reapply</button></td>' +
								'</tr>'

						} else {
							html += '<td>Denied</td>' +
								'</tr>'
						}

					}
					$('#show_ongoing_application').html(html)
				}
				$('#show_ongoing_application').html(html)
			}
		});
		job_ids = job_id;
		console.log(job_ids);
	}
	$(document).on('click', '.cancel', function (e) {
		$('#cancel_application').modal('show');
		$('.modal-title').text('Cancel Application?');
		job_id_app = $(e.currentTarget).val();
		console.log(job_id_app);
	})

	$(document).on('click', '.apply', function (e) {
		$('#apply_job').modal('show');
		$('.modal-title').text('Confirm Apply');
		job_id_app = $(e.currentTarget).val();
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
							html +=
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Company Name</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].comp_name + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Position</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].position + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Preferred Sex</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].pref_sex + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Preferred Civil Status</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].pref_civstat + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Preferred Education Attained</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].pref_educ + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Requirements</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].requirements + '</div></div>' +
								'<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><strong>Date Posted</strong></div><div class="col-xs-8 col-sm-8 col-md-8">:&nbsp' + response.data[i].date_posted + '</div></div>'
						}
					}
				}
				$('#job_desc').html(html)
			}
		})


	});

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
	$('#confirm_cancel').click(function () {
		var job_id = job_id_app;
		console.log(job_id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'cancel_job',
			data: {
				id: job_id
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					alert('JOB APPLICATION ABORTED');
					location.reload()
				}
			},
			error: function () {
				alert('Error');
			}
		});
	})


	$(document).on('click', '.skill-delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete_resume',
			data: {
				id: id,
				field: 'skill'
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response) {
					alert('deleted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});

	});
	$(document).on('click', '.educ-delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete_resume',
			data: {
				id: id,
				field: 'education'
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {

					alert('deleted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});

	});
	$(document).on('click', '.work-delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete_resume',
			data: {
				id: id,
				field: 'work'
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					alert('deleted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});

	});
	$(document).on('click', '.semi-delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete_resume',
			data: {
				id: id,
				field: 'seminar'
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {

					alert('deleted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});

	});
	$(document).on('click', '.acc-delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete_resume',
			data: {
				id: id,
				field: 'accomplishment'
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {

					alert('deleted');
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});

	});

	///////////////////////////////Change Functionalities
	$('#change_user').attr('disabled', 'disabled');
	$('#change_pass').attr('disabled', 'disabled');

	$('#new_user').keyup(function () {
		var checker = $('#new_user').val();

		$('#illegal_user').css({
			'display': 'none'
		});
		if (checker.length > 0) {
			if (/^[a-zA-Z0-9- ]*$/.test(checker) == false) {
				$('#change_user').attr('disabled', 'disabled');
				$('#illegal_user').removeAttr('style');
				$('#illegal_user').html('Your username contains illegal characters.');
			} else {
				$('#change_user').removeAttr('disabled');
			}

		} else {
			$('#change_user').attr('disabled', 'disabled');
		}
	});

	$("#form_change_user").submit(function () {
		var formData = $('#form_change_user').serializeArray();
		console.log(formData);

		$.ajax({
			type: 'ajax',
			url: 'change_username',
			method: 'POST',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$('#success_user').removeAttr('style');
					$('#success_user').html('Username Updated');
				}

			},

			error: function (jqXHR, textStatus, errorThrown) {
				alert(textStatus + " " + errorThrown)
			}
		});

	});

	$('#prof_pic1').load(function () {
		setInterval(function () {
			$('#illegal_user1').css({
				'display': 'none'
			});
			var checker_pass = $('#pass_new').val();
			var checker_con = $('#pass_con').val();
			if (checker_pass.length > 0 && checker_con.length > 0) {
				$('#change_pass').removeAttr('disabled');
				if (checker_con != checker_pass) {
					$('#change_pass').attr('disabled', 'disabled');
					$('#illegal_user1').removeAttr('style');
					$('#illegal_user1').html('Passwords do not match');
				}

			} else {
				$('#change_pass').attr('disabled', 'disabled');

			}
		}, 0)
	});


	$(document).on('click', '.graduate_edit', function (e) {
		var id = $(e.currentTarget).val();

		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_graduate_info',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$("#e_g_date_graduated").val(response.data[0].date_graduated);
					$("#e_g_date_hired").val(response.data[0].date_hired);
					$("#e_g_company_name").val(response.data[0].company_name);
					$("#e_g_hr_person").val(response.data[0].hr_person);
					$("#e_g_hr_no").val(response.data[0].hr_contact_no);
					$("#e_g_hr_email").val(response.data[0].hr_email);
				}
			},
			error: function () {
				alert('Error');
			}
		});
		$('#graduate_edit_info').modal('show');
	});

	$("#form_change_password").submit(function () {
		var formData = $('#form_change_password').serializeArray();
		console.log(formData);

		$.ajax({
			type: 'ajax',
			url: 'change_password',
			method: 'POST',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$('#success_user1').removeAttr('style');
					$('#success_user1').html('Password Updated');
				}

			},

			error: function (jqXHR, textStatus, errorThrown) {
				alert(textStatus + " " + errorThrown)
			}
		});

	})

	//Checks the radio button for employment
	$('#isEmployed').click(function () {
		if ($('#isEmployed').is(':checked')) {
			$('#employed_inputs').css({'display': 'block'}); //shows the employed exclusive inputs
		}
	});

	$('#isNotEmployed').click(function () {
		if ($('#isNotEmployed').is(':checked')) {
			$('#employed_inputs').css({'display': 'none'}); //hides the employed exclusive inputs

			$('#e_g_company_name,#e_g_hr_person,#e_g_hr_no').val('N/A'); // this sets the inputs
			$('#e_g_date_hired').val('0001-01-01');						 // with default values
			$('#e_g_hr_email').val('default@default.com');				 // to prevent null values
		}
	});
});
