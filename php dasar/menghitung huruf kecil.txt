<?php  
function Countt($str) 
{ 
    $besar = 0;  
    $kecil = 0; 
    for ($i = 0; $i < strlen($str); $i++) 
    { 
        if ($str[$i] >= 'A' &&  
            $str[$i] <= 'Z') 
            $besar++; 
        else if ($str[$i] >= 'a' &&  
                 $str[$i] <= 'z') 
            $kecil++; 
         
    } 
    echo "TranSISI mengandung : " ,$kecil,"\n", "buah huruf kecil"; 
} 
  
    $str = "TranSISI"; 
    Countt($str); 
  
?>