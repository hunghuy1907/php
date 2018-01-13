<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Trang đăng lý</title>
    </head>
    <body>
        <h1>Trang đăng ký hội viên</h1>
        <form action="xuly.php" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
			    <tr>
                    <td>
                        Tên đăng nhập : 
                    </td>
                    <td>
                        <input type="text" name="Username" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type="password" name="Password" size="50" />
                    </td>
                </tr>
              
			  <tr>
                    <td>
                        Mã hội viên:
                    </td>
                    <td>
                        <input type="text" name="mahv" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Tên hội viên:
                    </td>
                    <td>
                        <input type="text" name="tenhv" size="50" />
                    </td>
                </tr>
				
                <tr>
                    <td>
                        Ngày vào :
                    </td>
                    <td>
                        <input type="text" name="ngayvao" size="50" />
                    </td>
                </tr>
				  <tr>
                    <td>
                        Nơi công tác :
                    </td>
                    <td>
                        <input type="text" name="noict" size="50" />
                    </td>
                </tr>
               
            </table>
            <input type="submit" value="Đăng ký" />
            <input type="reset" value="Nhập lại" />
        </form>
    </body>
</html>