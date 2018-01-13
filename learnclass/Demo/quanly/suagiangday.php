<?php
 require_once("../auth/config.php");
 if (isset($_GET['monhocID']) && $monhoc = $_GET['monhocID']) {
    if (isset($_GET['giangvienID']) && $giangvien = $_GET['giangvienID']) {
       $query       = "SELECT* FROM giangday WHERE monhocID=$monhoc AND giangvienID= $giangvien";
       $result      = mysql_query($query);
       $res         = mysql_fetch_array($result);
       $ngaybatdau  = $res['ngaybatdau'];
       $monhocID    = $res['monhocID'];
       $giangvienID = $res['giangvienID'];
    }
 }
 if (isset($_POST['update'])) {
    $monhoc2     = $_POST['monhocID2'];
    $giangvien2  = $_POST['giangvienID2'];
    $ngaybatdau2 = $_POST['ngaybatdau2'];
    
    $query  = "UPDATE giangday SET monhocID='$monhoc2', giangvienID= '$giangvien2', ngaybatdau='$ngaybatdau2' WHERE monhocID=$monhoc AND giangvienID= $giangvien";
    $result = mysql_query($query);
    
    header("Location: quanlygiangday.php");
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
            <select name="monhocID2">
               <?php
                  while($tenmonhoc = mysql_fetch_array($KQ1))
                  {
                  ?>
               <option <?php if($tenmonhoc['monhocID']==$monhocID) echo "selected=\"selected\""?>value="<?php echo $tenmonhoc['monhocID'] ?>"><?php echo $tenmonhoc['tenmonhoc'] ?></option>
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
            <select name="giangvienID2" >
               <?php
                  while($tengiangvien = mysql_fetch_array($KQ2))
                  {
                  ?>
               <option <?php if($tengiangvien['giangvienID']==$giangvienID) echo "selected=\"selected\""?> value="<?php echo $tengiangvien['giangvienID'] ?>"><?php echo $tengiangvien['tengiangvien'] ?></option>
               <?php 
                  } 
                  ?>
            </select>
         </td>
      </tr>
      <tr>
         <td width="30%">Ngày bắt đầu:</td>
         <td><input type="text" name="ngaybatdau2" value="<?php echo $ngaybatdau ?>" /></td>
      </tr>
      <tr align="center">
         <td colspan="2">
            <input type="submit"  name="update" value="Lưu lại"/>'
         </td>
      </tr>
   </table>
</form>