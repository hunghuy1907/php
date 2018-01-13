<!DOCTYPE html>
<html>

	<head>
		<title>PHP If & Else</title>
	</head>
<body>
<?php
//first example
$value1 = 123;
$value2 = 1235;
if($value1==$value2){
	echo " The condition is true<br/>";
}
else{
	echo " The condition is not true<br/>";
}
//second example
$city = "London";
if(
$city=="Syedney"){
	echo $city . " Is in Austerlia<br/>";
}
else{
	echo " This city is not in Austerlia<br/>";
}
//Third example
$person = "xubair";
$weight = 70;
if($person<=80){
	echo $person  . " Is Not vary fat!";
}
else{
	echo $person . " Is Varey Fat!";
}
?>
</body>
</html>
