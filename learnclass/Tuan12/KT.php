<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Quản lý giảng dạy </title>
      <?php
         //Kêt nối CSDL
             $conn=mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
			 mysql_set_charset('utf8',$conn);
             mysql_select_db("tuan12") or die("Lỗi kết nối Database");

         // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData()
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT monhoc.tenmonhoc,giangvien.tengiangvien,giangday.* FROM giangday INNER JOIN giangvien ON giangday.giangvienID=giangvien.giangvienID INNER JOIN monhoc ON giangday.monhocID=monhoc.monhocID";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
					 $ngay =date("d/m/Y",strtotime($ketqua[$i]['ngaybatdau']));
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td>" . $ketqua[$i]['tenmonhoc'] . "</td>
                  <td>" . $ketqua[$i]['tengiangvien'] . "</td>
			       <td> ".$ngay." </td>
				  <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
                  <td><a href='sua.php?monhocID=". $ketqua[$i]['monhocID'] . "&giangvienID=". $ketqua[$i]['giangvienID'] . "'> Sửa </a></td>
                  </tr>
                  ";
                 }
             }
             getData();
			  
			 
         	 // Lấy dữ liệu từ form
             $giangvien = isset($_REQUEST['giangvienID']) ? $_REQUEST['giangvienID'] : '';
             $monhoc = isset($_REQUEST['monhocID']) ? $_REQUEST['monhocID'] : '';
             $ngaybatdau = isset($_REQUEST['ngaybatdau']) ? $_REQUEST['ngaybatdau'] : '';
			 
             // Lấy giá trị ở các ô checkbox
         
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
                    
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
            // Hàm Insert bản ghi
             function insertData($giangvien,$monhoc,$ngaybatdau)
             {
                 $query = "INSERT INTO giangday(giangvienID, monhocID,ngaybatdau) VALUES('" . $giangvien . "', '" .  $monhoc . "', '" .  $ngaybatdau . "')";
                 mysql_query($query);
             }
         
            // Hàm Delete bản ghi
             function deleteData($monhoc,$giangvien,$ngaybatdau)
             {
                 $query = "DELETE FROM giangday WHERE monhocID='" . $monhoc . "' AND giangvienID='" . $giangvien . "' AND ngaybatdau='" . $ngaybatdau . "'";
                 mysql_query($query);
             }
             if ($cmd == 'Thêm') { // Nếu click nút Xoa
                 insertData($giangvien,$monhoc,$ngaybatdau); // Thêm bản ghi vào bảng hoivien
                 getData(); // Gọi lại hàm để lấy dữ liệu và hiển thị sau khi thêm bản ghi
             } else if ($cmd == 'Xóa') { 
             // Nếu click nút Xóa
                 if ($chonxoa != 'off') {					 // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i ++) {
         
                         deleteData($ketqua[$chonxoa[$i]]['monhocID'],$ketqua[$chonxoa[$i]]['giangvienID'],$ketqua[$chonxoa[$i]]['ngaybatdau']);
                         // Xóa bản ghi
                     }
                     getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                 }	}
				 
             ?>
   </head>
   <body>
      <center>
         <h1>Quản lý giảng dạy</h1>
      </center>
      <table align="center" >
         <tr align="center">
            <td>
               <form name="form" method="POST">
                  <table>
				  
                     <tr>
					  <?php 
            $query1="SELECT * FROM monhoc";
            $KQ1=mysql_query($query1); 
            
            ?>
                        <td width="40%"><label>Môn học</label></td>
                        <td>
                     <select name="monhocID">
                    <?php
                    while($tenmonhoc = mysql_fetch_array($KQ1))
                    {
                    ?>
                        <option value="<?php echo $tenmonhoc['monhocID'] ?>"><?php echo $tenmonhoc['tenmonhoc'] ?></option>
                    <?php 
                    } 
                    ?>
                 </select>
				 </td>
                     </tr>
					      <tr>
					  <?php 
            $query1="SELECT * FROM giangvien";
            $KQ2=mysql_query($query1); 
            
            ?>
                        <td width="40%">Giảng viên</td>
                        <td>
                     <select name="giangvienID">
                    <?php
                    while($tengiangvien = mysql_fetch_array($KQ2))
                    {
                    ?>
                        <option value="<?php echo $tengiangvien['giangvienID'] ?>"><?php echo $tengiangvien['tengiangvien'] ?></option>
                    <?php 
                    } 
                    ?>
                 </select>
				 </td>
                     </tr>
                     <tr>
                         
                        <td width="30%">Ngày bắt đầu:</td>
                        <td><input type="text" name="ngaybatdau" /></td>
                     
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Thêm" name="in"/>'
                           <input type="submit" value="Xóa" name="in" onClick="return confirm('Bạn có thực sự muốn xóa')">
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
            <td>Môn học</td>
			<td>Giảng viên</td>
			<td>Ngày bắt đầu</td>
			<td>Chọn xóa</td>
            <td>Chọn sửa</td>
            </tr> 
            <?php
               global $giatri;
               echo $giatri;
             ?>	
            </table>					
            </td> 
		 </tr>
		  <tr> 
		   <td>
            <table align="center" border="1px">
            <tr>
            <td>STT</td>
            <td>Môn học</td>
			<td>Giảng viên</td>
			<td>Ngày bắt đầu</td>
			<td>Chọn xóa</td>
            <td>Chọn sửa</td>
            </tr> 
            <?php
               
             ?>	
            </table>					
            </td> 
		 </tr>
      </table>
   </body>
</html>