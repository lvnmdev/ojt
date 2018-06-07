$(function () {
	show_company();
	show_applicant();
	show_pending_company();
	show_pending_applicant();
	notification();

	//Notification
	function notification() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'notification',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response)
				var applicant;
				var company;
				var pending_applicant;
				var pending_company;
				var employed;
				var unemployed;
				var years = [];
				var employed_per_year = [];
				var unemployed_per_year = [];



				if (response.count_applicant[0] != null) {
					applicant = response.count_applicant[0].count_applicant;
				} else {
					applicant = 0;
				}

				if (response.count_company[0] != null) {
					company = response.count_company[0].count_company;
				} else {
					company = 0;
				}

				if (response.count_p_applicant[0] != null) {
					pending_applicant = response.count_p_applicant[0].count_p_applicant;
				} else {
					pending_applicant = 0;
				}

				if (response.count_p_company[0] != null) {
					pending_company = response.count_p_company[0].count_p_company;
				} else {
					pending_company = 0;
				}

				if (response.count_employed[0] != null) {
					employed = response.count_employed[0].count_employed;
				} else {
					employed = 0;
				}

				if (response.count_unemployed[0] != null) {
					unemployed = response.count_unemployed[0].count_unemployed;
				} else {
					unemployed = 0;
				};
				var percentage_employed = Math.round(eval((employed / (parseInt(employed) + parseInt(unemployed))) * 100)) + '%';
				var percentage_unemployed = Math.round(eval((unemployed / (parseInt(employed) + parseInt(unemployed))) * 100)) + '%';
				var percentage_applicant = Math.round(eval((applicant / (parseInt(applicant) + parseInt(company))) * 100)) + '%';
				var percentage_company = Math.round(eval((company / (parseInt(applicant) + parseInt(company))) * 100)) + '%';

				$('#percentage_employed').html(percentage_employed);
				$('#percentage_unemployed').html(percentage_unemployed);
				$('#percentage_applicant').html(percentage_applicant);
				$('#percentage_company').html(percentage_company);

				var i;
				var j;
				for (i = 0; i < response.count_employed_per_year.length; i++) {
					if (jQuery.inArray(response.count_employed_per_year[i].year, years) < 0) {
						years.push(response.count_employed_per_year[i].year);
					}
				}
				for (i = 0; i < response.count_unemployed_per_year.length; i++) {
					if (jQuery.inArray(response.count_unemployed_per_year[i].year, years) < 0) {
						years.push(response.count_unemployed_per_year[i].year);
					}

				}

				for (i = 0; i < years.length; i++) {
					for (j = 0; j < response.count_employed_per_year.length; j++) {
						if (response.count_employed_per_year[j].year === years[i]) {
							employed_per_year.push(parseInt(response.count_employed_per_year[j].count_employed));
						}
					}
				}
				for (i = 0; i < years.length; i++) {
					for (j = 0; j < response.count_employed_per_year.length; j++) {
						if (response.count_unemployed_per_year[j].year === years[i]) {
							unemployed_per_year.push(parseInt(response.count_unemployed_per_year[j].count_unemployed));
						}
					}
				}

				//Charts
				if (response.success) {
					$('#app_no').html(applicant);
					$('#company_no').html(company);
					$('#pending_app_no').html(pending_applicant);
					$('#pending_company_no').html(pending_company);

					new Chart($("#user_stat_chart"), {
						type: 'doughnut',
						data: {
							labels: ["Applicant", "Company"],
							datasets: [{
								label: "Users",
								backgroundColor: ["#f1c40f", "#1abc9c"],
								data: [applicant, company]
							}]
						},
						options: {
							title: {
								display: true,
								text: 'Users'
							}
						}
					});

					new Chart($("#pending_user_stat_chart"), {
						type: 'doughnut',
						data: {
							labels: ["Employed", "Unemployed"],
							datasets: [{
								label: "Employment Status",
								backgroundColor: ["#2ecc71", "#e67e22"],
								data: [employed, unemployed]
							}]
						},
						options: {
							title: {
								display: true,
								text: 'Employment Status'
							}
						}
					});

					new Chart($("#annual_employment_stat"), {
						type: 'line',
						data: {
							labels: years,
							datasets: [{
								label: 'Employed Graduates',
								data: employed_per_year,
								backgroundColor: ['rgb(251, 180, 20, 0.25)'],
								borderColor: ['#fbb414'],
								borderWidth: 2
								}, {
									label: 'Unemployed Graduates',
									data: unemployed_per_year,
									backgroundColor: ['rgb(26, 23, 81, 0.25)'],
									borderColor: ['#1a1751'],
									borderWidth: 2
								}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero: true
									}
								}]
							}
						}
					});
				}
			},
			error: function () {
				alert('error');
			}
		});
	}

	//-------------------------------------------------------------------------------------

	function show_company() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_company',
			async: false,
			dataType: 'json',
			success: function (response) {
				var html = '';
				if (response.success) {
					var response_status;
					for (i = 0; i < response.data.length; i++) {
						if (response.data[i].user_status == "2") {
							response_status = '<td style="color:green;">Active</td>';
						} else if (response.data[i].user_status == "0") {
							response_status = '<td style="color:red;">Deactivated</td>';
						}
						html += '<tr>' +
							'<td>' + response.data[i].comp_name + '</td>' +
							'<td>' + response.data[i].comp_hr + '</td>' +
							'<td>' + response.data[i].user_email + '</td>' +
							'<td>' + response.data[i].comp_contact + '</td>' +
							response_status +
							'<td>' + '<a type="button" data=' + response.data[i].user_name + ' class="btn btn-primary view_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
							'</tr>';
					}
					$('#show_company').html(html)
				}
			},
			error: function (response) {
				alert('error');
			}
		})
	}

	function show_applicant() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_applicant',
			async: false,
			dataType: 'json',
			success: function (response) {
				var html = '';
				if (response.success) {
					var response_status;
					for (i = 0; i < response.data.length; i++) {
						if (response.data[i].user_status == "2") {
							response_status = '<td style="color:green;">Active</td>';
						} else if (response.data[i].user_status == "0") {
							response_status = '<td style="color:red;">Deactivated</td>';
						}
						html += '<tr>' +
							'<td>' + response.data[i].fname + ' ' + response.data[i].mname + ' ' + response.data[i].lname + '</td>' +
							'<td>' + response.data[i].sex + '</td>' +
							'<td>' + response.data[i].user_email + '</td>' +
							'<td>' + response.data[i].contact_no + '</td>' +
							response_status +
							'<td>' + '<a type="button" data=' + response.data[i].user_name + ' class="btn btn-primary view_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
							'</tr>';
					}
					$('#show_applicant').html(html)
				}
			},
			error: function (response) {
				alert('error');
			}
		})
	}

	function show_pending_applicant() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_pending_applicant',
			async: false,
			dataType: 'json',
			success: function (response) {
				var html = '';
				if (response.success) {
					for (i = 0; i < response.data.length; i++) {
						html += '<tr>' +
							'<td>' + response.data[i].user_name + '</td>' +
							'<td>' + response.data[i].fname + ' ' + response.data[i].mname + ' ' + response.data[i].lname + '</td>' +
							'<td>' + response.data[i].user_email + '</td>' +
							'<td>' + response.data[i].date_registered + '</td>' +
							'<td>' + '<a type="button" data=' + response.data[i].user_name + ' class="btn btn-primary view_p_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
							'</tr>';
					}
					$('#show_pending_applicant').html(html)
				}
			},
			error: function (response) {
				alert('error');
			}
		})
	}

	function show_pending_company() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_pending_company',
			async: false,
			dataType: 'json',
			success: function (response) {
				var html = '';
				if (response.success) {
					for (i = 0; i < response.data.length; i++) {
						html += '<tr>' +
							'<td>' + response.data[i].comp_name + '</td>' +
							'<td>' + response.data[i].comp_desc + '</td>' +
							'<td>' + response.data[i].user_email + '</td>' +
							'<td>' + response.data[i].comp_opdate + '</td>' +
							'<td>' + '<a type="button" data=' + response.data[i].user_name + ' class="btn btn-primary view_p_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
							'</tr>';
					}
					$('#show_pending_company').html(html)
				}
			},
			error: function (response) {
				alert('error');
			}
		})
	}

	$('#show_pending_applicant').on('click', '.view_p_app', function () {
		$('#pending_app_info').modal('show');
		var id = $(this).attr('data');

		$('#approve_p_app').attr('data', id);
		$('#deny_p_app').attr('data', id);


		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id
			},
			url: 'show_app_user',
			async: true,
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					$('#p_app_name').html(response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname);
					$('#p_app_sex').html(response.data.sex);
					$('#p_app_email').html(response.data.user_email);
					$('#p_app_contact_no').html(response.data.contact_no);
					$('#p_app_date_reg').html(response.data.date_registered);
				}
			},
			error: function () {
				alert('Error');
			}
		})
	});

	$('#show_pending_company').on('click', '.view_p_comp', function () {
		$('#pending_comp_info').modal('show');
		var id = $(this).attr('data');

		$('#approve_p_comp').attr('data', id);
		$('#deny_p_comp').attr('data', id);

		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id
			},
			url: 'show_comp_user',
			async: true,
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					$('#p_comp_company_name').html(response.data.comp_name);
					$('#p_comp_company_desc').html(response.data.comp_desc);
					$('#p_comp_comp_email').html(response.data.user_email);
					$('#p_comp_company_tin').html(response.data.comp_tin);
					$('#p_comp_company_permit').html(response.data.comp_permit);
					$('#p_comp_contact_no').html(response.data.comp_contact);
					$('#p_comp_op_date').html(response.data.comp_opdate);
					$('#p_comp_date_reg').html(response.data.date_registered);
				}
			},
			error: function () {
				alert('Error');
			}
		})
	});

	$('#show_applicant').on('click', '.view_app', function () {
		$('#app_info').modal('show');
		var id = $(this).attr('data');

		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id
			},
			url: 'show_app_user',
			async: true,
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					$('#p_app_name').html(response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname);
					$('#p_app_sex').html(response.data.sex);
					$('#p_app_email').html(response.data.user_email);
					$('#p_app_contact_no').html(response.data.contact_no);
					$('#p_app_date_reg').html(response.data.date_registered);
				}
				var response_button;
				if (response.data.user_status == 0) {
					response_button = '<button id="approve_p_app" data=' + response.data.user_name + ' class="btn btn-success"><i class="fas fa-user-check btn-icon"></i>Activate</button>';
				} else if (response.data.user_status == 2) {
					response_button = '<button id="deny_p_app" data=' + response.data.user_name + ' class="btn btn-danger"><i class="fa fa-user-times btn-icon"></i>Deactivate</button>';
				}
				$('#response_app').html(response_button);
			},
			error: function () {
				alert('Error');
			}
		})
	});

	$('#show_company').on('click', '.view_comp', function () {
		$('#comp_info').modal('show');
		var id = $(this).attr('data');

		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id
			},
			url: 'show_comp_user',
			async: true,
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					$('#p_comp_company_name').html(response.data.comp_name);
					$('#p_comp_company_desc').html(response.data.comp_desc);
					$('#p_comp_comp_email').html(response.data.user_email);
					$('#p_comp_company_tin').html(response.data.comp_tin);
					$('#p_comp_company_permit').html(response.data.comp_permit);
					$('#p_comp_contact_no').html(response.data.comp_contact);
					$('#p_comp_op_date').html(response.data.comp_opdate);
					$('#p_comp_date_reg').html(response.data.date_registered);
				}
				var response_button;
				if (response.data.user_status == 0) {
					response_button = '<button id="approve_p_app" data=' + response.data.user_name + ' class="btn btn-success"><i class="fas fa-user-check btn-icon"></i>Activate</button>';
				} else if (response.data.user_status == 2) {
					response_button = '<button id="deny_p_app" data=' + response.data.user_name + ' class="btn btn-danger"><i class="fa fa-user-times btn-icon"></i>Deactivate</button>';
				}
				$('#response_app').html(response_button);
			},
			error: function () {
				alert('Error');
			}
		})
	});

	$(document).on('click', '#approve_p_app', function () { //used for both  activation and approval of users
		var id = $(this).attr('data');
		var status_no = '2';
		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id,
				status_no: status_no
			},
			url: 'change_user_status',
			async: true,
			dataType: 'json',
			success: function (response) {
				alert(response.status);
				location.reload();
			},
			error: function () {
				alert('Error');
			}
		})
	});

	$(document).on('click', '#deny_p_app', function () { //used for both  deactivation and denial of users
		var id = $(this).attr('data');
		var status_no = '0';
		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {
				id: id,
				status_no: status_no
			},
			url: 'change_user_status',
			async: true,
			dataType: 'json',
			success: function (response) {
				alert(response.status);
				location.reload();
			},
			error: function () {
				alert('Error');
			}
		})
	});
})
