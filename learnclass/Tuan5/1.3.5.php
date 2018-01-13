<?php
echo "Nhap xau: ";
$name= fgets(fopen('php://stdin','r'));
echo "Nhap tu can thay doi trong xau: ";
$src= fgets(fopen('php://stdin','r'));
echo "Nhap tu thay doi: ";
$dest= fgets(fopen('php://stdin','r'));

echo str_replace($src,$dest,$name);
?>