<div class='main-container'>
	<!-- Page wrapper  -->
	<div class="page-wrapper">
		<!-- Container fluid  -->
		<div class="container-fluid">
			<div class='card-content'>
				<h1>Change your User Settings
					<?= $this->session->userdata('username')?>!</h1>
			</div>
			<div>
				<img id="prof_pic1" style="width:150px;height:150px;" src="<?= base_url('assets/img/icons/default-profile.png') ?>" alt="Profile">
				<form action="upload" method="post" enctype="multipart/form-data">
					Select image to upload:
					<input type="file" name="image" id="image">
					<input type="submit" value="Upload Image" name="submit">
				</form>
			</div>

		</div>
	</div>
</div>
</div>
