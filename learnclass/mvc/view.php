<?php
	class QuadraticView {
		private $arr; //du lieu tho, la ket qua cua xu ly nghiep vu

		public function __construct($arr) {
			$this->arr = $arr;
		}
	
		/**
		* Tao noi dung web tu du lieu tho
		*/
		public function render() {
			$html = "<!DOCTYPE html> ";
			$html .= "<html>";
			$html .= "<head>";
			$html .= "<title>Phuong trinh bac hai</title>";
			$html .= "<meta http-equiv='content-type' content='text/html; 
	charset=utf-8'>";
			$html .= "</head>";
			$html .= "<body>";
			$html .= "<h1>Phuong trinh bac hai</h1>";

			if ($this->arr[0] == 0) $html .= "Phuong trinh vo nghiem";
			else if ($this->arr[0] == 1) $html .= "Phuong trinh co MOT nghiem x = ".$this->arr[1];
			else if ($this->arr[0] == 2) $html .= "Phuong trinh co HAI nghiem x1 = ".$this->arr[1].", x2 = ".$this->arr[2];
			else $html .= "Phuong trinh co VO SO nghiem";

			$html .= "</body></html>";

			return $html;
		}	
	}
