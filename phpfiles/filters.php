<!DOCTYPE html>
<html>

	<head>
		<title>PHP Filters!</title>
	</head>
<body>
<form action="filters.php" method="post">
User Email:<input type="text" name="url" placeholder="Write Your Email Here!"/>
<input type="submit" name="submit" value="Submit Now!"/>

</form>
<?php
//php filters is used for validating the data or checking the data
if(isset($_POST['submit'])){
	$url = $_POST['url'];
	if(filter_var($url,FILTER_VALIDATE_URL)){
		echo "<h2>URL is valid & Ok</h2>";
	}
	else{
		echo "<h2>URL is not valid please check it again</h2>";
	}
}
?>
</body>
</html>
