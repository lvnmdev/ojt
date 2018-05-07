<!DOCTYPE html>
<html>
<body>
<img style="width:100px;height:100px;" src="<?= base_url('assets/img/profile_pics/'.$_SESSION['username'].'_pic.png')?>" alt="Profile" class="img img-responsive">
<form action="upload" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="image">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html> 