<?php

    if (isset($_SESSION['username'])){
        if ($_SESSION['usertype']==0){
            redirect('Admin/dashboard');
        }else if($_SESSION['usertype']==1){
            redirect('Company/dashboard');
        }else{
            redirect('Applicant/dashboard');
        }
    }

?>
	<!DOCTYPE html>
	<html>

	<head>
		<title></title>
	</head>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>">
	<style>
		:root {
			--container-bg-color: #333;
			--left-bg-color: rgba(251, 180, 20, 0.7);
			--left-button-hover-color: rgba(161, 11, 11, 0.3);
			--right-bg-color: rgba(26, 23, 81, 0.8);
			--right-button-hover-color: rgba(92, 92, 92, 0.3);
			--hover-width: 75%;
			--other-width: 25%;
			--speed: 1000ms;
		}

		html,
		body {
			padding: 0;
			margin: 0;
			font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
			width: 100%;
			height: 100%;
			overflow-x: hidden;
		}

		h1 {
			font-size: 4rem;
			color: #fff;
			text-align: center;
			white-space: nowrap;
			margin-bottom: 25px;
		}

		.button {
			margin: 0 auto;
			display: inline-block;
			margin: 0 auto;
			top: 40%;
			padding: 1rem 4rem;
			text-align: center;
			color: #fff;
			border: #fff solid 0.2rem;
			font-size: 3rem;
			font-weight: bold;
			text-transform: uppercase;
		}

		.button:hover {
			text-decoration: none;
			color: #fff;
			cursor: pointer;
		}

		.split.left .button:hover {
			background-color: var(--left-button-hover-color);
			border-color: var(--left-button-hover-color);
		}

		.split.right .button:hover {
			background-color: var(--right-button-hover-color);
			border-color: var(--right-button-hover-color);
		}

		.custom-container {
			position: relative;
			width: 100%;
			height: 100%;
			background: var(--container-bg-color);
		}

		.split {
			position: absolute;
			width: 50%;
			height: 100%;
			overflow: hidden;
		}

		.split-inner {
			position: absolute;
			top: 20%;
			left: 50%;
			transform: translateX(-50%);
			text-align: center;
		}

		.split.left {
			left: 0;
			background: url('assets/img/student.jpg') center center no-repeat;
			background-size: cover;
		}

		.split.left:before {
			position: absolute;
			content: "";
			width: 100%;
			height: 100%;
			background: var(--left-bg-color);
		}

		.split.right {
			right: 0;
			background: url('assets/img/company.jpg') center center no-repeat;
			background-size: cover;
		}

		.split.right:before {
			position: absolute;
			content: "";
			width: 100%;
			height: 100%;
			background: var(--right-bg-color);
		}

		.split.left,
		.split.right,
		.split.right:before,
		.split.left:before {
			transition: var(--speed) all ease-in-out;
		}

		.hover-left .left {
			width: var(--hover-width);
		}

		.hover-left .right {
			width: var(--other-width);
		}

		.hover-left .right:before {
			z-index: 2;
		}


		.hover-right .right {
			width: var(--hover-width);
		}

		.hover-right .left {
			width: var(--other-width);
		}

		.hover-right .left:before {
			z-index: 2;
		}

		@media(max-width: 800px) {
			h1 {
				font-size: 2rem;
			}

			.button {
				width: 12rem;
			}
		}

		@media(max-height: 700px) {
			.button {
				top: 70%;
			}
		}

		strong {
			position: absolute;
			color: #fff;
			top: 10%;
			z-index: 9999;
			width: 100%;
			text-align: center;
			font-size: 36px;
		}

		form {
			margin-bottom: 25px;
		}

		form input,
		form select {
			margin-bottom: 10px;
			text-indent: 5px;
			background-color: transparent;
			-webkit-text-fill-color: #fff;
			border: none;
			border-bottom: 2px solid whitesmoke;
			padding: 5px;
			width: 100%;
			font-size: 1.25em;

		}

	</style>

	<body>
		<div class="custom-container">
			<strong>USTP Online OJT Application</strong>
			<div class="split left">
				<div class="split-inner">
					<h1>Login</h1>
					<form id="loginform" method="post">
						<div id="banner-success" class="alert alert-success" style="display: none;"></div>
						<div id="banner-failed" class="alert alert-danger" style="display: none"></div>
						<input type="text" name="username" placeholder="Username" required>
						<input type="password" name="password" placeholder="Password" required>
						<input type="submit" class="button" value = "Login">
					</form>
				</div>
			</div>
			<div class="split right">
				<div class="split-inner">
					<h1>Register</h1>
					<form id="regform" onsubmit="register()" method="post">
						<div class='alert alert-success' id="banner-message" style="display:none"></div>
						<div class='alert alert-danger' id="banner-failed2" style="display:none"></div>
						<div class='alert alert-warning' id="banner-warning1" style="display:none"></div>
						<div class='alert alert-warning' id="banner-warning2" style="display:none"></div>
						<div class='alert alert-warning' id="banner-warning3" style="display:none"></div>

						<input type="text" name="username" placeholder="Username" required>
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<input type="password" name="repassword" placeholder="Confirm Password" required>
						<br>
						<br>
						<div class="form-group">
							<label style="color:whitesmoke; float: left;">User Type:</label>
							<br>
							<select name="usertype">
								<option class="form-control" value="2">Applicant</option>
								<option class="form-control" value="1">Company </option>
								<option class="form-control" value="0">Admin </option>
							</select>
						</div>
						<input type="submit" class="button" value="Submit">
					</form>
				</div>
			</div>
		</div>
		<script src="<?= base_url('assets/js/jquery.js')?>"></script>
		<script src="<?= base_url('assets/js/user.js');?>"></script>
		<script>
			const left = document.querySelector(".left");
			const right = document.querySelector(".right");
			const container = document.querySelector(".custom-container");

			left.addEventListener("mouseenter", () => {
				container.classList.add("hover-left");
			});

			left.addEventListener("mouseleave", () => {
				container.classList.remove("hover-left");
			});

			right.addEventListener("mouseenter", () => {
				container.classList.add("hover-right");
			});

			right.addEventListener("mouseleave", () => {
				container.classList.remove("hover-right");
			});

		</script>
	</body>

	</html>
