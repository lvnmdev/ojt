<nav class='side-navbar-container' style='padding:0;'>
	<div class='ustp-menu'>
		<div class='logo'>
			<h1><i class="fa fa-graduation-cap"></i><span style="padding-left: 3px;">ustp</span><span style="font-size:1.2em;"/>|</span></h1><h4><span style="color:#fbb414;">graduate</span><br>tracer</h4>
		</div>
		<div class='side-nav-close'>
			<a type='button' id='closeNav'>
				<i class='fa fa-times'></i>
			</a>
		</div>
	</div>
	<ul class='side-navbar'>
		<a href="<?= base_url('Applicant/dashboard');?>">
			<li class="<?php if($this->uri->uri_string() == 'Applicant/dashboard') { echo 'active'; } ?>">
				<i class='fa fa-clipboard nav-icon'></i>Dashboard</li>
		</a>
		<a href="<?= base_url('Applicant/application');?>">
			<li class="<?php if($this->uri->uri_string() == 'Applicant/application') { echo 'active'; } ?>">
				<i class='fa fa-paperclip nav-icon'></i>Application</li>
		</a>
		<a href="<?= base_url('Applicant/ongoing_application');?>">
			<li class="<?php if($this->uri->uri_string() == 'Applicant/ongoing_application') { echo 'active'; } ?>">
				<i class='fa fa-clipboard-list nav-icon'></i>Ongoing Application</li>
		</a>
		<a href="<?= base_url('Applicant/biodata');?>">
			<li class="<?php if($this->uri->uri_string() == 'Applicant/biodata') { echo 'active'; } ?>">
				<i class='fa fa-address-book nav-icon'></i>Biodata</li>
		</a>
		<a href="<?= base_url('Applicant/resume');?>">
			<li class="<?php if($this->uri->uri_string() == 'Applicant/resume') { echo 'active'; } ?>">
				<i class='fa fa-file-alt nav-icon'></i>Resume</li>
		</a>
	</ul>
</nav>
