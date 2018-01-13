<!DOCTYPE html>
<html>

	<head>
		<title>PHP Function</title>
	</head>
<body>
<?php
function myfun(){
	$value =1;
	while($value<=30){
		$value++;
		
		echo $value . "<br/>";
	}
}
myfun();
?>
</body>
</html>
