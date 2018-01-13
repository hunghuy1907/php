<?php
    echo "Nhap vao 3 he so a b c:";
    $a = 0;
    $b = 0;
    $c = 0;
    fscanf(STDIN,"%g %g %g\n",$a,$b,$c);
    if(!$a)
    {
        echo("Day khong phai la phuong trinh bac 2!");
        exit;
    }
 
    if(!is_numeric($a) OR !is_numeric($b) OR !is_numeric($c))
    {
        echo("Cac he so nhap bi sai! no phai la mot so(!)");
        exit;
    }
	
    $delta = $b*$b - 4*$a*$c;
	
    if($delta < 0) 
    {
        echo("Phuong trinh vo nghiem");
    }
    else if(!$delta)
    {
		$nkep = (float)(-$b/(2*$a));
        echo("Phuong trinh co nghiem kep x = $nkep");
    }
    else
    {
        $n1 = (-$b+sqrt($delta))/(2*$a);
        $n2 = (-$b-sqrt($delta))/(2*$a);
        echo("Phuong trinh co 2 nghiem phan biet n1 = $n1 va n2 = $n2");
        
    }
?>