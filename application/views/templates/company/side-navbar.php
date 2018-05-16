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
		<a href="<?= base_url('Company/dashboard');?>">
			<li class="<?php if($this->uri->uri_string() == 'Company/dashboard') { echo 'active'; } ?>">
				<i class='fa fa-clipboard nav-icon'></i>Dashboard</li>
		</a>
		<a href="<?= base_url('Company/employees');?>">
			<li class="<?php if($this->uri->uri_string() == 'Company/employees') { echo 'active'; } ?>">
				<i class='fa fa-user nav-icon'></i>Employees</li>
		</a>
		<a href="<?= base_url('Company/post_job');?>">
			<li class="<?php if($this->uri->uri_string() == 'Company/post_job') { echo 'active'; } ?>">
				<i class='fa fa-thumbtack nav-icon'></i>Post Job</li>
		</a>
		<a href="<?= base_url('Company/pending_apps');?>">
			<li class="<?php if($this->uri->uri_string() == 'Company/pending_apps') { echo 'active'; } ?>">
				<i class='fa fa-file-alt nav-icon'></i>Pending Applications</li>
		</a>
		<a href="<?= base_url('Company/company_info');?>">
			<li class="<?php if($this->uri->uri_string() == 'Company/company_info') { echo 'active'; } ?>">
				<i class='fa fa-briefcase nav-icon'></i>Company Info</li>
		</a>
	</ul>
</nav>
