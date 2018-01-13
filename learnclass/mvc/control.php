<?php
	require_once("model.php");
	require_once("view.php");

	class QuadraticControl {
		public function proc() {
			if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"]) 
				&& is_numeric($_GET["a"]) && is_numeric($_GET["b"])
				&& is_numeric($_GET["c"])) {
				//1. Nhan yeu cau, xu ly cac tham so
				$a = $_GET["a"]; 
				$b = $_GET["b"]; 
				$c = $_GET["c"]; 

				//2. Goi model de xu ly nghiep vu
				$qmodel = new QuadraticModel($a, $b, $c);
				$arr = $qmodel->getValues(); //ket qua xu ly nghiep vu
	
				//3. Goi view de tao noi dung web
				$qview = new QuadraticView($arr);
				$html = $qview->render();
	
				//4. Tra loi client
				echo $html;
			} else {
				echo "Nhap a, b, c. Vi du ?a=3&b=-4&c=1";
			}
		}
	}

