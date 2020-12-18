<?php
$bil = array(72,65,73,78,75,74,90,81,87,65,55,69,72,78,79,91,100,40,67,77,86);
$total = 0;
for ($i = 0; $i <= count($bil)-1; $i++)
{
$total = $total + $bil[$i];
}
$ratarata = $total/count($bil);
echo "Rata-ratanya adalah : ".$ratarata;
?>