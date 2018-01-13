<!DOCTYPE html> 
<html>
	<head>
		<title>MySQLi in PHP</title> 
	</head>

<body> 

<h2>New Registration:</h2>

	<form action="new_db.php" method="post"> 
		
		<b>User Name:</b><input type="text" name="user_name" /> <br>
		<b>User Email:</b><input type="text" name="user_email"/> <br>
		<b>User Pass:</b><input type="password" name="user_pass"/><br>
		<input type="submit" name="user" value="Submit Now"/> 
	
	
	</form>
	<?php  
// establishing the MySQLi connection

$con = mysqli_connect("localhost","root","","global");

if (mysqli_connect_errno())
  {
  echo "MySQLi Connection was not established: " . mysqli_connect_error();
  }
  
//Inserting data into table 

if(isset($_POST['user'])){

	 $user_name = $_POST['user_name'];
	 $user_email =$_POST['user_email'];
	 $user_pass = $_POST['user_pass'];
	 
//creating mysqli query 
	 
	 $query = "insert into new_global (user_name,user_email,user_pass) values ('$user_name','$user_email','$user_pass')";
	 
	 $insert_query = mysqli_query($con, $query);

	if($insert_query){
	
	echo "<h2>User Registered, Thanks!</h2>";
	
	}


}
?>

</body> 
</html> 