<?php 
		/*
		*   Chuyển số sang chữ 0->9
		*/
		echo "Nhap n: ";
	
		fscanf(STDIN, "%g\n" ,$n);

		switch ($n) {
			case '0':
				echo "So khong";
				break;
			case '1':
				echo "So mot";
				break;
			case '2':
				echo "So hai";
				break;
			case '3':
				echo "So ba";
				break;
			case '4':
				echo "So bon";
				break;
			case '5':
				echo "So nam";
				break;
			case '5':
				echo "So sau";
				break;
			case '7':
				echo "So bay";
				break;
			case '8':
				echo "So tam";
				break;
			case '9':
				echo "So chin";
				break;
			
			default:
				echo "Du lieu khong hop le";
				break;
		}
		exit();
?>