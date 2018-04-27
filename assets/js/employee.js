
$(function () {
showAllEmployee();
showAllCustomer();


//Modal
$('#addEmp').click(function () {
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Add New Employee');
    $('#myForm').attr('action', base_url+'Admin/addEmployee');
    $('#btnSubmit').html('Add');
    $('input').val('');
    $('#btnSubmit').val('addEmployee');
});
$('#editbtn').click(function(){
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Edit Information');
    $('#btnSubmit').html('Edit');
});

//Create & Edit
$('#btnSubmit').click(function () {
    var data = $('#myForm').serialize();
    var submitType = $('#btnSubmit').val();
    console.log(submitType);
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url+'Admin/'+submitType,
        data: data,
        async: true,
        success: function (response) {
            var result = JSON.parse(response);
            if (result.success) {
                $('#myModal').modal('hide');
                $('#myForm')[0].reset();
                if (result.type == 'add') {
                    var type = 'added'
                } else if (result.type == 'update') {
                    var type = "updated"
                }
                $('.alert-success').html('Employee ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                showAllEmployee();

            } else {
                alert('Error');
            }
        },
        error: function () {
            alert('Could not add data');
        }
    });

});

//delete- 
$('#showdata').on('click', '.item-delete', function () {
    var id = $(this).attr('data');
    $('#deleteModal').modal('show');
    //prevent previous handler - unbind()
    $('#btnDelete').unbind().click(function () {
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: base_url+'Admin/deleteEmployee',
            data: {
                id: id
            },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.success) {
                    $('#deleteModal').modal('hide');
                    $('.alert-success').html('Employee deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                    showAllEmployee();
                } else {
                    alert('Error');
                }
            },
            error: function () {
                alert('Error deleting');
            }
        });
    });
});

function showAllEmployee() {
    $.ajax({
        type: 'ajax',
        url: base_url+'Admin/showAllEmployee',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                            '<td>'+data[i].empid+'</td>' +
                            '<td>'+data[i].empfname +' '+data[i].empmname+' '+data[i].emplname+'</td>'+
                            '<td>'+data[i].empsex+'</td>'+
                            '<td>'+data[i].empposition+'</td>'+
                            '<td>'+data[i].empemail+'</td>'+
                            '<td>'+data[i].username+'</td>'+
                            '<td>'+data[i].emppassword+'</td>'+
                            '<td>'+data[i].empdateofreg+ '</td>'+
                            '<td>'+data[i].empdateupdated+ '</td>'+
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].empid + '"><i class="fa fa-edit"></i> Edit</a>&nbsp' +
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].empid + '"><i class="fa fa-minus-circle"></i> Delete</a>' +
                            '</td>' +
                        '</tr>';
            }
            $('#showempdata').html(html);
        },
        error: function () {
            //alert('Could not get Data from Database');
        }
    });
}
function showAllCustomer() {
    $.ajax({
        type: 'ajax',
        url: base_url+'Admin/showAllCustomer',
        async: false,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                            '<td>'+data[i].custid+'</td>' +
                            '<td>'+data[i].custfname + ' ' +data[i].custlname+'</td>'+
                            '<td>'+data[i].custsex+'</td>'+
                            '<td>'+data[i].custemail+'</td>'+
                            '<td>'+data[i].billadd+ '</td>'+
                            '<td>'+data[i].deliveradd+ '</td>'+
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].empid + '"><i class="fa fa-edit"></i> Edit</a>&nbsp' +
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].empid + '"><i class="fa fa-minus-circle"></i> Delete</a>' +
                            '</td>' +
                        '</tr>';
            }
            $('#showcusdata').html(html);
        },
        error: function () {
            //alert('Could not get Data from Database');
        }
    });
}
});
