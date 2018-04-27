$(document).ready(function () {
	//if tbody is tablelist then execute read() 
	if ($('tbody').is('#tablelist')) {
		read();
	}
	//for add supplier button
	//$('input/textarea[name=name of input]').val();
	//.val() so that inputed values will be stored in .val()
	$('#btnAdd').click(function () {
		var name = $('input[name=inputname]').val();
		var address = $('input[name=inputaddress]').val();
		var products = $('input[name=inputproducts]').val();
		var contactperson = $('input[name=inputcontactper]').val();
		var contactnum = $('input[name=inputcontactnum]').val();
		//url:/supplier name/function name 
		//data:{namee:name}->namee is a new variable for ajax, this variable will be used to pass in the controller
		//call read() because it will always continue loading for the delete and add action
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'add',
			data: {
				namee: name,
				addresse: address,
				productse: products,
				contactper: contactperson,
				contactnumber: contactnum
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				$('#addSupplier').modal('hide');
				read();
			}
		});
	})


	function read() {
		$.ajax({
			type: 'ajax',
			url: 'read',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html;
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<tr class="row">' +
						'<td class="col-md-3">' + data[i].suppID + '</td>' +
						'<td class="col-md-3">' + data[i].Name + '</td>' +
						'<td class="col-md-3">' + data[i].Address + '</td>' +
						'<td class="col-md-3">' + data[i].Product + '</td>' +
						'<td class="col-md-3">' + data[i].Contact_Person + '</td>' +
						'<td class="col-md-3">' + data[i].Contact_Number + '</td>' +
						'<td>' +
						//'<button class="btn btn-primary btn-sm" id="btnEdit" data="' + data[i].suppID + '">Edit</button>' +
						'<button class="btn btn-danger btn-sm" id="btnDelete" data="' + data[i].suppID + '">Delete</button>' +
						'</td>'+
						'</tr>'
				}
				$('#tablelist').html(html);
			}

		});

	}

	//$(tbody idname).on('click', 'id button in the read function')
	$('#tablelist').on('click', '#btnDelete', function () {
		var id = $(this).attr('data');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'delete',
			data: {
				ide: id
			},
			async: false,
			dataType: 'json',
			success: function (response) {
				read();
			}
		});

	})

/*	$('#editSupplier').on('click', '#btnEdit', function () {
		var id = $(this).attr('data');

		$('#editSupplier').modal('show');
		$('#editSupplier').on('click', '#btnSave', function () {
			var newname = $('input[name=editname]').val();
			var newaddress = $('input[name=editaddress]').val();
			var newproducts = $('input[name=editproducts]').val();
			var newcontactper = $('input[name=editcontactper]').val();
			var newcontactnum = $('input[name=editcontactnum]').val();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: 'edit',
				data: {
					ide: id,
					nameee: newname,
					addresss: newaddress,
					productss: newproducts,
					contactperr: newcontactper,
					contactnumm: newcontactnum
				},
				async: false,
				dataType: 'json',
				success: function (response) {
					$('#editSupplier').modal('hide');
					read();
				}
			});

		})
	})*/
})
