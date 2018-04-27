$(document).ready(function () {
    if ('#table_id') {
        displayPurchase();
    }
    function displayPurchase() {
        $.ajax({
            type: 'ajax',
            url: '../Purchase/purchaseDisplay',
            async: false,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>'
                        + '<td>' + data[i].purchaseID + '</td>'
                        + '<td>' + data[i].prodname + '</td>'
                        + '<td>' + data[i].Name + '</td>'
                        + '<td>' + data[i].quantity + '</td>'
                        + '<td>' + data[i].datePurchased + '</td>'
                        + '</tr>'
                }
                $('#purchaseTbody').html(html);
            }
        })
    }

    $('#btnAdd').click(function () {
        $('#modal_form').modal('show');
    });

    $('#btnSave').click(function () {
        var data = $('#form').serialize();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'purchaseAdd',
            data: data,
            async: true,
            success: function (data) {
                $response = JSON.parse(data);
                console.log($response);
                $('#modal_form').modal('hide');
                location.reload();
            }
        });
    });

    if ('#Productname') {
        optionProduct();
    }

    function optionProduct() {
        var name = $('input[name=name]').val();
        $.ajax({
            type: 'ajax',
            url: '../Purchase/purchaseShowProduct',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].prodid + '">' + data[i].prodname + '</option>'
                }
                $('#Productname').html(html);
            }
        })
    }

    if ('#Suppliername') {
        optionSupplier();
    }

    function optionSupplier() {
        $.ajax({
            type: 'ajax',
            url: '../Purchase/purchaseShowSupplier',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].suppID + '">' + data[i].Name + '</option>'
                }
                $('#Suppliername').html(html);
            }
        })
    }

})