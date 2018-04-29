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
					html += '<div class="card-block">' +
						'<h3>Company name: ' + response.data.comp_name + '</h3>' +
						'<p>Company Description: ' + response.data.comp_desc + '</p>' +
						'<p>HR Manager: ' + response.data.comp_hr + '</p>' +
						'<p>Contact No: ' + response.data.comp_contact + ' </p>' +
						'<p>Company TIN(BIR): ' + response.data.comp_tin + ' </p>' +
						'<p>Business Permit: ' + response.data.comp_permit + ' </p>' +
						'<p>Operational Date: ' + response.data.comp_opdate + '</p>' +
						'<p>Street: ' + response.data.comp_addst + '</p>' +
						'<p>Barangay: ' + response.data.comp_addbrgy + '</p>' +
						'<p>Postal Code: ' + response.data.comp_postcode + '</p>' +
						'</div>'
					$('#comp_info_field').html(html);
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
			async: true,
			dataType: 'json',
			success: function (response) {
				var html = '';
				var i;
				console.log(response.data[0].position);
				if (response.data) {
					for (i = 0; i < response.data.length; i++) {
						html += '<tr>'+
									'<td>'+response.data[i].position+'</td>'+
									'<td>'+response.data[i].no_applicants+'</td>'+
									'<td>'+response.data[i].pref_sex+'</td>'+
									'<td>'+response.data[i].pref_civstat+'</td>'+
									'<td>'+response.data[i].pref_educ+'</td>'+
									'<td>'+response.data[i].requirements+'</td>'+
									'<td>'+response.data[i].date_posted+'</td>'+
									'<td><button class="btn btn-success">Edit</button><button class="btn btn-danger">END</button></td>'+
								'</tr>'
					}
				console.log(html);
				$('#show_jobs').html(html)
				}
			},
			error: function () {
				alert('Error');
			}
		});
	}

	$('#btnpost_job').click(function () {
		$('#add_job').modal('show');
		$('.modal-title').text('Add Job Post');
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


})
