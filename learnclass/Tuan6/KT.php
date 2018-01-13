<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Cập nhật thông tin </title>
  <?php
    //Kêt nối CSDL
    $conn=mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
    mysql_select_db("hoivien2") or die("Lỗi kết nối Database");
	mysql_set_charset("UTF8", $conn);
    //Ham chuan hoa ten
    function Chuanhoa($str, $type = NULL)
        {
            $str   = strtolower($str);
            $str   = trim($str);
            $array = explode(" ", $str);
            foreach ($array as $key => $value)
                {
                    if (trim($value) == null)
                        {
                            unset($array[$key]);
                            continue;
                        }
                    if ($type == "ten")
                        {
                            $array[$key] = ucfirst($value);
                        }
                }
            $result = implode(" ", $array);
            return $result;
        }
    
    // Hàm tach ho dem    
    function Tachten($name)
        {
            $mangten  = explode(" ", $name);
            $sophantu = count($mangten);
            $ten      = $mangten[$sophantu - 1];
            $hodem    = " ";
            for ($i = 1; $i < $sophantu - 1; $i++)
                {
                    $hodem = $mangten[i] . " ";
                }
            return $ten;
        }
    
    
    // Hàm lấy dữ liệu từ CSDL và hiển thị
    function getData()
        {
            global $giatri, $ketqua;
            $giatri  = "";
            $query   = "SELECT ma,ten FROM hoivien ORDER BY ten";
            $result  = mysql_query($query);
            $numrows = mysql_num_rows($result);
            for ($i = 0; $i < $numrows; $i++)
                {
                    $ketqua[$i] = mysql_fetch_array($result);
                    $ma         = $ketqua[$i]['ma'];
                    $giatri .= "
              <tr>
              <td>" . ($i + 1) . "</td>
              <td>" . $ketqua[$i]['ma'] . "</td>
              <td>" . $ketqua[$i]['ten'] . "</td>
              <td><a href='sua.php?ma=" . $ma . "'>Sửa</a></td>
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
                    $errorma = "Vui lòng nhập mã";
                }
            else
                {
                    $ma = $_POST['ma'];
                }
            
            
            if ($_POST['ten'] == "")
                {
                    $errorten = "Vui lòng nhập tên";
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
            $query = "INSERT INTO hoivien(ma, ten) VALUES('" . $ma . "', '" . $tenc . "')";
            mysql_query($query);
            
        }
    
    // Hàm Delete bản ghi
    function deleteData($ma)
        {
            $query = "DELETE FROM hoivien WHERE ma='" . $ma . "'";
            mysql_query($query);
        }
    
    if ($cmd2 == 'Xóa')
        {
            // Nếu click nút Xóa
            if ($chonxoa != 'off') // Nếu ô checkbox đã được lựa chọn
                {
                    for ($i = 0; $i < count($chonxoa); $i++)
                        {
                            deleteData($ketqua[$chonxoa[$i]]['ma']);
                            // Xóa bản ghi
                        }
                    getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                }
            
        }
    
    function getData1($ten)
        {
            global $giatri1, $ketqua;
            $giatri1 = "";
            $query   = "SELECT ma,ten FROM hoivien WHERE ten= '$ten'";
            $result  = mysql_query($query);
            $numrows = mysql_num_rows($result);
            for ($i = 0; $i < $numrows; $i++)
                {
                    $ketqua[$i] = mysql_fetch_array($result);
                    $giatri1 .= "
              <tr>
              <td>" . $ketqua[$i]['ma'] . "</td>
              <td>" . $ketqua[$i]['ten'] . "</td>
              </tr>
              ";
                }
        }
    ?>
</head>
<body>
  <center>
    <h1>Quản lý hội viên</h1>
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
              <td>Mã HV</td>
              <td>Tên hội viên</td>
              <td>Chọn sửa</td>
              <td>Chọn xóa</td>
            </tr>
            <?php
              global $giatri;
              echo $giatri;
              ?>    
          </table>
        </td>
        <td>
          <table  border="1px">
            <tr>
              <label ><b>Hội viên có tên HV là &nbsp;</label>
      <form name="form11" method="POST">
      <input type="text" name="timkiem" />
      <input type="submit" value="In" name="tim"/>
      </form>
      <br>
      </tr>
      <tr>
      <td>Mã HV</td>
      <td>Tên</td>
      </tr>
      <?php
        if (isset($_POST['tim']))
            {
                $a = $_POST['timkiem'];
                getData1($a);
                global $giatri1;
                echo $giatri1;
            }
            ?>
      </table>
      </td>
      </form>
    </tr>
  </table>
</body>
</html>