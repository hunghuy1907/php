<?php
echo "Nhap xau s: ";
$str= fgets(fopen('php://stdin','r'));
function ham_dao_nguoc_chuoi($str1)  
{  
		 $n = strlen($str1);  
		 if($n == 1)  
		 {  
			return $str1;  
		 }  
		 else  
		 {  
		   $n--;  
		   return ham_dao_nguoc_chuoi(substr($str1,1, $n)) . substr($str1, 0, 1);  
		 }  
} 

	   if( strcmp(ham_dao_nguoc_chuoi($str),$str) == 0)
	     echo "s la xau doi xung";
	   else 
		 echo "s khong doi xung";
?>