<?php
  function isHoanhao($n){
      $sum = 1;
      for($i = 2 ; $i <= $n/2; $i++)
      {
          
          if( $n % $i == 0)
              $sum += $i;
      }
      iF($n==$sum) 
          return 1;
      else 
          return 0;
  }
  
  /*echo "Nhap so n: ";
  fscanf(STDIN, "%g\n" ,$n);*/
    
    for($i = 0 ; $i <= 100000; $i++){
            if(isHoanhao($i)==1)
                echo $i.' ';
        }
  ?>