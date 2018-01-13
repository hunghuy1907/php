<!DOCTYPE html>
<html>

	<head>
		<title>PHP Image Upload!</title>
	</head>
<body>
<form action="imageupload.php" method="post" enctype="multipart/form-data"/>
	Upload Images:<input type="file" name="image"/>
	<input type="submit" name="upload" value="Upload Files"/>
</form>
<?php
if(isset($_POST['upload'])){
	$image = $_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
	
	
	move_uploaded_file($image_tmp, "images/$image");
	echo "<img src='images/$image' width='700' height='300'";
}
?>
</body>
</html>
