<?php 
		/*
		*	Kiem tra so nguyen to
		*/

		echo "Nhap so n: ";
		fscanf(STDIN, "%g\n" ,$n);
		$m = (int) $n;
		if($m != $n){ // Kiểm tra xem $n có phải số nguyên hay không
			echo "N phai la so nguyen !";
			exit;
		}

		if($n < 1){
			echo "N phai lon hon 0 !";
			exit;
		}

		for($i = 2 ; $i < (int)sqrt($n) ; $i++ ){ 
			if( ($n % $i) == 0){			
				echo $n." khong la so nguyen to";  
				exit;
			}
		}

		echo $n." la so nguyen to";
		exit;
?>