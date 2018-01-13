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
      //Kiem tra email co hop le hay ko
       function check_email($email) {
    if (strlen($email) == 0) return false;
    if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
    return false;
        }
   if( isset($_POST['add']) )
   {
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_POST['username'] );
    $password = md5( addslashes( $_POST['password'] ) );
    $verify_password = md5( addslashes( $_POST['verify_password'] ) );
    $email = addslashes( $_POST['email'] );
    $ten = addslashes($_POST['name'] );
    $sinhnhat = addslashes( $_POST['sn'] );
    
    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    
    // Kiểm tra username nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='$username'"))>0)
    {
        $error_user = "Username này đã có người dùng, Bạn vui lòng chọn username khác.";
        
    }
    // Kiểm tra email nay co hop le ko
    if (!check_email($email))
    {
        $error_mail =  "Email này ko hợp lệ. ";
       
    }
    if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}",$sinhnhat))
    {
        $error_sn =  "Ngày tháng năm sinh ko hợp lệ.";
       
    }
    // Kiểm tra email nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT email FROM users WHERE email='$email'"))>0)
    {
        $error_email =   "Email này đã có người dùng, Bạn vui lòng chọn Email khác.";
       
    }
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        $error_pass = "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu.";
        exit;
    }
	if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $email || ! $ten || ! $sinhnhat || ! $ten)
    {
        $error = "Xin vui lòng nhập đầy đủ các thông tin";
    }
    else
	{
		// Tiến hành tạo tài khoản
  $a=mysql_query("INSERT INTO users (username, password, email,Name,Birthday) VALUES ('{$username}', '{$password}', '{$email}', '{$ten}', '{$sinhnhat}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (!$a){
	print "Có lỗi trong quá trình đăng kí, Vui lòng liên hệ BQT";
    }
	}
	}
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
				   <td><a href='sua.php?edit=".$id."'> Sửa </a></td>
				   <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
                  </tr>
                  ";
                 }
             }
             getData();
             // Lấy giá trị ở các ô checkbox
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';

            // Hàm Delete bản ghi
             function deleteData($id)
             {
                 $query = "DELETE FROM users WHERE id='$id'";
                 mysql_query($query);
             }
            if(isset($_POST['in'])) { 
                 if ($chonxoa != 'off') {					 // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i++) {
						 if($ketqua[$chonxoa[$i]]['id'] != 1){
                         deleteData($ketqua[$chonxoa[$i]]['id']);
						 }else echo 'Không được xóa admin gốc';
                     }
                     getData(); 
                 }	
		}
    
} 
?>
   </head>
   <body>
	  <center>
         <h2>Quản lý và phân quyền người dùng</h2>
      </center>
              <form name="fx" method="post">
                  <table>
                     <tr>
            <td>Tên truy nhập:</td>
            <td><input type="text" name="username" value=""></td>
			<label class="error_user" style="color:#F70101"><?php echo isset($error_user) ? $error_user: ""; ?></label>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" value=""></td>
        </tr>
        <tr>
            <td>Xác nhận mật khẩu:</td>
            <td><input type="password" name="verify_password" value=""></td>
			<label class="error_pass" style="color:#F70101"><?php echo isset($error_pass) ? $error_pass: ""; ?></label>
        </tr>
        <tr>
            <td>Địa chỉ E-mail:</td>
            <td><input type="text" name="email" value=""></td>
			<label class="error_mail" style="color:#F70101"><?php echo isset($error_mail) ? $error_mail: ""; ?></label>
            <label class="error_email" style="color:#F70101"><?php echo isset($error_email) ? $error_email: ""; ?></label>
		</tr>
        <tr>
            <td>Họ và tên:</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td>Ngày sinh(dd/mm/yyyy):</td>
            <td><input type="text" name="sn" value=""></td>
			<label class="$error_sn" style="color:#F70101"><?php echo isset($error_sn) ? $error_sn: ""; ?></label>
        </tr>
        <tr>
            <td><input type="submit" name="add" value="Đăng ký tài khoản"></td> 
			<td><input type="submit" name="in" value="Xóa" 
			onClick="return confirm('Bạn có thực sự muốn xóa')"></td>
        </tr>
		 <label class="error" style="color:#F70101"><?php echo isset($error) ? $error: ""; ?></label>
        </table>
	  </form>
	  <table align="center" >
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