$(function () {
	$('#regform').submit(function () {
		var formData = $('#regform').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'main/registerUser',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				if (response.success == 'added') {
					$('#banner-message').html('Succesfully Registered!').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);

				} else if (response.success == 'existing') {
					$('#banner-failed2').html('Username is already taken').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);

				} else if (response.success == 'mismatch') {
					$('#banner-failed2').html('Your password did not match').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);

				} else if (response.success == 'invalid') {
					$('#banner-failed2').html('Username contains invalid characters').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);
				} else if (response.success == 'empty1') {
					$('#banner-warning1').removeAttr('style');
					$('#banner-warning1').html('Please fill up this field').fadeIn();
				} else if (response.success == 'empty2') {
					$('#banner-warning3').html('Please fill up this field').fadeIn();
				} else if (response.success == 'empty3') {
					$('#banner-warning2').html('Please fill up this field').fadeIn();

				}
			},
			error: function () {
				alert('Registration Failed Error');
			}
		});
		return false;
	});
	$('#loginform').submit(function () {
		var formData = $('#loginform').serialize();
		console.log(formData);
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: 'main/loginUser',
			data: formData,
			async: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success) {
					
					$('#banner-success').html('Welcome! ' + response.user).fadeIn().delay(3000).fadeOut('slow');

					setTimeout(function () {
						location.reload();
					}, 3000);

				} else {
					$('#banner-failed').html('Wrong Login Credentials').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);
				}
			},
			error: function () {
				alert("Error");
			}
		});
		return false;
	});
});
