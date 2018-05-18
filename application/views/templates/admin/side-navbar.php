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
		<a href="<?= base_url('Admin/dashboard');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/dashboard') { echo 'active'; } ?>">
				<i class='fa fa-clipboard nav-icon'></i>Dashboard</li>
		</a>
		<a href="<?= base_url('Admin/companies');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/companies') { echo 'active'; } ?>">
				<i class='fa fa-briefcase nav-icon'></i>Companies</li>
		</a>
		<a href="<?= base_url('Admin/pending_companies');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/pending_companies') { echo 'active'; } ?>">
				<i class='fa fa-file-alt nav-icon'></i>Pending Companies</li>
		</a>
		<a href="<?= base_url('Admin/applicants');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/applicants') { echo 'active'; } ?>">
				<i class='fa fa-users nav-icon'></i>Applicants</li>
		</a>
		<a href="<?= base_url('Admin/pending_applicants');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/pending_applicants') { echo 'active'; } ?>">
				<i class='fa fa-file-alt nav-icon'></i>Pending Applicants</li>
		</a>
		<a href="<?= base_url('Admin/hirings');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/hirings') { echo 'active'; } ?>">
				<i class='fa nav-icon'></i>Hirings</li>
		</a>
		<a href="<?= base_url('Admin/pending_hirings');?>">
			<li class="<?php if($this->uri->uri_string() == 'Admin/pending_hirings') { echo 'active'; } ?>">
				<i class='fa nav-icon'></i>Pending Hirings</li>
		</a>
	</ul>
</nav>
