<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin giải thưởng</title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
      <?php
         //Kêt nối CSDL
		     
                include('ketnoi.php');
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
                  
                  <td><center>" . $ketqua[$i]['maGT'] . "</center></td>
                  <td>" . $ketqua[$i]['tenGT'] . "</td>
				  <td><center>" . $ketqua[$i]['Nguoithem'] . "</center></td>
				  <td><center><input type='checkbox' name='chonxoa[]' value=" . $i . " /></center></td>
				  </tr>
                  ";
                 }
                  }

         	 // Lấy dữ liệu từ form		    
			if (isset($_GET['user']))
            {
                   $user = $_GET['user'];
				  
            }
             $magt = isset($_REQUEST['magt']) ? $_REQUEST['magt'] : '';
             $tengt = isset($_REQUEST['tengt']) ? $_REQUEST['tengt'] : '';

           $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
            // Hàm Insert bản ghi
             function insertData($magt, $tengt, $user)
             {
                 $query = "INSERT INTO giaithuong(magt,tengt, nguoithem) VALUES('" . $magt . "', '" . $tengt . "', '" . $user . "')";
                 mysql_query($query);
             }
         
            // Hàm Delete bản ghi
             function deleteData($magt)
             {
                 $query = "DELETE FROM giaithuong WHERE magt='" . $magt . "'";
                 mysql_query($query);
             }
         
             if ($cmd == 'Thêm') { // Nếu click nút Xoa
                 insertData($magt, $tengt,$user); // Thêm bản ghi vào bảng giaithuong
                 getData(); // Gọi lại hàm để lấy dữ liệu và hiển thị sau khi thêm bản ghi
             } else if ($cmd == 'Xóa') { // Nếu click nút Xóa
                 if ($chonxoa != 'off') { // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i ++) {
                         deleteData($ketqua[$chonxoa[$i]]['magt']);
                         // Xóa bản ghi
                     }
                     getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                 }	}
        
             ?>
			 
   </head>
   <body>
   <center><h1>Quản lý giải thưởng</h1></center>
   
                  <a href="index.php">Trang chủ</a>
                  <a href="logout.php">Đăng xuất</a> 
      <table align="center" >
         <tr>
            <td>
               <form name="form" method="POST">
                  <table>
                   
                     <tr>
                        <td width="30%">Mã GT:</td>
                        <td><input type="text" name="magt" /></td>
                     </tr>
                      <tr>
                        <td width="40%">Tên GT:</td>
                        <td><input type="text" name="tengt" /></td>
                     </tr>
                     <tr align="center">
                        <td colspan="3">
                           <input type="submit" value="Thêm" name="in"/>
                           <input type="submit" value="Xóa" name="in" />
                        </td>
                        <td>&nbsp;</td>
                     </tr> 
					 </table>
				</form>
                 
				  </td>
                 
				  <td>
				   <table align="center" border="1px">
				    <tr>
				   
                     <td><center>Mã GT</center></td>
                     <td><center>Tên GT</center></td>
                      <td><center>Người thêm</center></td>
                       <td><center>Chọn xóa</center></td>
					 </tr> 
		             <?php
                      getData();
					  global $giatri;
                      echo $giatri;
                      ?>	
                   </table>				 
                     </td>
         </tr>
      </table>
     
   </body>
</html>