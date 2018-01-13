<?php
	/*
		Tính điểm trung bình
	*/

		echo "Nhap diem trung binh: ";
	
		fscanf(STDIN, "%g\n" ,$diem);

		if($diem <0 || $diem > 10){  
			echo "Diem khong hop le";
			exit;
		}

		if( $diem < 5){
			echo "Hoc luc kem";
			exit;
		}

		if( $diem >=5 && $diem < 6.5){
			echo "Hoc luc trung binh";
			exit;
		}

		if( $diem >=6.5 && $diem < 8){
			echo "Hoc luc kha";
			exit;
		}

		echo "Hoc luc gioi";  
		exit;
?>