<?php
   $conn = mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
   mysql_set_charset('utf8', $conn);
   mysql_select_db("tuan13") or die("Lỗi kết nối Database");
   $vaitro    = $_GET['VaitroID'];
   $nguoidung = $_GET['nguoidungID'];
   $query    = "SELECT * FROM nguoidungvaitro WHERE nguoidungID=$nguoidung AND VaitroID=$vaitro";
   $result   = mysql_query($query);
   $res      = mysql_fetch_array($result);
   $IDnguoi  = $res['nguoidungID'];
   $IDvaitro = $res['VaitroID'];
   $ngaycap  = $res['NgayCap'];
   if (isset($_POST['update'])) {
           $vaitro2  = $_POST['vaitro2'];
           $ngaycap2 = $_POST['ngaycap2'];
           $query2 = "UPDATE nguoidungvaitro SET VaitroID='$vaitro2',
             NgayCap='$ngaycap2' 
             WHERE nguoidungID= '$IDnguoi'";
           $result2 = mysql_query($query2);
           header("Location: KT.php");
   }
   ?>    
<form name="formx" method="POST">
   <table>
      <?php
         $query3 = "SELECT * FROM nguoidung WHERE nguoidungID= '$IDnguoi'";
         $result = mysql_query($query3);
         $ten    = mysql_fetch_array($result)?>
      <tr>
         <td width="30%">Người dùng</td>
         <td><input type="text" value="<?php
            echo $ten['tenNguoiDung'];
            ?>" /></td>
      </tr>
      <tr>
         <?php
            $query1 = "SELECT * FROM Vaitro";
            $KQ1    = mysql_query($query1);
            
            ?>
         <td width="40%"><label>Vai trò</label></td>
         <td>
            <select name="vaitro2">
               <?php
                  while ($vaitro = mysql_fetch_array($KQ1)) {
                  ?>
               <option <?php if($vaitro['vaitroID']==$IDvaitro) echo "selected=\"selected\""?> value="<?php
                  echo $vaitro['vaitroID'];
                  ?>"><?php
                  echo $vaitro['tenVaiTro'];
                  ?></option>
               <?php
                  }
                  ?>
            </select>
         </td>
      </tr>
      <tr>
         <td width="30%">Ngày cấp:</td>
         <td><input type="text" name="ngaycap2" value="<?php
            echo $ngaycap;
            ?>" /></td>
      </tr>
      <tr align="center">
         <td colspan="2">
            <input type="submit"  name="update" value="Lưu lại"/>'
         </td>
      </tr>
   </table>
</form>