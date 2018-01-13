<!DOCTYPE html>
<html>
	<head>
		<title>Mysqli Connection in PHP</title>
	</head>
<body>
<form action="new_users.php" method="post">
	<b>User Name:</b><input type="text" name="user_name"/><br>
	<b>User Email:</b><input type="text" name="user_email"/><br>
	<b>User Pass:</b><input type="password" name="user_pass"/><br>
	<input type="submit" name="user" value="Submit Now!"/>
</form>
<?php
//Connection Start Here!
$con = mysqli_connect("localhost","root","global");

if (mysqli_connect_errno())
  {
  echo "MYSQLi Connection Failed: " . mysqli_connect_error();
  }
 if(isset($_POST['user'])){
	  $user_name = $_POST['user_name'];
	  $user_email = $_POST['user_email'];
	  $user_pass = $_POST['user_pass'];
 // bracket removed
 //Writting query
 
 $query = "INSERT INTO `new_global` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES (NULL, '', '', '')";
 
 $insert_query = mysqli_query($con, $query);
 
 if($insert_query)
 {
	 echo "<h2>User Registered, Thanks</h2>";
 }
 }
?>
</body>
</html>
