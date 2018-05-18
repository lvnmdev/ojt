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
                    for (i = 0; i < response.data.length; i++) {
                        html += '<tr>' +
                            '<td>' + response.data[i].comp_name + '</td>' +
                            '<td>' + response.data[i].comp_desc + '</td>' +
                            '<td>' + response.data[i].comp_hr + '</td>'+
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].comp_contact + '</td>' +
                            '<td>' + '<a type="button" data='+[i]+' class="btn btn-primary view_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
                            '</tr>';
                    }
                    $('#show_company').html(html)
                }
            },
            error: function (response) {

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
                    for (i = 0; i < response.data.length; i++) {
                        html += '<tr>' +
                            '<td>' + response.data[i].user_name + '</td>' +
                            '<td>' + response.data[i].fname + ' ' + response.data[i].mname + ' ' + response.data[i].lname + '</td>' +
                            '<td>' + response.data[i].sex + '</td>' +
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].contact_no + '</td>' +
                            '<td>' + '<a type="button" data='+[i]+' class="btn btn-primary view_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
                            '</tr>';
                    }
                    $('#show_applicant').html(html)
                }
            },
            error: function (response) {

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
                console.log(response);
                var html = '';
                if (response.success) {
                    for (i = 0; i < response.data.length; i++) {
                        html += '<tr>' +
                            '<td>' + response.data[i].fname + ' ' + response.data[i].mname + ' ' + response.data[i].lname + '</td>' +   
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].date_registered + '</td>' +
                            '<td>' + '<a type="button" data='+[i]+' class="btn btn-primary view_p_app"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
                console.log(response);
        		var html = '';
        		if (response.success) { 
        			for (i = 0; i < response.data.length; i++) {
        				html += '<tr>' +
                            '<td>' + response.data[i].comp_name + '</td>' +
                            '<td>' + response.data[i].comp_desc + '</td>' +
                            '<td>' + response.data[i].user_email + '</td>' +
                            '<td>' + response.data[i].comp_opdate + '</td>' +
                            '<td>' + '<a type="button" data='+[i]+' class="btn btn-primary view_p_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
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
        
        $.ajax({
        	type: 'ajax',
        	method: 'get',
        	url: 'show_company',
        	async: false,
        	dataType: 'json',
        	success: function (response) {
        		var html = '';
        		if (response.success) {
        			for (i = 0; i < response.data.length; i++) {
        				html += '<tr>' +
        					'<td>' + response.data[i].comp_name + '</td>' +
        					'<td>' + response.data[i].comp_desc + '</td>' +
        					'<td>' + response.data[i].comp_hr + '</td>' +
        					'<td>' + response.data[i].user_email + '</td>' +
        					'<td>' + response.data[i].comp_contact + '</td>' +
        					'<td>' + '<a type="button" data=' + [i] + ' class="btn btn-primary view_comp"><i class="fa fa-eye btn-icon"></i>View</a></td>' +
        					'</tr>';
        			}
        			$('#show_company').html(html)
        		}
        	},
        	error: function (response) {

        	}
        })
    });

    $('#show_pending_company').on('click', '.view_p_comp', function () {
    	$('#pending_comp_info').modal('show');
        var id = $(this).attr('data');
        
        
    });

    $('#show_applicant').on('click', '.view_app', function () {
    	$('#app_info').modal('show');
    	var id = $(this).attr('data');
    });

    $('#show_company').on('click', '.view_comp', function () {
    	$('#comp_info').modal('show');
    	var id = $(this).attr('data');
    });

})