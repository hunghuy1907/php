<!DOCTYPE html> 
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Demo Final Exam</title>
        <style>
            label{
                float: left;
                width: 100px;
            }
            input{
                margin-bottom: 10px;
            }
        </style>
	</head>
  <body>
<h2>Đăng kí:</h2>
	<form action="new_users.php" method="post">
		<label>Tên truy cập:</label>
        <input type="text" name="user_name" />
        <br>
        <label>Email:</label>
        <input type="text" name="user_email"/>
        <br>
        <label>Mật khẩu:</label>
        <input type="password" name="user_pass"/>
        <br>
		<input type="submit" name="user" value="Đăng kí"/>
	</form>
<h3><a href="new_users.php?view">Xem</a></h3>
<?php
// MySQLi connection
$con = mysqli_connect("localhost","root","","new_users");
mysqli_set_charset($con,"utf8");
if (mysqli_connect_errno())
  {
  echo "MySQLi Connection was not established: " . mysqli_connect_error();
  }
//Ham chuan hoa ten
    function Chuanhoa($str, $type = NULL)
        {
            $str   = mb_strtolower($str, 'UTF-8'); //Chuyển về chữ thường
            $str   = trim($str);  //Lược bỏ khoảng trắng đầu và cuối chuỗi
            $array = explode(" ", $str); //Lược bỏ khoảng trắng thừa giữa các từ
            foreach ($array as $key => $value)
                {
                    if (trim($value) == null)
                        {
                            unset($array[$key]);
                            continue;
                        }
                    if ($type == "ten")  //Chuyển kí tự đầu mỗi từ thành chữ hoa
                        {
                            $array[$key] = ucfirst($value);
                        }
                }
				//Chuyển kí tự đầu thành chữ hoa
            $result = implode(" ", $array);
            return $result;
        }
    
    // Hàm tach ho dem    
    function Tachten($name,$a)
        {  //for ($i=1;$i < $sophantu - 1; $i++)
                //{
                   // $hodem = $hodem.$mangten[$i]." ";
               // }
            $mangten  = explode(" ", $name);
            $sophantu = count($mangten);
            $ten      = $mangten[$sophantu - 1];
            $hodem    = $mangten[$sophantu - 2];
            if($a=="ten") return $ten;
			else if($a=="hodem") return $hodem;
        }
		
// getting users form the table
	if(isset($_GET['view'])){
	echo "<table width='800' border='1' bgcolor='#add8e6'>
			<tr align='center'>
				<th>User No:</th>
				<th>User Name:</th>
				<th>User Email:</th>
				<th>User Pass:</th>
				<th>Delete User:</th>
				<th>Update User:</th>
			</tr>	
	";
	$sel_users = "select * from new_users order by ten,hodem";
	$run_users = mysqli_query($con, $sel_users);
	while($row=mysqli_fetch_array($run_users)){
		$u_id = $row['user_id'];
		$u_name = $row['user_name'];
		$u_email = $row['user_email'];
		$u_pass = $row['user_password'];
	echo "<tr align='center'>
				<td>$u_id</td>
				<td>$u_name</td>
				<td>$u_email</td>
				<td>$u_pass</td>
				<td><a href='new_users.php?del=$u_id'>Delete</a></td>
				<td><a href='new_users.php?edit=$u_id'>Edit</a></td>
			</tr>";
	}
	echo "</table>";
	}
//deleting a user from the table
	if(isset($_GET['del'])){
		$del_id = $_GET['del'];
		$delete_user = "delete from new_users where user_id='$del_id'";
		$run_delete = mysqli_query($con, $delete_user); 
		if($run_delete){
			echo "<script>alert('A user has been deleted!')</script>";
			echo "<script>window.open('new_users.php?view','_self')</script>";
		}  
	}
//Inserting data into table
if(isset($_POST['user'])) {
        $user_name = Chuanhoa($_POST['user_name'],'ten');
		$ten = Tachten($user_name,"ten"); 
		$hodem= Tachten($user_name,"hodem");
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
		//creating mysqli query
	 $query = "insert into new_users(user_name,hodem,ten,user_email,user_password) 
                    values ('$user_name','$hodem','$ten','$user_email','$user_pass')";
	 $insert_query = mysqli_query($con, $query);
	if($insert_query){
	echo "<h2>User Registered, Thanks!</h2>";
	}
}

//Script for Editing the users
if(isset($_GET['edit'])){
	$edit_id = $_GET['edit'];
	$get_user = "select * from new_users where user_id='$edit_id'";
	$run_user = mysqli_query($con, $get_user);
	$row_user = mysqli_fetch_array($run_user);
		$user_id = $row_user['user_id'];
		$user_name = $row_user['user_name'];		
		$user_email = $row_user['user_email'];
		$user_pass = $row_user['user_password'];
		echo "
		<form method='post' action=''>
			<b>Edit Name:</b><input type='text' name='u_name' value='$user_name'/><br>
			<b>Edit Email:</b><input type='text' name='u_email' value='$user_email'/><br>
			<b>Edit Pass:</b><input type='password' name='u_pass' value='$user_pass'/><br>
			<input type='submit' name='update' value='Update'/> 
		</form>	
		";
}
//Updating data code
	if(isset($_POST['update']))
	{
		    $update_id = $user_id;
			$name = Chuanhoa($_POST['u_name'],'ten');
			$email = $_POST['u_email'];
			$pass = $_POST['u_pass'];
		    $tens = Tachten($name,"ten");
		    $hodems = Tachten($name,"hodem");
			$update_users = "update new_users set user_name='$name',ten='$tens',hodem='$hodems', user_email='$email', user_password='$pass' where user_id='$update_id'";
			$run_update = mysqli_query($con,$update_users);
			if($run_update)
			{
			echo "<script>alert('A user has been Updated!')</script>";
			echo "<script>window.open('new_users.php?view','_self')</script>";	
			}
	}
?>
</body> 
</html>
