<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin sinh viên</title>  <?php
//Kêt nối CSDL
    mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
    mysql_select_db("hososinhvien") or die("Lỗi kết nối Database");
// Hàm lấy dữ liệu từ CSDL và hiển thị
    function getData()
    {
        global $giatri, $ketqua;
        $giatri = "";
        $query = "SELECT * FROM sinhvien";
        $result = mysql_query($query);
        $numrows = mysql_num_rows($result);
        for ($i = 0; $i < $numrows; $i ++) {
            $ketqua[$i] = mysql_fetch_array($result);
            $giatri .= "
         <tr>
         <td>" . ($i + 1) . "</td>
         <td><input type='checkbox' name='chonxoa[]'
         value=" . $i . " /></td>
         <td>" . $ketqua[$i]['masv'] . "</td>
         <td>" . $ketqua[$i]['hoten'] . "</td>
         <td>" . $ketqua[$i]['ngaysinh'] . "</td>
         <td>" . (($ketqua[$i]['gioitinh'] == 1) ? "Nam" : "Nữ") . "</td></tr>
         ";
        }
    }
    getData();
// Lấy dữ liệu từ form
    // Lấy dữ liệu text
    $masv = isset($_REQUEST['masv']) ? $_REQUEST['masv'] : '';
    $hoten = isset($_REQUEST['hoten']) ? $_REQUEST['hoten'] : '';
    $ngaysinh = isset($_REQUEST['ngaysinh']) ? $_REQUEST['ngaysinh'] : '';
    $gioitinh = isset($_REQUEST['gioitinh']) ? $_REQUEST['gioitinh'] : '';
    // Lấy giá trị ở các ô checkbox
    $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';

    // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
    $cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : '';

// Hàm Insert bản ghi
    function insertData($masv, $hoten, $ngaysinh, $gioitinh)
    {
        $query = "INSERT INTO sinhvien(masv, hoten, ngaysinh, gioitinh)
         VALUES('" . $masv . "', '" . $hoten . "', '" . $ngaysinh . "',
         " . $gioitinh . ")";
        mysql_query($query);
    }

// Hàm Delete bản ghi
    function deleteData($masv)
    {
        $query = "DELETE FROM sinhvien WHERE masv='" . $masv . "'";
        mysql_query($query);
    }

    if ($cmd == 'Thêm') { // Nếu click nút Cap nhat
        insertData($masv, $hoten, $ngaysinh, $gioitinh); // Thêm bản ghi vào bảng sinhvien
        getData(); // Gọi lại hàm để lấy dữ liệu và hiển thị sau khi thêm bản ghi
    } else if ($cmd == 'Xóa') { // Nếu click nút Xóa
        if ($chonxoa != 'off') { // Nếu ô checkbox đã được lựa chọn
            for ($i = 0; $i < count($chonxoa); $i ++) {
                deleteData($ketqua[$chonxoa[$i]]['masv']);
                // Xóa bản ghi
            }
            getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
        }
    }
    ?>
      </head>
      <body>
      <form name="form" method="POST">
         <table align="center">
         <tr>
            <td>
               <h1>Cập nhật danh sách sinh viên</h1>
            </td>
         </tr>
         <tr>
            <td>
               <table align="center">
                  <tr>
                     <td width="30%">Mã SV:</td>
                     <td><input type="text" name="masv" /></td>
                  </tr>
                  <tr>
                     <td width="30%">Họ và tên:</td>
                     <td><input type="text" name="hoten" /></td>
                  </tr>
                  <tr>
                     <td width="30%">Ngày sinh:  &nbsp;</td>
                     <td><input type="text" name="ngaysinh"></td>
                  </tr>
                  <tr>
                     <td width="30%">Giới tính</td>
                     <td><input type="radio" name="gioitinh" value="1"/>Nam
                        <input type="radio" name="gioitinh" value="0" />Nữ
                     </td>
                  </tr>
                  <tr align="center">
                     <td colspan="2">
                        <input type="submit" value="Thêm" name="cmd"/>
                        <input type="submit" value="Xóa" name="cmd" />
                        <input type="reset" value="Nhập lại" />
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
            <td>Chọn xóa</td> 
            <td>Mã sinh viên</td>
            <td>Họ và tên</td>
            <td>Ngày sinh</td>
            <td>Giới tính</td>
         </tr>
            <?php
               global $giatri;
               echo $giatri;
               ?>
         </table>
      </form>
   </body>
</html>