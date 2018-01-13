<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Quản lý  </title>
      <style>
	  .hide{ background:#BCD314;
		  
		  }
		  .btn{ height:20pt;
		  width:40pt; color:#FFFFFF;
			  background:#140BD8;
			  
			  }
      </style>
      <?php
         //Kêt nối CSDL
         $conn = mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
         mysql_set_charset('utf8', $conn);
         mysql_select_db("tuan13") or die("Lỗi kết nối Database");
         
         // Hàm lấy dữ liệu từ CSDL và hiển thị
         function getData()
         {
                 global $giatri, $ketqua;
                 $giatri  = "";
                 $query   = "SELECT nguoidungvaitro.*,nguoidung.tenNguoiDung,vaitro.tenVaiTro FROM nguoidungvaitro
         INNER JOIN nguoidung ON nguoidungvaitro.nguoidungID=nguoidung.nguoidungID
         INNER JOIN vaitro ON nguoidungvaitro.VaitroID=vaitro.vaitroID";
                 $result  = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i++) {
                         $ketqua[$i] = mysql_fetch_array($result);
                         $ngaycap    = date("d/m/Y", strtotime($ketqua[$i]['NgayCap']));
                         $giatri .= "
                   <tr>
                   <td><center>" . ($i + 1) . "</center></td>
                   <td><center>" . $ketqua[$i]['tenNguoiDung'] . "</center></td>
                   <td><center>" . $ketqua[$i]['tenVaiTro'] . "</center></td>
                    <td><center>" . $ngaycap . "</center> </td>
                   <td><center><input type='checkbox' name='chonxoa[]' value=" . $i . " /></center></td>
                   <td><center><a href='sua.php?nguoidungID=" . $ketqua[$i]['nguoidungID'] . "&VaitroID=" . $ketqua[$i]['VaitroID'] . "'> Sửa </a></center></td>
                   </tr>
                   ";
                 }
         }
         getData();
         
         
         // Lấy dữ liệu từ form
         $nguoidung = isset($_REQUEST['nguoidungID']) ? $_REQUEST['nguoidungID'] : '';
         $vaitro    = isset($_REQUEST['vaitroID']) ? $_REQUEST['vaitroID'] : '';
         $ngaycap   = isset($_REQUEST['ngaycap']) ? $_REQUEST['ngaycap'] : '';
         
         // Lấy giá trị ở các ô checkbox
         
         $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
         
         // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
         $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
         // Hàm Insert bản ghi
         function insertData($nguoidung, $vaitro, $ngaycap)
         {
                 $query = "INSERT INTO NguoidungVaitro(nguoidungID,vaitroID,NgayCap) VALUES ('" . $nguoidung . "', '" . $vaitro . "', '" . $ngaycap . "')";
                 mysql_query($query);
         }
         
         // Hàm Delete bản ghi
         function deleteData($nguoidung)
         {
                 $query = "DELETE FROM NguoidungVaitro WHERE nguoidungID='" . $nguoidung . "'";
                 mysql_query($query);
         }
         
         if ($cmd == 'Thêm') {
                 insertData($nguoidung, $vaitro, $ngaycap);
                 getData();
         } else if ($cmd == 'Xóa') {
                 
                 if ($chonxoa != 'off') {
                         for ($i = 0; $i < count($chonxoa); $i++) {
                                 deleteData($ketqua[$chonxoa[$i]]['nguoidungID']);
                         }
                         getData();
                 }
         }
         
         ?>
   </head>
   <body>
      <center>
         <h1>Quản lý người dùng</h1>
      </center>
      <table align="center" >
         <tr>
            <td>
               <form name="form" method="POST">
               <table class="hide" border="2 px">
                  <tr>
                     <?php
                        $query2 = "SELECT * FROM Nguoidung";
                        $KQ2    = mysql_query($query2);
                        
                        ?>
                     <td width="40%"><label>Người dùng:</label></td>
                     <td>
                        <select name="nguoidungID">
                           <?php
                              while ($nguoidung = mysql_fetch_array($KQ2)) {
                              ?>
                           <option value="<?php
                              echo $nguoidung['nguoidungID'];
                              ?>"><?php
                              echo $nguoidung['tenNguoiDung'];
                              ?></option>
                           <?php
                              }
                              ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <?php
                        $query1 = "SELECT * FROM Vaitro";
                        $KQ1    = mysql_query($query1);
                        
                        ?>
                     <td width="40%"><label>Vai trò:</label></td>
                     <td>
                        <select name="vaitroID">
                           <?php
                              while ($vaitro = mysql_fetch_array($KQ1)) {
                              ?>
                           <option value="<?php
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
                     <td><input type="text" name="ngaycap" /></td>
                  </tr>
                  <tr align="center">
                     <td colspan="2">
                        <input class="btn" type="submit" value="Thêm" name="in"/>'
                        <input class="btn" type="submit" value="Xóa" name="in" onClick="return confirm('Bạn có thực sự muốn xóa')">
                     </td>
                  
                  </tr>
               </table>
            </td>
            <td>
               <table class="hide" align="center" border="1px">
                  <tr>
                     <td>STT</td>
                     <td width="120 pt"><center>Người dùng</center></td>
                     <td width="50 pt"><center>Vai trò</center></td>
                     <td width="50 pt"><center>Ngày cấp</center></td>
                     <td width="100 pt"><center>Chọn xóa</center></td>
                     <td width="100 pt"><center>Chọn sửa</center></td>
                  </tr>
                  <?php
                     global $giatri;
                     echo $giatri;
                     ?>    
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>