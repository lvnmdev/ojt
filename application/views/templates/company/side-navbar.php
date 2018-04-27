<nav class='side-navbar-container' style='padding:0;'>
	<div class='ustp-menu'>
		<div class='watermark'>
			<h1>USTP</h1>
		</div>
		<div class='side-nav-close'>
			<a type='button' id='closeNav'>
				<i class='fa fa-times'></i>
			</a>
		</div>
	</div>
	<ul class='side-navbar'>
		<a href="<?= base_url('Company/dashboard');?>">
			<li>
				<i class='fa fa-clipboard nav-icon'></i>Dashboard</li>
		</a>
		<a href="<?= base_url('Company/employees');?>">
			<li>
				<i class='fa fa-user nav-icon'></i>Employees</li>
		</a>
		<a href="<?= base_url('Company/post_job');?>">
			<li>
				<i class='fa fa-thumbtack nav-icon'></i>Post Job</li>
		</a>
		<a href="<?= base_url('Company/pending_apps');?>">
			<li>
				<i class='fa fa-file-alt nav-icon'></i>Pending Applications</li>
		</a>
		<a href="<?= base_url('Company/company_info');?>">
			<li>
				<i class='fa fa-briefcase nav-icon'></i>Company Info</li>
		</a>
	</ul>
</nav>
