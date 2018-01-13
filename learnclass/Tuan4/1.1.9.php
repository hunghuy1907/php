<?php
   //Tim chu so lon nhat
    echo "Nhap so n: ";

	fscanf(STDIN, "%g\n" ,$n);
	
	$temp = $n; 
	$Max = $temp % 10; // đặt max = min = số cuối
	$temp /= 10; // bỏ số cuối
	while($temp != 0)
	{
		$chuso = $temp % 10; // lấy chữ số cuối
		$temp /= 10; // loại chữ số cuối đi

		if($chuso > $Max)
		{
			$Max = $chuso;
		}
	}
	echo $Max;
?>