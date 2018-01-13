<?php
$a = array(); $i;
echo "Nhap vao so N=";
 fscanf(STDIN,"%g \n",$N);

for($i=0;$i<$N;$i++){
   fscanf(STDIN,"%g \n",$a[$i]);
}
  $max=$min=$a[0];
  for($i=0;$i<$N;$i++){
  if($a[$i]> $max){
    $max = $a[$i];       
  }
  if($a[$i] <$min){
    $min = $a[$i];
  }
}
  echo("So lon nhat trong mang la $max \n");
  echo("So nho nhat trong mang la $min \n");

?>