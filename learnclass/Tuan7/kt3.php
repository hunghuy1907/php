<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin sinh viên</title>
      <?php
         //Kêt nối CSDL
             mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
             mysql_select_db("hoivien") or die("Lỗi kết nối Database");
         // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData($maHV)
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT giaithuong.tenGT,hoivien_giaithuong.ngaynhan  FROM hoivien_giaithuong RIGHT JOIN giaithuong ON hoivien_giaithuong.maGT=giaithuong.maGT WHERE hoivien_giaithuong.maHV= '$maHV'";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td>" . $ketqua[$i]['tenGT'] . "</td>
                  <td>" . $ketqua[$i]['ngaynhan'] . "</td>
                  
         		 </tr>
                  ";
                 }
             }
             function getData2($tungay,$denngay)
             {
                 global $giatri2, $ketqua;
                 $giatri2 = "";
                 $query = "SELECT hoivien_giaithuong.maHV, COUNT(hoivien_giaithuong.maGT) as sogt 
                           FROM hoivien_giaithuong 
                           WHERE ngaynhan > '$tungay' AND Ngaynhan < '$denngay' 
                           GROUP BY hoivien_giaithuong.maHV";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri2 .= "
                  <tr>
                  <td>" . $ketqua[$i]['maHV'] . "</td>
                  <td>" . $ketqua[$i]['sogt'] . "</td>
         		 </tr>
                  ";
                 }
             } 
         /*
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
             }*/
             ?>
   </head>
   <body>
   <center><h1>Quản lý hội viên</h1></center>
      <table>
         <tr>
            <td>
               
            </td>
         </tr>
         <tr>
            <td>
               <form name="form" method="POST">
                  <table>
                     <tr>
                        <td width="30%">Mã SV:</td>
                        <td><input type="text" name="masv" /></td>
                     </tr>
                     <tr>
                        <td width="30%">Họ và tên:</td>
                        <td><input type="text" name="hoten" /></td>
                     </tr>
                     <tr>
                        <td width="40%">Giới tính</td>
                        <td>
                           <input type="radio" name="gioitinh" value="1"/>Nam
                           <input type="radio" name="gioitinh" value="0" />Nữ
                        </td>
                     </tr>
                     <tr>
                        <td width="30%">Ngày vào hội:  &nbsp;</td>
                        <td><input type="text" name="ngaysinh"></td>
                     </tr>
                     <tr>
                        <td width="30%">Nơi công tác:  &nbsp;</td>
                        <td><input type="text" name="noicongtac"></td>
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Thêm" name="cmd"/>
                           <input type="submit" value="Sửa" name="cmd" />
                           <input type="submit" value="Xóa" name="cmd" />
                        </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
               </form>
            </td>
            <td>
               <form name="form" method="POST">
                  <table>
                     <tr>
                        <td width="30%">Mã GT:</td>
                        <td><input type="text" name="masv" /></td>
                     </tr>
                     <tr>
                        <td width="30%">Tên giải thưởng:</td>
                        <td><input type="text" name="hoten" /></td>
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Thêm" name="cmd"/>
                           <input type="submit" value="Sửa" name="cmd" />
                           <input type="submit" value="Xóa" name="cmd" />
                        </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
               </form>
            </td>
         </tr>
      </table>
      <table>
         <tr>
            <td>
            </td>
         </tr>
         <tr>
            <td>
               <table  border="1px">
                  <tr>
                     <label ><b>Danh sách giải thưởng</b> <br> của hội viên có mã HV là &nbsp;</label>
                     <form name="form11" method="POST">
                        <input type="text" name="timkiem" maxlength="4" size="4"/>
                        <input type="submit" value="In" name="tim"/>
                     </form>
                     <br>
                  </tr>
                  <tr>
                     <td>STT</td>
                     <td>Tên giải thưởng</td>
                     <td>Ngày nhận</td>
                  </tr>
                  <?php
                     if(isset($_POST['tim'])){
                      $a = $_POST['timkiem'];
                      getData($a);	
					  global $giatri;
                      echo $giatri;
                     }
                      
                            ?>
               </table>
            </td>
			<td>
               <table  border="1px">
                  <tr>
                     <b>Tổng số giải thưởng của mỗi hội viên</b><br>
					 <form name="form2" method="POST">
                        Từ <input type="text" name="tungay" maxlength="10" size="10"/>
						đến <input type="text" name="denngay" maxlength="10" size="10"/>
                        &nbsp;<input type="submit" value="Tìm" name="timngay"/>
                     </form>
                  </tr>
                  <tr>
				  <br>
                     <td>Mã HV</td>
                     <td>Tên hội viên</td>
                     <td>Số giải thưởng</td>
                  </tr>
                  <?php
                     if(isset($_POST['timngay'])){
                      $a = $_POST['tungay'];
					  $b = $_POST['denngay'];
                      getData2($a,$b);	
					   global $giatri2;
                      echo $giatri2;
                     }
                     ?>
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>