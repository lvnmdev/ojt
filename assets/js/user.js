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
					//var taken = $('#toaster span').html('shit');
					//taken.addClass('danger');

					var taken = document.querySelector('#toaster span');
					taken.innerText = "shit";
					taken.className = "danger";
	

					toaster_register();

				} else if (response.success == 'mismatch') {
					$('#toaster span').html('Your password did not match');
					toaster_register();

				} else if (response.success == 'invalid') {
					$('#toaster span').html('Username contains invalid characters');
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
					if(response.message=="3"){
						$('#toaster span').html('STAHP! YOU ARE BLOCKED FOREVER!');
						toaster_login();
					}else{
						$('#toaster span').html('Wrong Login Credentials!');
						toaster_login();
					}
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