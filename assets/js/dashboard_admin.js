$(function () {
    show_company();
    show_applicant();
    show_pending_company();
    show_pending_applicant();

    //Notification
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: 'notification',
        async: true,
        dataType: 'json',
        success: function (response) {
            var applicant;
            var company;
            var pending_applicant;
            var pending_company;

            if (response.count_applicant[0] != null) {
                applicant = response.count_applicant[0].count_applicant;
            }
            else {
                applicant = 0;
            }

            if (response.count_company[0] != null) {
                company = response.count_company[0].count_company;
            }
            else {
                company = 0;
            }

            if (response.count_p_applicant[0] != null) {
                pending_applicant = response.count_p_applicant[0].count_p_applicant;
            }
            else {
                pending_applicant = 0;
            }

            if (response.count_p_company[0] != null) {
                pending_company = response.count_p_company[0].count_p_company;
            }
            else {
                pending_company = 0;
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
                        datasets: [
                            {
                                label: "Users",
                                backgroundColor: ["#f1c40f", "#1abc9c"],
                                data: [applicant, company]
                            }
                        ]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Users'
                        }
                    }
                })

                new Chart($("#pending_user_stat_chart"), {
                    type: 'doughnut',
                    data: {
                        labels: ["Pending Applicant", "Pending Company"],
                        datasets: [
                            {
                                label: "Pending Users",
                                backgroundColor: ["#2ecc71", "#e67e22"],
                                data: [pending_applicant, pending_company]
                            }
                        ]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Pending Users'
                        }
                    }
                })
            }
        },
        error: function(){
            alert('error');
        }
    })
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
                    if (response.data.user_status = 2) {
                        var response_remark = '<td style="color:green;">Active</td>';
                    }
                    else if (response.data.user_status = 0) {
                        var response_remark = '<td style="color:red;">Deactivated</td>';
                    }
                    for (i = 0; i < response.data.length; i++) {
                        html += '<tr>' +
                            '<td>' + response.data[i].comp_name + '</td>' +
                            '<td>' + response.data[i].comp_hr + '</td>'+
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].comp_contact + '</td>' +
                            response_remark +
                            '<td>' + '<a type="button" data='+response.data[i].user_name+' class="btn btn-primary view_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
                    if (response.data.user_status = 2) {
                        var response_remark = '<td style="color:green;">Active</td>';
                    }
                    else if (response.data.user_status = 0) {
                        var response_remark = '<td style="color:red;">Deactivated</td>';
                    }
                    for (i = 0; i < response.data.length; i++) {
                        html += '<tr>' +
                            '<td>' + response.data[i].fname + ' ' + response.data[i].mname + ' ' + response.data[i].lname + '</td>' +
                            '<td>' + response.data[i].sex + '</td>' +
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].contact_no + '</td>' +
                            response_remark +
                            '<td>' + '<a type="button" data='+response.data[i].user_name+' class="btn btn-primary view_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
                            '<td>' + '<a type="button" data='+response.data[i].user_name+' class="btn btn-primary view_p_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
                            '<td>' + '<a type="button" data='+response.data[i].user_name+' class="btn btn-primary view_p_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
                    $('#p_app_name').html(response.data.fname+' '+response.data.mname+' '+response.data.lname);
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

        $('#activate_app').attr('data', id);
        $('#deactivate_app').attr('data', id);
        
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
                if (response.data.user_status = 0) {
                    response_button = '<button id="approve_p_app" class="btn btn-success"><i class="fas fa-user-check btn-icon"></i>Activate</button>';
                }
                else if (response.data.user_status = 2) {
                    response_button = '<button id="deny_p_app" class="btn btn-danger"><i class="fa fa-user-times btn-icon"></i>Deactivate</button>';
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

        $('#activate_comp').attr('data', id);
        $('#deactivate_comp').attr('data', id);
        
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
                if (response.data.user_status = 0) {
                    response_button = '<button id="approve_p_app" class="btn btn-success"><i class="fas fa-user-check btn-icon"></i>Activate</button>';
                }
                else if (response.data.user_status = 2) {
                    response_button = '<button id="deny_p_app" class="btn btn-danger"><i class="fa fa-user-times btn-icon"></i>Deactivate</button>';
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
                id:id,
                status_no:status_no
        	},
        	url: 'change_user_status',
        	async: true,
        	dataType: 'json',
        	success: function (response) {
        		alert(response.status);
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
    		},
    		error: function () {
    			alert('Error');
    		}
    	})
    });
})