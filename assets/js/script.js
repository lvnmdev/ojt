var url = 'http://localhost/try2/index.php/';
$(document).ready(function(){
showUsers();
	$('#regbtn').click(function(){
			var formData = $('#regform').serialize();
			$.ajax({
				type:'ajax',
				method:'post',
				url:url+'Main/add',
				data: formData,
				async:true,
				dataType:'json',
				success: function(response){
					console.log(response);
					location.reload();
				},
				error: function(){
						alert('Registration Failed Error');
				}
			});
	});

	$("#btnadd").click(function(){
		$('#modal').modal('show');
	});

	$('.item-edit').click(function(e){
		var id = $(e.currentTarget).attr('data');
		console.log(id);
			$("#editmodal").modal('show');
			$('#id').attr('value',id);
			
	})

	$('.item-delete').click(function(e){
		var id = $(e.currentTarget).attr('data');
		console.log(id);
		deleteit(id);
			
	})

	$('#editbtn').click(function(){
			var formData = $('#editform').serialize();
			console.log(formData);
			$.ajax({
				type:'ajax',
				method:'post',
				url:url+'Main/edit',
				data: formData,
				async:true,
				dataType:'json',
				success: function(response){
					location.reload();
				},
				error: function(){
					alert("Error");
				}
			});		
	})

	$('#lgnbtn').click(function(){
			var formData = $('#logform').serialize();
			console.log(formData);
			$.ajax({
				type:'ajax',
				method:'post',
				url:url+'Main/log',
				data: formData,
				async:true,
				dataType:'json',
				success: function(response){
					console.log(response);
					if (response.level==0) {
						alert("logged on");
						window.location.href="view";
					}else if(response.level==1){
						alert("logged on");
						window.location.href="userview";
					} else {
						location.reload();
					}
				},
				error: function(){
					alert("Error");
				}
			});
	});		

	function showUsers(){
	    $.ajax({
	        type: 'ajax',
	        url: url+'Main/read',
	        async: false,
	        dataType: 'json',
	        success: function (data) {
	            var html = '';
	            var i;
	            for (i = 0; i < data.length; i++) {
	                html += '<tr>' +
	                            '<td>'+data[i].id+'</td>' +
	                            '<td>'+data[i].username+'</td>'+
	                            '<td>'+data[i].password+'</td>'+
	                            '<td>'+
	                                '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'"><i class="fa fa-edit"></i> Edit</a>&nbsp' +
	                                '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><i class="fa fa-minus-circle"></i> Delete</a>' +
	                            '</td>' +
	                        '</tr>';
	            }
	            $('#show').html(html);
	        },
	        error: function () {
	            //alert('Could not get Data from Database');
	        }
	    });	
	}

	function deleteit(id){
			$.ajax({
	        type: 'ajax',
	        method: 'post',
	        url: url+'Main/delete',
	        data:{
	        	id:id
	        },
	        async: false,
	        dataType: 'json',
	        success: function (data) {
	        	location.reload();
	        },
	        error: function () {
	            //alert('Could not get Data from Database');
	        }
	    });			
	}
})
