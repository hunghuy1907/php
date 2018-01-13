<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Quản lý và phân quyền người dùng </title>
</head>
<body>
  <?php 
    session_start();
    require_once("config.php");
        $user_id = intval($_SESSION['user_id']);
        $sql_query = mysql_query("SELECT * FROM users WHERE id='{$user_id}'");
        $member = mysql_fetch_array( $sql_query ); 
        echo "Bạn đang đăng nhập với tài khoản {$member['username']}."; 
        echo "<br><a href='logout.php'>Thoát ra</a><hr>";
        if ($member['keya']!="1")  
            echo "Bạn khong phải là admin";
        else
        {
        // Hàm tach ho dem        
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
        {  
            $mangten  = explode(" ", $name);
            $sophantu = count($mangten);
            $ten      = $mangten[$sophantu - 1];
            $hodem    = $mangten[$sophantu - 2];
            if($a=="ten") return $ten;
            else if($a=="hodem") return $hodem;
        }
        //Kiem tra email co hop le hay ko
        function check_email($email) {
        if (strlen($email) == 0) return false;
        if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
        return false;
            }
         // Hàm lấy dữ liệu từ CSDL và hiển thị
                 function getData()
                 {
                     global $giatri, $ketqua;
                     $giatri = "";
                     $query = "SELECT * FROM `users` order by `users`.`Name` ASC";
                     $result = mysql_query($query);
                     $numrows = mysql_num_rows($result);
                     for ($i = 0; $i < $numrows; $i ++) {
                         $ketqua[$i] = mysql_fetch_array($result);
                         $birthday = date("d/m/Y",strtotime($ketqua[$i]['Birthday']));
                         $id = $ketqua[$i]['id'];
                         if($ketqua[$i]['keya']=="1"){
                             $quyen="Admin";
                         }else{
                             $quyen="User";
                         }
                         $giatri .= "
                      <tr>
                      <td>" . ($i + 1) . "</td>
                      <td>" . $ketqua[$i]['username'] . "</td>
                      <td>" . $ketqua[$i]['Name'] . "</td>
                       <td>" . $ketqua[$i]['email'] . "</td>
                       <td>".$birthday." </td> 
                       <td>" . $quyen . "</td>
                       <td><a href='sua.php?id=".$id."'> Sửa </a></td>
                       <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
                      </tr>
                      ";
                     }
                 }
                 getData();
               
                // Hàm Delete bản ghi
                 function deleteData($id)
                 {
                     $query = "DELETE FROM users WHERE id='$id'";
                     mysql_query($query);
                 }

                 if( isset($_POST['add']) )
                 {
                  // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
                  $username = addslashes( $_POST['username'] );
                  $password = md5( addslashes( $_POST['password'] ) );
                  $verify_password = md5( addslashes( $_POST['verify_password'] ) );
                  $email = addslashes( $_POST['email'] );
                  $tenc = addslashes($_POST['name'] );
                  $ten = Chuanhoa($tenc,"ten");
                  $sinhnhat = addslashes( $_POST['sn'] );
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
                 
                  // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
                  if ( $password != $verify_password )
                  {
                      $error_pass = "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu.";
                     
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
                  getData(); 
                  }
                }
                  // Lấy giá trị ở các ô checkbox
                $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off'; 
                if(isset($_POST['in'])) { 
                     if ($chonxoa != 'off') {					 // Nếu ô checkbox đã được lựa chọn
                         for ($i = 0; $i < count($chonxoa); $i++) {
                             if($ketqua[$chonxoa[$i]]['id'] != 1){
                             deleteData($ketqua[$chonxoa[$i]]['id']);
                             } else $error_admin = "Không được xóa admin gốc";
                         }
                         getData(); 
                     }	
                }
        
    } 
    ?>   
  <center>
    <h2>Quản lý và phân quyền người dùng</h2>
  </center>
  <form name="fx" method="post">
    <center><label class="error" style="color:#F70101"><?php echo isset($error) ? $error: ""; ?></label>
      <label class="error_admin" style="color:#F70101"><?php echo isset($error_admin) ? $error_admin: ""; ?></label>
    </center>
    <table align="center">
      <tr>
        <td>Tên truy nhập:</td>
        <td><input type="text" name="username" value=""><br>
          <label class="error_user" style="color:#F70101"><?php echo isset($error_user) ? $error_user: ""; ?></label>
        </td>
      </tr>
      <tr>
        <td>Mật khẩu:</td>
        <td><input type="password" name="password" value=""></td>
      </tr>
      <tr>
        <td>Xác nhận mật khẩu:</td>
        <td><input type="password" name="verify_password" value=""><br>	
          <label class="error_pass" style="color:#F70101"><?php echo isset($error_pass) ? $error_pass: ""; ?></label>
        </td>
      </tr>
      <tr>
        <td>Địa chỉ E-mail:</td>
        <td><input type="text" name="email" value=""><br>
          <label class="error_email" style="color:#F70101"><?php echo isset($error_mail) ? $error_mail: ""; ?></label>
        </td>
      </tr>
      <tr>
        <td>Họ và tên:</td>
        <td><input type="text" name="name" value=""></td>
      </tr>
      <tr>
        <td>Ngày sinh(mm/dd/yyyy):</td>
        <td><input type="text" name="sn" value=""><br>
      </tr>
      <tr>
        <td><input type="submit" name="add" value="Đăng ký tài khoản"></td>
        <td><input type="submit" name="in" value="Xóa" 
          onClick="return confirm('Bạn có thực sự muốn xóa')"></td>
      </tr>
    </table>
    <table align="center" >
      <tr>
        <td>
          <table align="center" border="1px">
            <tr>
              <td>STT</td>
              <td>username</td>
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
  </form>
</body>
</html>