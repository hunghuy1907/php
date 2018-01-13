<?php
$a = array(); $i;
echo "Nhap vao so N=";
 fscanf(STDIN,"%g \n",$N);
 $sum=0;
 $demam=0; $demduong=0;
 $sumam=0;
 $sumduong=0;

for($i=0;$i<$N;$i++){
   fscanf(STDIN,"%g \n",$a[$i]);
}
for($i=0;$i<$N;$i++){
  $sum+= $a[$i];
  if($a[$i]>0){
  $demduong++;
  $sumduong+=$a[$i];
  
  }
  else{
     $demam++;
	 $sumam+= $a[$i];
	  
  }
}
        echo("Tong cac so  la $sum");
        echo("Trong mang co $demduong so duong va tong cac so duong la $sumduong \n");
        echo("Trong mang co $demam so am va tong cac so am la $sumam \n");
?>