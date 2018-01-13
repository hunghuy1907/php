<?php
echo "Nhap xau s: ";
$s= fgets(fopen('php://stdin','r'));
echo "Nhap tu w: ";
$w= fgets(fopen('php://stdin','r'));

echo substr_count($s,$w);
?>