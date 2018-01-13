<!DOCTYPE html>
<html>

	<head>
		<title>PHP File Handling!</title>
	</head>
<body>
<?php
$file = fopen("file-handling.txt","w");
$text = "Hi my name is abull waheed!";
fwrite ($file,$text);
fclose ($file);
?>
</body>
</html>
