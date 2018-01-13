<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin </title>
      <?php
         //Kêt nối CSDL
             mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
             mysql_select_db("hoivien") or die("Lỗi kết nối Database");
          // Hàm tach ho dem	 
		  function Tachten($name){
	      $mangten = explode(" ",$name);
		  $sophantu = count($mangten);
          $ten = $mangten[$sophantu-1];
          $hodem = " ";
          for($i=1; $i < $sophantu-1 ;$i++){
			  $hodem = $mangten[i]." ";
		  }		  
		  return $ten;
		  }
	 
 	 
         // Hàm trả về danh sách các giải thưởng mà hội viên được nhận
             function getData1($maHV)
             {
                 global $giatri1, $ketqua;
                 $giatri1 = " ";
                 $query = "SELECT hoivien_giaithuong.maHV, giaithuong.tenGT,hoivien_giaithuong.ngaynhan  FROM hoivien_giaithuong RIGHT JOIN giaithuong ON hoivien_giaithuong.maGT=giaithuong.maGT WHERE hoivien_giaithuong.maHV= '$maHV'";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri1 .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
				  <td>" . $ketqua[$i]['maHV'] . "</td>
                  <td>" . $ketqua[$i]['tenGT'] . "</td>
                  <td>" . $ketqua[$i]['ngaynhan'] . "</td>
         		 </tr>
                  ";
                 }
             }
			  // Hàm thống kê số giải thưởng của các hội viên theo ngày
             function getData2($tungay,$denngay)
             {
                 global $giatri2, $ketqua;
                 $giatri2 = " ";
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
			 
        //thao tác quản lý hội viên 
        // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData()
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT * FROM hoivien ";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td><input type='checkbox' name='chonxoa[]'
                  value=" . $i . " /></td>
                  <td>" . $ketqua[$i]['maHV'] . "</td>
                  <td>" . $ketqua[$i]['tenhv'] . "</td>
                  <td>" . $ketqua[$i]['ngayvao'] . "</td>
                  <td>" . $ketqua[$i]['noicongtac'] . "</td>
				  </tr>
                  ";
                 }
             }
             getData();
         	 // Lấy dữ liệu từ form
             $mahv = isset($_REQUEST['mahv']) ? $_REQUEST['mahv'] : '';
             $hoten = isset($_REQUEST['hoten']) ? $_REQUEST['hoten'] : '';
             $ngayvao = isset($_REQUEST['ngayvao']) ? $_REQUEST['ngayvao'] : '';
             $noicongtac = isset($_REQUEST['noicongtac']) ? $_REQUEST['noicongtac'] : '';
             // Lấy giá trị ở các ô checkbox
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
         
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
            // Hàm Insert bản ghi
             function insertData($mahv, $hoten, $ngayvao, $noicongtac)
             {
                 $query = "INSERT INTO hoivien(mahv, tenhv, ngayvao, noicongtac) VALUES('" . $mahv . "', '" . $hoten . "', '" . $ngayvao . "','" . $noicongtac . "')";
                 mysql_query($query);
             }
         
            // Hàm Delete bản ghi
             function deleteData($mahv)
             {
                 $query = "DELETE FROM hoivien WHERE mahv='" . $mahv . "'";
                 mysql_query($query);
             }
         
             if ($cmd == 'Them') { // Nếu click nút Xoa
                 insertData($mahv, $hoten, $ngayvao, $noicongtac); // Thêm bản ghi vào bảng hoivien
                 getData(); // Gọi lại hàm để lấy dữ liệu và hiển thị sau khi thêm bản ghi
             } else if ($cmd == 'Xoa') { // Nếu click nút Xóa
                 if ($chonxoa != 'off') { // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i ++) {
                         deleteData($ketqua[$chonxoa[$i]]['maHV']);
                         // Xóa bản ghi
                     }
                     getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                 }	}
        
             ?>
			 
   </head>
   <body>
   <center><h1>Quản lý hội viên</h1></center>
      <table align="center" >
         <tr>
            <td>
               <form name="form" method="POST">
                  <table>
                     <tr>
                        <td width="30%">Mã HV:</td>
                        <td><input type="text" name="mahv" /></td>
                     </tr>
                     <tr>
                        <td width="30%">Họ và tên:</td>
                        <td><input type="text" name="hoten" /></td>
                     </tr>
                     <tr>
                        <td width="40%">Ngày vào hội:  &nbsp;</td>
                        <td><input type="text" name="ngayvao"></td>
                     </tr>
                     <tr>
                        <td width="40%">Nơi công tác:  &nbsp;</td>
                        <td><input type="text" name="noicongtac"></td>
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Them" name="in"/>
                           <input type="submit" value="Xoa" name="in" />
                        </td>
                        <td>&nbsp;</td>
                     </tr>
					 <?php
	     
					 ?>
                  </table>
				  </td>
				  <td>
				   <table align="center" border="1px">
				    <tr>
				     <td>STT</td>
					 <td>Chọn xóa</td>
                     <td>Mã HV</td>
                     <td>Tên hội viên</td>
                     <td>Ngày vào hội</td>
					 <td>Nơi công tác</td>
					 </tr> 
		             <?php
					  global $giatri;
                      echo $giatri;
                     ?>	
                   </table>					
               </form>
            </td>
         </tr>
      </table>
      <table align="center">
         <tr>
            <td>
               <table align="center" border="1px">
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
					  <td>Mã HV</td>
                     <td>Tên giải thưởng</td>
                     <td>Ngày nhận</td>
                  </tr>
                  <?php
                      if(isset($_POST['tim'])){
                      $a = $_POST['timkiem'];
                      getData1($a);	
					  global $giatri1;
                      echo $giatri1;
                     }
                      
                  ?>
               </table>
            </td>
			<td>
               <table align="center" border="1px">
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