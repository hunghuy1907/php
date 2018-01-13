<?php
    //Nhúng file kết nối với database
    include('ketnoi.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php   
	 
	$username= isset($_POST['Username'])? $_REQUEST['Username'] : '';
    $password= isset($_POST['Password'])? $_REQUEST['Password'] : '';      
    $tenhv= isset($_POST['tenhv'])? $_REQUEST['tenhv'] : '';
    $mahv= isset($_POST['mahv'])? $_REQUEST['mahv'] : '';     
    $ngayvao= isset($_POST['ngayvao'])? $_REQUEST['ngayvao'] : '';
    $noicongtac= isset($_POST['noict'])? $_REQUEST['noict'] : '';

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ( !$tenhv || !$mahv || !$ngayvao || !$noicongtac || !$username || !$password )
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
        // Mã khóa mật khẩu
        $password = md5($password);
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysql_num_rows(mysql_query("SELECT username FROM hoivien WHERE username='$username'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lưu thông tin thành viên vào bảng
    $addmember = mysql_query("INSERT INTO hoivien(mahv, tenhv, ngayvao, noicongtac,username,passwords) 
	VALUES('" . $mahv . "', '" . $tenhv . "', '" . $ngayvao . "','" . $noicongtac . "','" . $username . "','" . $password. "')");
                          
    //Thông báo quá trình lưu
    if ($addmember)
        echo "Quá trình đăng ký thành công. <a href='dangnhap.php'>Đăng nhập</a>";
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
?>