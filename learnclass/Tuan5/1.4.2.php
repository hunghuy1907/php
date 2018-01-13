<?php
$a = array(); $i;
echo "Nhap vao so N=";
 fscanf(STDIN,"%g \n",$N);

for($i=0;$i<$N;$i++){
   fscanf(STDIN,"%g \n",$a[$i]);
}
for($i=0;$i<$N;$i++){
  if($a[$i]>0){
       echo("So duong dau tien trong mang la $a[$i] va co chi so $i \n");
	   break;
  }
}

for($i=0;$i<$N;$i++){
  if($a[$i]<0){
       echo("So am dau tien trong mang la $a[$i] va co chi so $i \n");
	   break;
  }
}
?>