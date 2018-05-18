<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>USTP | Account Disabled</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<style>
		body {
			background-color: lightgray;
		}

		.msg-container {
			margin: 0 15%;
		}

		.warning-container {
			margin-top: 10%;
			padding: 20px;
			border-radius: 8px;
			background-color: white;
			box-shadow: 5px 10px 8px #888888;
        }
        
        .logo {
			display:block;
			margin: auto;
			width: 175px;
			padding: 10px;
			overflow: hidden;
			color: #1a1751;
		}

		.logo h1 {
			margin: 0;
			float: left;
		}

		.logo h4 {
			margin: 0;
			float: left;
			padding: 7px 0;
		}

		.msg {
			
		}

	</style>
</head>

<body>
	<div class="msg-container">
		<div class="warning-container">
			<div class="logo">
					<h1 style="color:#1a1751;"><span style="padding-left: 3px;">ustp</span><span style="font-size:1.2em;"/>|</span></h1><h4 style="color:#1a1751;"><span style="color:#fbb414;">graduate</span><br>tracer</h4>
			</div>
			<div class="text-center">
				<div class="msg">
					<h2>Your account has been disabled and now inactive. Please contact the admin. </h2><br>
					<a type="button" href="<?= base_url('Main/logout')?>">Click Here To Sign-Out</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
