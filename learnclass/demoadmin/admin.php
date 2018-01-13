<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
require_once("mysql.php"); 
if ( !$_SESSION['user_id'] )
{ 
    echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
    $user_id = intval($_SESSION['user_id']);
    $sql_query = mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
    $member = mysql_fetch_array( $sql_query ); 
    echo "Bạn đang đăng nhập với tài khoản {$member['username']}."; 
    echo "<br><a href='logout.php'>Thoát ra</a><hr>";
    if ($member['admin']!="1")  
        echo "Bạn ko phải là admin";
    else
    {
        //Noi dung cac ham, cac lenh va code danh cho admin
        echo "Các code cho admin ở đây";
    }
 
} 
?>