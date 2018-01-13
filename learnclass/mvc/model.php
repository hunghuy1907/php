<?php
	/**
	*
	* Phuong trinh bac hai 
	* a*x*x + b*x + c = 0
	*/
	class QuadraticModel {
		//Input:
		private $a; //he so bac hai
		private $b; //he so bac nhat
		private $c; //he so tu do
		//Outphut:
		private $retArray; //ket qua: [so nghiem, nghiem 1, nghiem 2]

		public function __construct($a, $b, $c) {
			$this->a = $a;
			$this->b = $b;
			$this->c = $c;
			$this->retArray = array();
			$this->solve();
		}

		/**
		* Giai phuong trinh
		*/
		private function solve() {
			if ($this->a != 0) {
				$delta = $this->b*$this->b - 4*$this->a*$this->c;
				if ($delta > 0) {
					$this->retArray[] = 2;
					$this->retArray[] = (-$this->b-sqrt($delta))/2/$this->a;
					$this->retArray[] = (-$this->b+sqrt($delta))/2/$this->a;
				} else if ($delta == 0) {
					$this->retArray[] = 1;
					$this->retArray[] = -$this->b/2/$this->a;
				} else {
					$this->retArray[] = 0;
				}
			} else {
				if ($this->b == 0) {
					if ($this->c == 0) $this->retArray[] = -1;
					else $this->retArray[] = 0;
				} else {
					$this->retArray[] = 1;
					$this->retArray[] = -$this->c/$this->b;
				}
				
			}
		}
		
		/**
		* Tra ve ket qua
		*/
		public function getValues() { return $this->retArray; }	
	}

