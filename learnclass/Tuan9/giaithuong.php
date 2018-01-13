<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin </title>
      <?php
         //Kêt nối CSDL
             mysql_connect("localhost", "root", "12345678") or die("Lỗi kết nối Server");
             mysql_select_db("hoivien") or die("Lỗi kết nối Database");
    
         // Hàm trả về danh sách các giải thưởng mà hội viên được nhận
             function getData1($maHV)
             {
                 global $giatri1, $ketqua;
                 $giatri1 = "";
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
		
        // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData()
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT * FROM giaithuong ";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td>" . $ketqua[$i]['maGT'] . "</td>
                  <td>" . $ketqua[$i]['tenGT'] . "</td>
				  </tr>
                  ";
                 }
             }
             getData();
         	 // Lấy dữ liệu từ form
             $mahv = isset($_REQUEST['magt']) ? $_REQUEST['magt'] : '';
             $ngaynhan = isset($_REQUEST['ngaynhan']) ? $_REQUEST['ngaynhan'] : '';
             // Lấy giá trị ở các ô checkbox
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
         
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
            // Hàm Insert bản ghi
             function insertData($magt, $ngaynhan)
             {
                 $query = "INSERT INTO hoivien_giaithuong(mahv,magt, ngaynhan) VALUES('" . $mahv . "', '" . $magt . "', '" . $ngaynhan . "')";
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
                        <td><input type="text" name="ma" /></td>
                     </tr>
                     <tr>
                        <td width="30%">Mã GT:</td>
                        <td><input type="text" name="magt" /></td>
                     </tr>
                      <tr>
                        <td width="30%">Ngày nhận:</td>
                        <td><input type="text" name="ngaynhan" /></td>
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Them" name="in"/>
                           <input type="submit" value="Xoa" name="in" />
                        </td>
                        <td>&nbsp;</td>
                     </tr> 
					 </table>
				</form>
                 
				  </td>
				  <td>
				   <table align="center" border="1px">
				    <tr>
				     <td>STT</td>
					
                     <td>Mã HV</td>
                     <td>Tên hội viên</td>
                     
					 </tr> 
		             <?php
					  global $giatri;
                      echo $giatri;
                     ?>	
                   </table>				 </td>	
                     <td><table align="center" border="1px">
				    <tr>
				     <td>STT</td>
					
                     <td>Mã HV</td>
                     <td>Tên hội viên</td>
                       <td>Tên hội viên</td>
					 </tr> 
		             <?php
					  $a = $_POST['timkiem'];
                      getData1(1001);	
					  global $giatri1;
                      echo $giatri1;
                     ?>	
                   </table>					
            </td>
         </tr>
      </table>
     
   </body>
</html>