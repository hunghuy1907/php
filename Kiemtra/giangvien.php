<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cập nhật thông tin </title>
  <?php
    //Kêt nối CSDL
    $conn=mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
    mysql_select_db("giangday") or die("Lỗi kết nối Database");
	mysql_set_charset("UTF8", $conn);
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
    
    
    // Hàm lấy dữ liệu từ CSDL và hiển thị
    function getData()
        {
            global $giatri, $ketqua;
            $giatri  = "";
            $query   = "SELECT magiangvien,tengiangvien FROM Giangvien";
            $result  = mysql_query($query);
            $numrows = mysql_num_rows($result);
            for ($i = 0; $i < $numrows; $i++)
                {
                    $ketqua[$i] = mysql_fetch_array($result);
                    $ma         = $ketqua[$i]['magiangvien'];
                    $giatri .= "
              <tr>
              <td>" . ($i + 1) . "</td>
              <td>" . $ketqua[$i]['magiangvien'] . "</td>
              <td>" . $ketqua[$i]['tengiangvien'] . "</td>
              <td><a href='suagiangvien.php?magiangvien=" . $ma . "'>Sửa</a></td>
              <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
              </tr>
              ";
                }
        }
    getData();
    
    // Lấy giá trị ở các ô checkbox
    $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
    // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
    $cmd     = isset($_REQUEST['add']) ? $_REQUEST['add'] : '';
    $cmd2    = isset($_REQUEST['del']) ? $_REQUEST['del'] : '';
    
    // Lấy dữ liệu từ form
    
    //$ten = isset($_REQUEST['ten']) ? $_REQUEST['ten'] : '';
    if (isset($_POST['add']))
        {
            if ($_POST['ma'] == "")
                {
                    $errorma = "Vui lòng nhập mã giảng viên";
                }
            else
                {
                    $ma = $_POST['ma'];
                }
            
            
            if ($_POST['ten'] == "")
                {
                    $errorten = "Vui lòng nhập tên giảng viên";
                }
            else
                {
                    $ten  = $_POST['ten'];
                    $tenc = Chuanhoa($ten, "ten");
                }
            if (!empty($ma) && !empty($tenc))
                {
                    
                    insertData($ma, $tenc);
                    getData();
                    
                }
            
        }
    
    // Hàm Insert bản ghi
    function insertData($ma, $tenc)
        {
            $query = "INSERT INTO giangvien(magiangvien, tengiangvien) VALUES('" . $ma . "', '" . $tenc . "')";
            mysql_query($query);
            
        }
    
    // Hàm Delete bản ghi
    function deleteData($ma)
        {
            $query = "DELETE FROM giangvien WHERE magiangvien='" . $ma . "'";
            mysql_query($query);
        }
    
    if ($cmd2 == 'Xóa')
        {
            // Nếu click nút Xóa
            if ($chonxoa != 'off') // Nếu ô checkbox đã được lựa chọn
                {
                    for ($i = 0; $i < count($chonxoa); $i++)
                        {
                            deleteData($ketqua[$chonxoa[$i]]['magiangvien']);
                            // Xóa bản ghi
                        }
                    getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                }
            
        }
    
    ?>
</head>
<body>
  <center>
    <h1>Quản lý giảng viên</h1>
  </center>
  <table align="center" >
    <tr>
      <form name="form" method="POST">
        <td>
          <table>
            <tr>
              <td width="40%">Mã HV:</td>
              <td><input type="text" id="ma" name="ma" /><br>
                <label class="errorma" style="color:#F70101"><?php echo isset($errorma) ? $errorma: ""; ?></label>
              </td>
            </tr>
            <tr>
              <td width="40%">Họ và tên:</td>
              <td><input type="text" id="ten" name="ten" /><br>
                <label class="errorten" style="color:#F70101"><?php echo isset($errorten) ? $errorten: ""; ?></label>
              </td>
            </tr>
            <tr align="center">
              <td colspan="2">
                <input type="submit" value="Thêm" name="add"/>'
                <input type="submit" value="Xóa" name="del" onClick="return confirm('Bạn có thực sự muốn xóa')">
              </td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
        <td>
          <table align="center" border="1px">
            <tr>
              <td>STT</td>
              <td>Mã giảng viên</td>
              <td>Tên giảng viên</td>
              <td>Chọn sửa</td>
              <td>Chọn xóa</td>
            </tr>
            <?php
              global $giatri;
              echo $giatri;
              ?>    
          </table>
        </td>
      </form>
    </tr>
  </table>
</body>
</html>