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
					msg = 'Username already exist';
					toaster_error(msg);
					toaster_register();

				} else if (response.success == 'mismatch') {
					msg = 'Your password did not match';
					toaster_error(msg);
					toaster_register();

				} else if (response.success == 'invalid') {
					msg = 'Username contains invalid characters';
					toaster_error(msg);
					toaster_register();

				}
			},
			error: function () {

				msg = 'OOPS! Something went wrong';
				toaster_error(msg);
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
					setTimeout(() => { location.reload(); }, 3000);
				} else {

					if(response.message=="3"){
						var msg = 'STAHP! YOU ARE BLOCKED FOREVER!';
						toaster_error(msg);
						toaster_login();
					}else{
						msg = 'Wrong Login Credentials!';
						toaster_error(msg);
						toaster_login();
					}

				}
			},
			error: function () {
				msg = 'OOPS! Something went wrong';
				toaster_error(msg);
				toaster_login();
			}
		});
		return false;
	});
});

function toaster_login() {
	var x = document.getElementById("toaster");
	x.className = "t_login show";
	setTimeout(() => { x.className = x.className.replace("show", ""); }, 3000);
}

function toaster_register() {
	var x = document.getElementById("toaster");
	x.className = "t_register show";
	setTimeout(() => { x.className = x.className.replace("t_register show", "") }, 3000);

}

function toaster_error(msg) {
	var err = document.querySelector('#toaster span');
	err.innerText = msg;
	err.className = "danger";
	setTimeout(() => { err.className = ""; }, 3000);
}