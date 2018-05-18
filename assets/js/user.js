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
					$('#toaster span').html('Succesfully Registered!');
					$('input').val('');
					toaster_register();

				} else if (response.success == 'existing') {
					$('#toaster span').html('Username is already taken!');
					toaster_register();

				} else if (response.success == 'mismatch') {
					$('#toaster span').html('Your password did not match');
					toaster_register();

				} else if (response.success == 'invalid') {
					$('#toaster span').html('Username contains invalid characters');
					toaster_register();

				} else if (response.success == 'empty1') {
					$('#toaster span').html('Please fill up this field');
					toaster_register();

				} else if (response.success == 'empty2') {
					$('#toaster span').html('Please fill up this field');
					toaster_register();

				} else if (response.success == 'empty3') {
					$('#toaster span').html('Please fill up this field');
					toaster_register();
				}
			},
			error: function () {
				$('#toaster span').html('OOPS! Something went wrong');
				toaster_register();
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

					$('#toaster span').html('Welcome! ' + response.user);
					toaster_login();
					setTimeout(() => {
						location.reload();
					}, 3000);
				} else {
<<<<<<< HEAD
					$('#toaster span').html('Wrong Login Credentials!');
					toaster_login();
=======
					$('#banner-failed').html('Wrong Login Credentials').fadeIn().delay(3000).fadeOut('slow');
					setTimeout(function () {
						location.reload();
					}, 3000);
>>>>>>> 156eae4a851b281d4dd01b9581d5278d5d91ae64
				}
			},
			error: function () {
				$('#toaster span').html('OOPS! Something went wrong');
				toaster_login();
			}
		});
		return false;
	});
});

function toaster_login() {
	var x = document.getElementById("toaster");
	x.className = "show";
	setTimeout(() => { x.className = x.className.replace("show", ""); }, 3000);
}

function toaster_register() {
	var x = document.getElementById("toaster");
	x.className = "t_register show";
	setTimeout(() => { x.className = x.className.replace("t_register show", "") }, 3000);

}