<!DOCTYPE html>
<html>

	<head>
		<title>PHP Emails!</title>
	</head>
<body>
<?php
$to ="mahdi_talat@yahoo.com";
$subject ="From waheedacademy.com";
$message = "Hi everyone welcome to this complete course of php & mysqli this is totally a free course you can learn this course just by enrolling to this course also you can tell your friend about this course & please give a good review on this course if you are thinking this is helpful!";
$sender ="abdullwaheed244@gmail.com";
mail($to,$subject,$message,$sender);

echo "<h2>The email was sent successfully!</h2>";
?>
</body>
</html>
