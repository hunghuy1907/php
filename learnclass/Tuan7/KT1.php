<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <title>Cập nhật thông tin </title>
      <?php
         //Kêt nối CSDL
             mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
             mysql_select_db("hoivien") or die("Lỗi kết nối Database");
         
         
                         		// Hàm tach ho dem	
         function Chuanhoa($str,$type= NULL){
         //Chuyển về chữ thường
         $str = strtolower($str);
         
         //Lược bỏ khoảng trắng đầu và cuối chuỗi
         $str = trim($str);
         
         //Lược bỏ khoảng trắng thừa giữa các từ
         
         $array = explode(" ", $str);
         foreach ($array as $key => $value){
         if(trim($value)== null){
            unset($array[$key]);
            continue;
         }
         //Chuyển kí tự đầu mỗi từ thành chữ hoa
         if($type=="ten"){
            $array[$key] = ucfirst($value);
         }
         }
         //Chuyển kí tự đầu thành chữ hoa
         
         $result = implode(" ", $array);
         return $result;
         }
         
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

         // Hàm lấy dữ liệu từ CSDL và hiển thị
             function getData()
             {
                 global $giatri, $ketqua;
                 $giatri = "";
                 $query = "SELECT ma,ten FROM hoivien ORDER BY ten";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
                     $ketqua[$i] = mysql_fetch_array($result);
                     $giatri .= "
                  <tr>
                  <td>" . ($i + 1) . "</td>
                  <td><input type='checkbox' name='chonxoa[]' value=" . $i . " /></td>
                  <td><input type='checkbox' name='chonsua[]' value=" . $i . " /></td>
                  <td>" . $ketqua[$i]['ma'] . "</td>
                  <td>" . $ketqua[$i]['ten'] . "</td>
                  </tr>
                  ";
                 }
             }
             getData();
			  
			 
         	 // Lấy dữ liệu từ form
             $ma = isset($_REQUEST['ma']) ? $_REQUEST['ma'] : '';
             $ten = isset($_REQUEST['ten']) ? $_REQUEST['ten'] : '';
             $tenc = Chuanhoa($ten,"ten");
             // Lấy giá trị ở các ô checkbox
         
             $chonxoa = isset($_REQUEST['chonxoa']) ? $_REQUEST['chonxoa'] : 'off';
                    
             // Lấy sự kiện submit, khi click vào nút Xoa hoặc Cap nhat
             $cmd = isset($_REQUEST['in']) ? $_REQUEST['in'] : '';
         
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
			 
			 $chonsua = isset($_REQUEST['chonsua']) ? $_REQUEST['chonsua'] : 'off';
			 if ($chonsua != 'off') {	 
			  for ($i = 0; $i < count($chonsua); $i ++) {
                        updateData($ketqua[$chonsua[$i]]['ma']);
                     }
			 } 
	
             if ($cmd == 'Them') { // Nếu click nút Xoa
                 insertData($ma, $tenc); // Thêm bản ghi vào bảng hoivien
                 getData(); // Gọi lại hàm để lấy dữ liệu và hiển thị sau khi thêm bản ghi
             } else if ($cmd == 'Xoa') { 
             // Nếu click nút Xóa
                 if ($chonxoa != 'off') {					 // Nếu ô checkbox đã được lựa chọn
                     for ($i = 0; $i < count($chonxoa); $i ++) {
         
                         deleteData($ketqua[$chonxoa[$i]]['ma']);
                         // Xóa bản ghi
                     }
                     getData(); // Gọi hàm để lấy dữ liệu và hiển thị sau khi xóa bản ghi
                 }	}
				 
				 
				          // Hàm trả về danh sách các giải thưởng mà hội viên được nhận
             function getData1($ten)
             {
                 global $giatri1, $ketqua;
                 $giatri1 = "";
                 $query = "SELECT ma,ten FROM hoivien WHERE ten= '$ten'";
                 $result = mysql_query($query);
                 $numrows = mysql_num_rows($result);
                 for ($i = 0; $i < $numrows; $i ++) {
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
            <td>
               <form name="form" method="POST">
                  <table>
                     <tr>
                        <td width="30%">Mã HV:</td>
                        <td><input type="text" name="ma" /></td>
                     </tr>
                     <tr>
                        <td width="30%">Họ và tên:</td>
                        <td><input type="text" name="ten" /></td>
                     </tr>
                     <tr align="center">
                        <td colspan="2">
                           <input type="submit" value="Them" name="in"/>'
                           <input type="submit" value="Xoa" name="in" onClick="return confirm('Bạn có thực sự muốn xóa')">
                        </td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
            </td>
            <td>
            <table align="center" border="1px">
            <tr>
            <td>STT</td>
            <td>Chọn xóa</td>
            <td>Chọn sửa</td>
            <td>Mã HV</td>
            <td>Tên hội viên</td>
            </tr> 
            <?php
               global $giatri;
               echo $giatri;
             ?>	
            </table>					
            </td> 
         <td>
            <form name="formx" method="POST">
            <table>
            <tr>
            <td width="30%">Mã HV:</td>
            <td><input type="text" name="ma2" value="<?php echo $mas; ?>"/></td>
            </tr>
            <tr>
            <td width="30%">Họ và tên:</td>
            <td><input type="text" name="ten2" value="<?php echo $tens; ?>"/></td>
            </tr>
            <tr align="center">
            <td colspan="2">
            <input type="submit" value="Update" name="update"/>'
            </td>  
            </tr>
            </table>	
            </form>	 <?php
					 
             function updateData($ma)
             {   
             $query = ("SELECT * FROM hoivien WHERE ma='$ma'");
             $result=mysql_query($query);
             while($res = mysql_fetch_array($result))
              {
             $mas = $res['ma'];
             $tens = $res['ten'];
               }
 		 if(isset($_POST['update']))
        {			
		   $ma2 = isset($_REQUEST['ma2']) ? $_REQUEST['ma2'] : '';
             $ten2 = isset($_REQUEST['ten2']) ? $_REQUEST['ten2'] : '';
	// checking empty fields
	if(empty($ten2)) {	
			echo "<font color='red'>Name field is empty.</font><br/>";
	} else {	
		//updating the table
		$query=("UPDATE hocvien SET ten='$ten2' WHERE ma=$ma2");
		$result = mysql_query($query);
	}
        }   
		      }		 
			  
		?>	
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
                     if(isset($_POST['tim'])){
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
