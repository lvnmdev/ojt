$(function(){
    showOrders();
    //Modal
    $('#showHistory').on('click', '.show-details', function () {
        var id = $(this).attr('data');
        console.log(id);
        $('#myModal').modal('show');
        $.ajax({
            type: 'ajax',
            url: 'showDetail',
            method:'get',
            data: { id: id },
            async: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                                '<td>'+data[i].salesid+'</td>' +
                                '<td>'+data[i].orderid+'</td>'+
                                '<td>'+data[i].prodid+'</td>'+
                                '<td>'+data[i].custid+'</td>'+
                                '<td>'+data[i].qty+'</td>' +
                                '<td>'+data[i].sellprice+'</td>'+
                                '<td>'+data[i].employeeid+'</td>'+
                            '</tr>';

                }
                $('#showDetails').html(html);
            },
            error: function () {
                alert('Could not get Data from Database');
            }
        });

})

    function showOrders() {
    $.ajax({
        type: 'ajax',
        url: 'showOrders',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                            '<td>'+data[i].orderid+'</td>' +
                            '<td>'+data[i].username+'</td>'+
                            '<td>'+data[i].orderdate+'</td>'+
                            '<td>'+data[i].totalprice+'</td>'+                          
                            '<td>'+
                                '<a href="javascript:;" id="historyDetails" class="btn btn-info show-details" data="'+data[i].orderid+'"><i class="fa fa-edit"></i> VIEW</a>&nbsp' +
                            '</td>' +
                        '</tr>';
            }
            $('#showHistory').html(html);
        },
        error: function () {
            alert('Could not get Data from Database');
        }
    });
    }
});