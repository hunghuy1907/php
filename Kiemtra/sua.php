    <?php
	    
	        $conn=mysql_connect("localhost", "root", "") or die("Lỗi kết nối Server");
			 mysql_set_charset('utf8',$conn);
             mysql_select_db("giangday") or die("Lỗi kết nối Database");
if (isset($_GET['mamonhoc']) && $monhoc = $_GET['mamonhoc']) {
    if (isset($_GET['magiangvien']) && $giangvien = $_GET['magiangvien']) {
       $query       = "SELECT* FROM Giangvien_Monhoc WHERE mamonhoc=$monhoc AND magiangvien= $giangvien";
       $result      = mysql_query($query);
       $res         = mysql_fetch_array($result);
       $ngaybatdau  = $res['ngaybatdau'];
       $mamonhoc    = $res['mamonhoc'];
       $magiangvien = $res['magiangvien'];
    }
 }
 if (isset($_POST['update'])) {
    $monhoc2     = $_POST['mamonhoc2'];
    $giangvien2  = $_POST['magiangvien2'];
    $ngaybatdau2 = $_POST['ngaybatdau2'];
    
    $query  = "UPDATE Giangvien_Monhoc SET mamonhoc='$monhoc2', magiangvien= '$giangvien2', ngaybatdau='$ngaybatdau2' WHERE mamonhoc=$monhoc AND magiangvien= $giangvien";
    $result = mysql_query($query);
    
    header("Location: KT.php");
 }
?> 
<form name="formx" method="POST">
   <table>
      <tr>
         <?php 
            $query1="SELECT * FROM monhoc";
            $KQ1=mysql_query($query1); 
            
            ?>
         <td width="40%"><label>Môn học mới</label></td>
         <td>
            <select name="mamonhoc2">
               <?php
                  while($tenmonhoc = mysql_fetch_array($KQ1))
                  {
                  ?>
               <option <?php if($tenmonhoc['mamonhoc']==$mamonhoc) echo "selected=\"selected\""?>value="<?php echo $tenmonhoc['mamonhoc'] ?>"><?php echo $tenmonhoc['tenmonhoc'] ?></option>
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
         <td width="40%">Giảng viên mới</td>
         <td>
            <select name="magiangvien2" >
               <?php
                  while($tengiangvien = mysql_fetch_array($KQ2))
                  {
                  ?>
               <option <?php if($tengiangvien['magiangvien']==$magiangvien) echo "selected=\"selected\""?> value="<?php echo $tengiangvien['magiangvien'] ?>"><?php echo $tengiangvien['tengiangvien'] ?></option>
               <?php 
                  } 
                  ?>
            </select>
         </td>
      </tr>
      <tr>
         <td width="30%">Ngày bắt đầu:</td>
         <td><input type="date" name="ngaybatdau2" value="<?php echo $ngaybatdau ?>" /></td>
      </tr>
      <tr align="center">
         <td colspan="2">
            <input type="submit"  name="update" value="Lưu lại"/>'
         </td>
      </tr>
   </table>
</form>