<?php 
		/*
		*   Kiểm tra xem tháng có bao nhiêu ngày
		*/
		echo "Nhap thang: ";
		fscanf(STDIN, "%g\n" ,$thang);

		$n = (int) $thang;

		if($n != $thang){ 
			echo "Thang phai la so nguyen !";
			exit;
		}

		if($thang < 1 || $thang > 12){
			echo "Thang khong hop le";
			exit;
		}

		switch ($thang) {
			case 2:
				echo "Thang co 29 ngay neu la nam nhuan, 28 ngay neu nam thuong";
				break;

			case 4:
			case 6:
			case 9:
			case 11:
				echo "Thang co 31 ngay";
				break;
			
			default:
				echo "Thang co 30 ngay";
				break;
		}

		exit;
?>