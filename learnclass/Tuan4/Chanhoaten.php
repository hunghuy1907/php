<?php
echo "Nhap ten: ";
$name= fgets(fopen('php://stdin','r'));
$result = Chuanhoa($name,"ten");
echo $result;

function Chuanhoa($str,$type= NULL){
    //Chuyển về chữ thường
    $str = strtolower($str);
    
    //Lược bỏ khoảng trắng đầu và cuối chuỗi
    $str = trim($str);
    
    //Lược bỏ khoảng trắng thừa giữa các từ
    
    $array = explode(" ", $str);
    foreach ($array as $key => $value){
        if(trim($value)== null){
            unset($array[$key]);
            continue;
        }
        //Chuyển kí tự đầu mỗi từ thành chữ hoa
        if($type=="ten"){
            $array[$key] = ucfirst($value);
        }
    }
      //Chuyển kí tự đầu thành chữ hoa
      
      $result = implode(" ", $array);
      return $result;
    }
?>