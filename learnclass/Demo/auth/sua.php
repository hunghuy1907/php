<?php 
  require_once("config.php"); 
  				  
  if(isset($_GET['id']) & $edit_id = $_GET['id']){
  	$edit_id = $_GET['id'];
  	$get_user = "select * from users where id='$edit_id'";
  	$run_user = mysql_query($get_user);
  	$row_user = mysql_fetch_array($run_user);
  	$username = $row_user['username'];
  	$quyen = $row_user['keya'];
  }
  	if(isset($_POST['update']))
  	{
  		    $key_new = $_POST['u_key'];
  			$update_users = "update users set keya='$key_new' where id='$edit_id'";
  			$run_update = mysql_query($update_users);
  			if($run_update)
  			{
  			echo "<script>alert('A user has been Updated!')</script>";
  			echo "<script>window.open('Untitled-2.php','_self')</script>";	
  			}
  	}
  ?> 
<form method='post' >
  <table align="center">
    <tr>
      <td><b>Username: &nbsp</b><input type='text' name='u_name' value="<?php echo $username?>"/></td>
    </tr>
    <tr>
      <td>
        <b>Sửa quyền: &nbsp</b>
        <select name="u_key">
          <option <?php if($quyen==1) echo "selected=\"selected\""?> value="1" >Admin</option>
          <option <?php if($quyen==0) echo "selected=\"selected\""?> value="0">User</option>
        </select>
    </tr>
    <tr>
      <td><input type='submit' name='update' value='Update'/></td>
    </tr>
  </table>
</form>