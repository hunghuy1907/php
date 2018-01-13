<!DOCTYPE html>
<html>

	<head>
		<title>PHP Special Commands!</title>
	</head>
<body>
<?php
// This function is used to generate new number each time you are refreshing the browser
$invoce = mt_rand() . "<br><br>";
echo $invoce;
//This function is used for displaying date and time
echo date("D/M/d/Y - h:m:s") . "<br><br>";
//md5 php command is used for changing the number in a secure way
$change = md5($invoce);
echo $change;
?>
</body>
</html>
