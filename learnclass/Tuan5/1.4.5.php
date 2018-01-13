<?php
$a = array(); $i;
echo "Nhap vao so N=";
 fscanf(STDIN,"%g \n",$N);

for($i=0;$i<$N;$i++){
   fscanf(STDIN,"%g \n",$a[$i]);
}

echo "Nhap vao so k=";
 fscanf(STDIN,"%g \n",$k);
  $demk=0;
  
  for($i=0;$i<$N;$i++){
  if($a[$i] == $k){
    $demk++;       
  }
}
  if($demk==0) 
	  echo "Trong mang khong co so k";
  else
      echo("So lan xuat hien cua $k trong mang la $demk \n");

?>