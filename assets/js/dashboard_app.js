$(function () {
	show_bio_data();
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
					html += '<div class="card-block">' +
						'<p>Fullname: ' + response.data.fname + ' ' + response.data.mname + ' ' + response.data.lname + ' | Sex: ' + response.data.sex + ' | ' + ' Birthdate: ' + response.data.birthdate + ' </p>' +
						'<p>Nationality: ' + response.data.nationality + ' | ' + 'Religion: ' + response.data.religion + '</p>' +
						'<p>Home Address: ' + response.data.haddress + ' | Current Address: ' + response.data.caddress + '</p>' +
						'<br>' +
						'<p>MOTHER/GUARDIAN</p>' +
						'<p>Fullname: ' + response.data.momfname + ' | Birthdate: ' + response.data.mombday + ' | Occupation: ' + response.data.momwork + '</p>' +
						'<p>FATHER/GUARDIAN</p>' +
						'<p>Fullname: ' + response.data.dadfname + ' | Birthdate: ' + response.data.dadbday + ' | Occupation: ' + response.data.dadwork + '</p>' +
						'</div>'
					$('#bio_field').html(html);
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


	$('#btnedit_res').click(function () {

		$('#resume_dropdown').css({'display':'block'});
	});

	$('#addqual').click(function(){
		
		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Qualifications/Skills');
		$('#form_resume').html();
	})

	$('#addwork').click(function(){

		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Working Experience');
	})
	$('#addacco').click(function(){

		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Accomplishments');
	})	
	$('#addeduc').click(function(){

		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Educational Background');
	})

	$('#addsemi').click(function(){

		$('#edit_resume').modal('show');
		$('.modal-title').text('Add Seminars Attended');
	})


})
