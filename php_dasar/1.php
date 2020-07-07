<?php
$nilai = [72, 65, 73, 78, 75, 74, 90, 81, 87, 65, 55, 69, 72, 78, 79, 91, 100, 40, 67, 77, 86]; 
$panjangArray = count($nilai);
$jumlah = array_sum($nilai);
$rata= $jumlah/$panjangArray;

echo round($rata,2). "<br>";
echo min($nilai) . "<br>";
echo max($nilai) . "<br>";

?>