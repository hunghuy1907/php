<?php
$a = array(); $i;
echo "Nhap vao so N=";
 fscanf(STDIN,"%g \n",$N);

for($i=0;$i<$N;$i++){
   fscanf(STDIN,"%g \n",$a[$i]);
}
   sort($a);
  for($i=0;$i<$N;$i++){
   echo "$a[$i] ";
  }
?>