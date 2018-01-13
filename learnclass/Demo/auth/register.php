<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Đăng ký tài khoản</title>
<?php
require_once("config.php");
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
//Kiem tra email co hop le hay ko
function check_email($email) {
    if (strlen($email) == 0) return false;
    if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
    return false;
}
if ( $_GET['act'] == "do" )
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_POST['username'] );
    $password = md5( addslashes( $_POST['password'] ) );
    $verify_password = md5( addslashes( $_POST['verify_password'] ) );
    $email = addslashes( $_POST['email'] );
    $ten = Chuanhoa(addslashes( $_POST['name']),"ten");
    $sinhnhat = addslashes( $_POST['sn'] );
    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $email || ! $ten || ! $sinhnhat || ! $ten)
    {
        print "Xin vui lòng nhập đầy đủ các thông tin. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    // Kiểm tra username nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='$username'"))>0)
    {
        print "Username này đã có người dùng, Bạn vui lòng chọn username khác. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    // Kiểm tra email nay co hop le ko
    if (!check_email($email))
    {
        print "Email này ko hợp lệ. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}",$sinhnhat))
    {
        print "Ngày tháng năm sinh ko hợp lệ. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    // Kiểm tra email nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT email FROM users WHERE email='$email'"))>0)
    {
        print "Email này đã có người dùng, Bạn vui lòng chọn Email khác. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        print "Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
        exit;
    }
    // Tiến hành tạo tài khoản
  $a=mysql_query("INSERT INTO users (username, password, email,Name,Birthday) VALUES ('{$username}', '{$password}', '{$email}', '{$ten}', '{$sinhnhat}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if ($a)
        print "Tài khoản {$username} đã được tạo. <a href='login.php'>Nhấp vào đây để đăng nhập</a>";
    else
        print "Có lỗi trong quá trình đăng kí, Vui lòng liên hệ BQT";
}
else
{
// Form đăng ký
print <<<EOF
<form action="register.php?act=do" method="post">
<fieldset>
<legend><b>ĐĂNG KÍ TÀI KHOẢN</b></legend> 
    <table >
	   <tr>
            <td>Tên truy nhập:</td>
            <td><input type="text" name="username" value=""></td>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" value=""></td>
        </tr>
        <tr>
            <td>Xác nhận mật khẩu:</td>
            <td><input type="password" name="verify_password" value=""></td>
        </tr>
        <tr>
            <td>Địa chỉ E-mail:</td>
            <td><input type="text" name="email" value=""></td>
        </tr>

        <tr>
            <td>Họ và tên:</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td>Ngày sinh(dd/mm/yyyy):</td>
            <td><input type="text" name="sn" value=""></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Đăng ký tài khoản"></td>
            
        </tr>

    </table>
	</fieldset>		
</form>
EOF;
}
?>