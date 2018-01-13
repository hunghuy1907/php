<?php
	echo "<h1>Phuong trinh bac hai </h1>";

	if (!isset($_GET["a"]) || !isset($_GET["b"]) || !isset($_GET["c"])) {
		echo "Nhap a, b, c";
	} else {
		//Buoc 1. Nhan cac tham so tu client gui len
		//        va lam sach roi phan tich
		$a = EscapeShellCmd($_GET["a"]);
		$b = EscapeShellCmd($_GET["b"]);
		$c = EscapeShellCmd($_GET["c"]);
		if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
			echo "a b c phai la so";
		} else {
			//Buoc 2. Giai bai toan va tra ket qua cho client
			//        Vua xu ly nghiep vu (giai bai toan)
			//        vua trinh dien	
			if ($a != 0) {//la phuong trinh bac hai
				$delta = $b*$b - 4*$a*$c;
				if ($delta < 0) echo "Phuong trinh vo nghiem";
				else if ($delta == 0) echo "Phuong trinh co mot nghiem x = ".(-$b/2/$a);
				else echo "Phuong trinh co hai nghiem x1 = ".((-$b-sqrt($delta))/2/$a).", x2 = ".((-$b+sqrt($delta))/2/$a);
			} else { //la phuong trinh bac nhat
				if ($b != 0) echo "Phuong trinh co mot nghiem x = ".(-$c/$b);
				else if ($c == 0) echo "Phuong trinh co vo so nghiem";
				else echo "Phuong trinh vo nghiem";
			}
		}
	}
?>
