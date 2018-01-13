<!DOCTYPE html>
<html>

	<head>
		<title>PHP Loops</title>
	</head>
<body>
<?php
//1while loop in php
$num=  0;
while($num<20){
	$num++;
	echo "Day Number: " . $num . "<br/>";
}
//2 for loop in php
for($year = 1940; $year<=2018; $year++){
	echo " Year Number" . $year . "<br/>";}
//3foreach loop in php
$friend = array ("Ehsan","Xubair","Hakeem","Ahmad");
foreach ($friend as $values){
	echo $values . "<br/>";
}
?>
</body>
</html>
