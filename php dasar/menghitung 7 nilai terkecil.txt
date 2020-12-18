<?php 
function NilaiTertinggi($arr, $arr_size) 
{ 
    $i; $satu; $dua; $tiga; $empat; $lima; $enam; $tujuh;
 

    $tujuh = $satu = $dua = $tiga = $empat = $lima = $enam = PHP_INT_MAX; 
    for ($i = 0; $i <$arr_size ; $i ++) 
    { 

        if ($arr[$i] < $satu) 
        { 
            $tujuh = $enam;
	$enam = $lima;
	$lima = $empat;
	$empat = $tiga;
	$tiga = $dua; 
            $dua = $satu; 
            $satu = $arr[$i]; 
        } 
        else if ($arr[$i] < $dua) 
        { 
            $tujuh = $enam;
	$enam = $lima;
	$lima = $empat;
	$empat = $tiga;
	$tiga = $dua;
            $dua = $arr[$i]; 
        } 

        else if ($arr[$i] < $tiga)
 { 
	$tujuh = $enam;
	$enam = $lima;
	$lima = $empat;
	$empat = $tiga;
            $tiga = $arr[$i]; 
 }
 else if ($arr[$i] < $empat) 
        { 
            $tujuh = $enam;
	$enam = $lima;
	$lima = $empat;
            $empat = $arr[$i]; 
        } 
else if ($arr[$i] < $lima) 
        { 
            $tujuh = $enam;
	$enam = $lima;
            $lima = $arr[$i]; 
        } 
else if ($arr[$i] < $enam) 
        { 
            $tujuh = $enam;
            $enam = $arr[$i]; 
        } 
else if ($arr[$i] < $tujuh) 
            $tujuh = $arr[$i]; 


    } 

    echo "7 Bilangan Tertinggi adalah :  ", 
    $satu, " ", $dua, " ", $tiga, " ", $empat, " ", $lima, " ", $enam, " ", $tujuh, " "; 
} 


$arr = array(72,65,73,78,75,74,90,81,87,65,55,69,72,78,79,91,100,40,67,77,86); 
$n = count($arr); 
NilaiTertinggi($arr, $n); 

?>