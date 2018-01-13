<!DOCTYPE html>
<?php
session_start();
?>
<html>

	<head>
		<title>PHP Sessions</title>
	</head>
<body>
<form action="sessoin.php" method="post">
	User Name:<input type="text" name="value1"/>
	User Email<input type="email" name="value2" value="<?php echo $_SESSION['value2']; ?>"/>
	<input type="submit" name="submit" value="Submit Now!"/>
</form>
<?php
$user_email = $_POST['value2'];
$_SESSION['value2']=$user_email;
echo "<b>Welcome to my website: </b>" . $_SESSION['value2'];
?>
</body>
</html>
