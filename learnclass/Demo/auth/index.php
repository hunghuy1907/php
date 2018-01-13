<?php 

session_start();
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Trang chủ</title>';
require_once("config.php"); 
if ( !$_SESSION['user_id'])
{ 
    echo "Bạn chưa đăng nhập! <br><a href='login.php'>Nhấp vào đây để đăng nhập</a> <br>hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{
    $user_id = intval($_SESSION['user_id']);
    $sql_query = mysql_query("SELECT * FROM users WHERE id='{$user_id}'");
    $member = mysql_fetch_array( $sql_query ); 
    echo "Bạn đang đăng nhập với tài khoản {$member['username']}."; 
    echo "<br><a href='suathongtin.php'>Sửa thông tin</a>";
	echo "<br><a href='../quanly/quanlygiangday.php'>Quản lý giảng dạy</a>";
    if ($member['keya']=="1")  echo "<br><a href='admin.php'>Trang quản trị</a>";
	if ($member['keya']=="1")  echo "<br><a href='kt.php'>Trang quản trị</a>";
    echo "<br><a href='logout.php'>Thoát ra</a>";
} 
?>