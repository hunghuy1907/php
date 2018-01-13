<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$db_host = "localhost"; 
$db_name    = 'demofe';
$db_username    = 'root'; 
$db_password    = '';
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Không thể kết nối database");
@mysql_set_charset('utf8');
@mysql_select_db("{$db_name}") or die("Không thể chọn database");
?>
