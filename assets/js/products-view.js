	/*$(function(){
		$("#pach").DataTable();
	});*/
	$(document).ready(function(){

	if($('tbody').is('#table-list-stock')){ 
	 	read_stock();
	}
	else if ($('tbody').is('#table-listinstock')){
		read_instock();
	}
	else if($('tbody').is('#table-listoutstock')){
		read_outstock();
	}

		//read
		function read_stock(){
			$.ajax({
				type:'ajax',
				url:'show',
				async:false,
				processing:true,
				dataType:'json',
				success:function(data){
					var html='';
					var i;
					for (i=0;i<data.length;i++){
						if (data[i].stock == 0){
							html += '<tr class="row">'
								 +'<td>'+data[i].prodname+'</td>'
							     +'<td>'+data[i].prodtype_name+'</td>'
							     +'<td>'+data[i].stock+'</td>'
							     +'<td><a style="color:red"><span></span>Restock</a></td>'
		      					 +'</tr>' 

						}
						else{
							html += '<tr class="row">'
								 +'<td>'+data[i].prodname+'</td>'
							     +'<td>'+data[i].prodtype_name+'</td>'
							     +'<td>'+data[i].stock+'</td>'
		          				 +'<td style="color:lightgreen">Available</td>'
		      					 +'</tr>' 
						}

					}

					$('#table-list-stock').html(html);
					$('#tablestock').DataTable();
					},
				error:function(){
					alert("error");
				}
			})
	}




		function read_instock(){
			$.ajax({
				type:'ajax',
				url:'show_instock',
				async:false,
				processing:true,
				dataType:'json',
				success:function(data){
					var html='';
					var i;
					for (i=0;i<data.length;i++){
							html += '<tr class="row">' 
								 +'<td>'+data[i].prodname+'</td>'
							     +'<td>'+data[i].prodtype_name+'</td>'
							     +'<td>'+data[i].prodqty_in_stock+'</td>'
							     +'<td>'+data[i].proddate_in+'</td>'
							     +'</tr>'

					}

					$('#table-listinstock').html(html);
					$('#tableinstock').DataTable();
				}
			})
	}







		function read_outstock(){
			$.ajax({
				type:'ajax',
				url:'show_outstock',
				async:false,
				processing:true,
				dataType:'json',
				success:function(data){
					var html='';
					var i;
					for (i=0;i<data.length;i++){
							html += '<tr class="row">'
								 +'<td>'+data[i].prodname+'</td>'
							     +'<td>'+data[i].prodtype_name+'</td>'
							     +'<td>'+data[i].prodqty_sold+'</td>'//from sales..
							     +'<td>'+data[i].proddate_out+'</td>'
							     +'</tr>' 

					}

					$('#table-listoutstock').html(html);
					$('#tableoutstock').DataTable();
				}
			})
	}


	function optionType(){
	    $.ajax({
	      type:'ajax',
	      url:'showtype',
	      async:false,
	      dataType:'json',
	      success:function(data){
	        var html='';
	        var i;
	        for (i=0;i<data.length;i++){
	          html += '<option value="'+data[i].prodtype_id+'">'+data[i].prodtype_name+'</option>'
	        }
	        $('#type').html(html);
	      }
	    })
	}
	if('#type'){
	  optionType();
	}

		

		//ADD
	$('#btnAddProduct').click(function(){
		 $('#mymodal').modal('show');
		});

	$('#btnSaveproduct').click(function(){
	  var name=$('input[name=productName]').val();
	  var type=$('select[name=prodtype]').val();
	  var description=$('input[name=description]').val();
	  var width=$('input[name=width]').val();
	  var height=$('input[name=Height]').val();
	  var depth=$('input[name=Depth]').val();
	  var buyprice=$('input[name=buyprice]').val();
	  var imgfile=$('input[name=imgfile]').val();
	  console.log(imgfile);

	  $.ajax({
	    type: 'ajax',
	    method:'post',
	    url :'Products/product_add',
	    data:{name:name,type:type,description:description,buyprice:buyprice,width:width,height:height,depth:depth,imgfile:imgfile},
	    async:false,
	    dataType:'json',
	    success: function(response){
	    	$('#mymodal').modal('hide');
	    	$('form[name="form"]').submit();
	    	$('input[type="text"]').val('');
	    	$('input[type="number"]').val('');
	    	

	    read_stock();

	    }
	  });
	});








	})



