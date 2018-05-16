<nav class='side-navbar-container' style='padding:0;'>
	<div class='ustp-menu'>
		<div class='logo'>
			<h1><i class="fa fa-graduation-cap"></i> ustp<span style="font-size:1.2em;"/>|</span></h1><h4><span style="color:#fbb414;">graduate</span><br>tracer</h4>
		</div>
		<div class='side-nav-close'>
			<a type='button' id='closeNav'>
				<i class='fa fa-times'></i>
			</a>
		</div>
	</div>
	<ul class='side-navbar'>
		<a href="<?= base_url('Applicant/dashboard');?>">
			<li>
				<i class='fa fa-clipboard nav-icon'></i>Dashboard</li>
		</a>
		<a href="<?= base_url('Applicant/application');?>">
			<li>
				<i class='fa fa-paperclip nav-icon'></i>Application</li>
		</a>
		<a href="<?= base_url('Applicant/ongoing_application');?>">
			<li>
				<i class='fa fa-clipboard-list nav-icon'></i>Ongoing Application</li>
		</a>
		<a href="<?= base_url('Applicant/biodata');?>">
			<li>
				<i class='fa fa-address-book nav-icon'></i>Biodata</li>
		</a>
		<a href="<?= base_url('Applicant/resume');?>">
			<li>
				<i class='fa fa-file-alt nav-icon'></i>Resume</li>
		</a>
		<a href="<?= base_url('Applicant/employed');?>">
			<li>
				<i class='fa fa-file-alt nav-icon'></i>Graduate Info</li>
		</a>
	</ul>
</nav>
