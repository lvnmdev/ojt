$(function () {
	if(page_info=='biodata'){
		show_bio_data();
	}else{
		
	}
	//For Biodata Functions Start HERE!
	function show_bio_data() {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_bio',
			async: true,
			dataType: 'json',
			success: function (response) {
				var html = '';
				console.log(response);
				if (response.success) {
					$("#user_fullname").val(response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname);
					$("#user_sex").val(response.data.sex);
					$("#user_birthdate").val(response.data.birthdate);
					$("#user_nationality").val(response.data.nationality);
					$("#user_religion").val(response.data.religion);
					$("#user_home_address").val(response.data.haddress);
					$("#user_current_address").val(response.data.caddress);
					$("#mother_fullname").val(response.data.momfname);
					$("#mother_birthdate").val(response.data.mombday);
					$("#mother_occupation").val(response.data.momwork);
					$("#father_fullname").val(response.data.dadfname);
					$("#father_birthdate").val(response.data.dadbday);
					$("#father_occupation").val(response.data.dadwork);	
				}

			},
			error: function () {
				alert('Error');
			}
		});
	}

	$('#btnedit_bio').click(function () {
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: 'show_bio',
			async: true,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					$("#bio_fname").val(response.data.fname);
					$("#bio_mname").val(response.data.mname);
					$("#bio_lname").val(response.data.lname);
					$("#bio_nationality").val(response.data.nationality);
					$("#bio_religion").val(response.data.religion);
					$("#bio_h").val(response.data.haddress);
					$("#bio_c").val(response.data.caddress);
					$("#bio_bday").val(response.data.birthdate);
					$("#bio_momfname").val(response.data.momfname);
					$("#bio_mombday").val(response.data.mombday);
					$("#bio_momwork").val(response.data.momwork);
					$("#bio_dadfname").val(response.data.dadfname);
					$("#bio_dadbday").val(response.data.dadbday);
					$("#bio_dadwork").val(response.data.dadwork);
				}
			},
			error: function () {
				alert('Error');
			}
		});
		$('#edit_bio').modal('show');
	})

	$('#btnsubmit_bio').click(function () {
		var formData = $('#form_bio').serialize();
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_bio',
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
	//For Biodata Functions End HERE!
	//For Resume Functions Start HERE!
	var form =  '<div class="form-group">' +
				'<input id="data_input" type="hidden" name="data_input" class="form-control">' +
	
				'<label id="super_input" class="label-control col-md-2"></label>' +
					'<div class="col-md-3">' +
						'<input id="input" type="text" name="" class="form-control">' +
					'</div>' +
				'</div>'+

				'<div class="form-group">' +
				'<label id="super_input1" class="label-control col-md-2"></label>' +
					'<div class="col-md-3">' +
						'<input id="input1" type="hidden" name="" class="form-control">' +
					'</div>' +
				'</div>' +

				'<div class="form-group">' +
				'<label id="super_input2" class="label-control col-md-2"></label>' +
					'<div class="col-md-3">' +
						'<input id="input2" type="hidden" name="" class="form-control">' +
					'</div>' +
				'</div>' +

				'<div class="form-group">' +
				'<label id="super_input3" class="label-control col-md-2"></label>' +
					'<div class="col-md-3">' +
						'<input id="input3" type="hidden" name="" class="form-control">' +
					'</div>' +
				'</div>'	

	$('#btnedit_res').click(function () {

		$('#resume_dropdown').css({
			'display': 'block'
		});
	});

	$('#addqual').click(function () {
		var i = 0;
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Qualifications/Skills');
		$('#form_resume').html(form);
		$('#super_input').text('Add Skill');

		$('#input').attr('name','skill');
		$('#input1').css({'display':'none'});
		$('#input2').css({'display':'none'});
		$('#input3').css({'display':'none'});	

		$('#super_input1').css({'display':'none'});
		$('#super_input2').css({'display':'none'});
		$('#super_input3').css({'display':'none'});	

		$('#data_input').val('skill');
	})

	$('#addwork').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Working Experience');	
		$('#form_resume').html(form);

		$('#super_input').text('Position');	
		$('#super_input1').text('Company');
		$('#super_input2').text('Date Started');	
		$('#super_input3').text('Date Ended');

		$('#input1').attr('type','text');
		$('#input2').attr('type','date');
		$('#input3').attr('type','date');

		$('#input').attr('name','position');
		$('#input1').attr('name','company');
		$('#input2').attr('name','date_start');
		$('#input3').attr('name','date_end');

		$('#data_input').val('work');
		
		
	})
	$('#addacco').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Accomplishments');	
		$('#form_resume').html(form);

		$('#super_input').text('Accomplishment');	
		$('#super_input1').text('Affiliation');

		$('#input1').attr('type','text');

		$('#input').attr('name','accomplishment');
		$('#input1').attr('name','affiliation');

		$('#data_input').val('accomplishment');
		
	})
	$('#addeduc').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Educational Background');
		$('#form_resume').html(form);
		
		$('#super_input').text('Level');	
		$('#super_input1').text('Name of School');
		$('#super_input2').text('Date Started');	
		$('#super_input3').text('Date Graduated');

		$('#input1').attr('type','text');
		$('#input2').attr('type','date');
		$('#input3').attr('type','date');

		$('#input').attr('name','level');
		$('#input1').attr('name','school');
		$('#input2').attr('name','date_start');
		$('#input3').attr('name','date_graduate');

		$('#data_input').val('education');		

	})

	$('#addsemi').click(function () {
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Seminars Attended');
		$('#form_resume').html(form);

		$('#super_input').text('Name of Seminar');	
		$('#super_input1').text('Date');
		$('#super_input2').text('Conducted by');	

		$('#input1').attr('type','date');
		$('#input2').attr('type','text');

		$('#input').attr('name','seminar');
		$('#input1').attr('name','seminar_date');
		$('#input2').attr('name','conductedby');

		$('#data_input').val('seminar');		
		
	})

	$('#btnsubmit_resume').click(function(){
		var formData = $('#form_resume').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'edit_resume',
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
	})


})
