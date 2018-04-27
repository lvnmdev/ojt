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

	<div class="mid-container">
		<div class="title-header">
			<h1 class="text-center">USTP Online OJT Application</h1>
		</div>

		<div class="card-container">
			<div class='container-fluid'>
				<div id="banner-success" class="alert alert-success" style="display: none;"></div>
				<div id="banner-failed" class="alert alert-danger" style="display: none;"></div>
			</div>

			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form id="loginform">
					<div class="form-group">
						<input class="min-form" type="text" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input class="min-form" type="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input class="min-btn" type="button" id="loginbtn" class="btn btn-primary" value="LOGIN"></input>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>

			<div class="col-md-12">
				<p >Don't have an account yet?
					<a href="<?= base_url('index.php/Main/reg');?>"> Register!</a>
				</p>
			</div>
		</div>
	</div>
</div>