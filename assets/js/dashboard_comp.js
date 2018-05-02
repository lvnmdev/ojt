$(function () {

	//Company Info Functions
	show_comp_info();
	show_job_postings();

	function show_comp_info() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_info',
			async: true,
			dataType: 'json',
			success: function (response) {
				var html = '';
				console.log(response);
				if (response.success) {
					$("#company_name").html(response.data.comp_name);
					$("#company_desc").html(response.data.comp_desc);
					$("#company_hr").html(response.data.comp_hr);
					$("#company_contact").html(response.data.comp_contact);
					$("#company_tin").html(response.data.comp_tin);
					$("#company_permit").html(response.data.comp_permit);
					$("#company_opdate").html(response.data.comp_opdate);
					$("#company_street").html(response.data.comp_addst);
					$("#company_barangay").html(response.data.comp_addbrgy);
					$("#company_postal").html(response.data.comp_postcode);
				}
			},
			error: function () {
				alert('Error');
			}
		});
	}

	$('#btnedit_info').click(function () {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_info',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$("#comp_info_name").val(response.data.comp_name);
					$("#comp_info_desc").val(response.data.comp_desc);
					$("#comp_info_hr").val(response.data.comp_hr);
					$("#comp_info_contact").val(response.data.comp_contact);
					$("#comp_info_tin").val(response.data.comp_tin);
					$("#comp_info_permit").val(response.data.comp_permit);
					$("#comp_info_opdate").val(response.data.comp_opdate);
					$("#comp_info_addst").val(response.data.comp_addst);
					$("#comp_info_addbrgy").val(response.data.comp_addbrgy);
					$("#comp_info_postal").val(response.data.comp_postcode);
				}
			},
			error: function () {
				alert('Error');
			}
		});
		$('#edit_info').modal('show');
	});


	$('#btnsubmit_info').click(function () {
		var formData = $('#form_info').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_info',
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

	//Job Posting Functionals

	function show_job_postings() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_jobs',
			async: false,
			dataType: 'json',
			success: function (response) {
				var html = '';
				var i;
				if (response.data) {
					for (i = 0; i < response.data.length; i++) {
						html += '<tr>' +
							'<td>' + response.data[i].position + '</td>' +
							'<td>' + response.data[i].no_applicants + '</td>' +
							'<td>' + response.data[i].pref_sex + '</td>' +
							'<td>' + response.data[i].pref_civstat + '</td>' +
							'<td>' + response.data[i].pref_educ + '</td>' +
							'<td>' + response.data[i].requirements + '</td>' +
							'<td>' + response.data[i].date_posted + '</td>' +
							'<td><button class="btn btn-success edit" value="' + response.data[i].job_id + '"><i class="fa fa-edit"></i> Edit</button>&nbsp<button value="' + response.data[i].job_id + '" class="btn btn-danger delete"><i class="fa fa-times-circle"></i> End</button></td>' +
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

	$('#btnpost_job').click(function () {
		$('#jf_1').attr('value', '');
		$('#jf_2').attr('value', '');
		$('#jf_3').attr('value', '');
		$('#jf_4').attr('value', '');
		$('#jf_5').attr('value', '');
		$('#jf_6').attr('value', '');
		$('#add_job').modal('show');
		$('.modal-title').text('Add Job Posting');
		$('#btnsubmit_post_edit').css({
			'display': 'none'
		});
		$('#btnsubmit_post').css({
			'display': ''
		});

	});

	$('#btnsubmit_post').click(function () {
		var formData = $('#form_add_job').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'post_job_hiring',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				alert('inserted');
				location.reload();

			},
			error: function () {
				alert('Error');

			}
		});
	});

	function end_job(id) {
		var job_id = id;
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'end_job',
			data: {
				job_id: id
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				location.reload();
			},
			error: function () {
				alert('Error');

			}
		});

	}

	$(document).on('click', '.delete', function (e) {
		var id = $(e.currentTarget).val();
		console.log(id);
		end_job(id);

	});

	$(document).on('click', '.edit', function (e) {
		var id = $(e.currentTarget).val();
		$('#add_job').modal('show');
		$('.modal-title').text('Edit Job');
		$('#btnsubmit_post_edit').css({
			'display': ''
		});
		$('#btnsubmit_post').css({
			'display': 'none'
		});
		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id
			},
			url: 'show_job_edit',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response) {
					$('#jf_0').attr('value', id);
					$('#jf_1').attr('value', response.data.position);
					$('#jf_2').attr('value', response.data.no_applicants);
					$('#jf_3').attr('value', response.data.pref_sex);
					$('#jf_4').attr('value', response.data.pref_civstat);
					$('#jf_5').attr('value', response.data.pref_educ);
					$('#jf_6').attr('value', response.data.requirements);
				}
			},
			error: function () {
				alert('Error');
			}
		});
	});

	$('#btnsubmit_post_edit').click(function () {
		var formData = $('#form_add_job').serialize();
		$.ajax({
			type: 'ajax',
			method: 'post',
			data: formData,
			url: 'edit_job',
			async: false,
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					location.reload();
				}
			},
			error: function () {
				alert('Error');
			}
		});
	});

})
