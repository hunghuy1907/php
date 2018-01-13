<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Quản lý và phân quyền người dùng </title>
<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
require_once("config.php"); 
if ( !$_SESSION['user_id'] )
{ 
    echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
    $user_id = intval($_SESSION['user_id']);
    $sql_query = mysql_query("SELECT * FROM users WHERE id='{$user_id}'");
    $member = mysql_fetch_array( $sql_query ); 
    echo "Bạn đang đăng nhập với tài khoản {$member['username']}."; 
    echo "<br><a href='logout.php'>Thoát ra</a><hr>";
    if ($member['keya']!="1")  
        echo "Bạn khong phải là admin";
    else
    {
        // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData()
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT * FROM users";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
					 $birthday =date("d/m/Y",strtotime($ketqua[$i]['Birthday']));
					 $id=$ketqua[$i]['id'];
					 
					 if($ketqua[$i]['keya']=="1"){
						 $quyen="Admin";
					 }else{
						 $quyen="User";
					 }
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td>" . $ketqua[$i]['username'] . "</td>
				  <td>" . $ketqua[$i]['password'] . "</td>
				  <td>" . $ketqua[$i]['Name'] . "</td>
				   <td>" . $ketqua[$i]['email'] . "</td>
			       <td> ".$birthday." </td> 
				   <td>" . $quyen . "</td>
				   <td><a href='admin.php?edit=".$id."'> Sửa </a></td>
				   <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
               
                  </tr>
                  ";
                 }
             }
             getData();
             // Lấy giá trị ở các ô checkbox
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
            // Hàm Delete bản ghi
             function deleteData($id)
             {
                 $query = "DELETE FROM users WHERE id='$id'";
                 mysql_query($query);
             }
            if ($cmd == 'Xóa') { 
             // Nếu click nút Xóa
                 if ($chonxoa != 'off') {					 // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i++) {
						 if($ketqua[$chonxoa[$i]]['id'] != 1){
                         deleteData($ketqua[$chonxoa[$i]]['id']);
						 }else echo 'Không được xóa admin gốc';
                     }
                     getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                 }	
		}
    }
} 
?>
     
   </head>
   <body>

	  <center>
         <h2>Quản lý và phân quyền người dùng</h2>
      </center>
	
	  <?php 
	  			 //Script for Editing the users
if(isset($_GET['edit']) & $edit_id = $_GET['edit']){
	
	$get_user = "select * from users where id='$edit_id'";
	$run_user = mysql_query($get_user);
	$row_user = mysql_fetch_array($run_user);
	$id = $row_user['id'];
	$quyen = $row_user['keya'];
    $username = $row_user['username'];
	$password = $row_user['password'];
}
//Updating data code
	if(isset($_POST['update']))
	{
		    $update_id = $id;
		    $key_new = $_POST['u_key'];
		    $password; 
			$update_users = "update users set keya='$key_new' where id='$update_id'";
			$run_update = mysql_query($update_users);
			
			if($run_update)
			{
			echo "<script>alert('A user has been Updated!')</script>";
			echo "<script>window.open('admin.php','_self')</script>";	
			}
	}
	  ?>
	    <form method='post' action='' >
		  <table align="center">
		    <tr>
			<td><b>Username: &nbsp</b><input type='text' name='u_name' value='<?php echo $username?>'/></td>
			</tr>
			
		    <tr>
			<td><b>Sửa quyền: &nbsp</b>
			<select name="u_key">
			<option <?php if($quyen==1) echo "selected=\"selected\""?> value="1" >Admin</option>
			<option <?php if($quyen==0) echo "selected=\"selected\""?> value="0">User</option>
			</select>
			</tr>
			 
			<tr>
			<td><input type='submit' name='update' value='Update User'/></td>
			</tr>
         </table>			
		</form>	
      <table align="center" >
         <tr align="center">
            <td>
               <form name="form" method="POST">
                  <table>

                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Xóa" name="in" onClick="return confirm('Bạn có thực sự muốn xóa')">
                        </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
            </td>
         </tr>
		  <tr> 
		   <td>
            <table align="center" border="1px">
            <tr>
            <td>STT</td>
            <td>username</td>
			<td>password</td>
			<td>name</td>
			<td>email</td>
			<td>Sinh nhật</td>
            <td>Quyền</td>
			<td>Sửa quyền</td>
			<td>Chọn xóa</td>
            </tr> 
			
            <?php
               global $giatri;
               echo $giatri;
             ?>	
            </table>					
            </td> 
		 </tr>
		
      </table>
   </body>
</html>
