<!DOCTYPE html>
<html>
	<head>
		<title>Object Oriented programming</title>
	</head>
<body>
<?php
//Written inside Php
//$name ="Ehsan";
//$age = 24;
//echo $name . " is " . $age . " years old";
//Written inssdie object oriented programming
$object = new person;
	class person{
		public $name = "Ehsan";
		public $age = 24;
	}
	echo $object ->name . " is " . $object ->age . " years old";
?>
</body>
</html>