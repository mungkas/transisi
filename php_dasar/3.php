<!DOCTYPE html>
<html>
<body>

<?php

$str = 'jakarta adalah sebuah ibukota negara republik indonesia';
$data   = explode(" ",$str);


function Unigrams($word){
    $arrlength = count($word);
    for($x = 0; $x < $arrlength;$x++) {
  echo $word[$x];
  echo ",";
} 
echo "<br>";
}

function Bigrams($word){
    $arrlength = count($word);
    for($x = 0; $x < $arrlength;$x++) {
    if (($x+1) % 2  == 0) {
     echo "$word[$x]";
     echo " ,";
    } else {
     echo "$word[$x]";
     echo " ";
    }
}
echo "<br> ";
}


function triGrams($word){
    $arrlength = count($word);
    for($x = 0; $x < $arrlength;$x++) {
    if (($x+1) % 3  == 0) {
     echo "$word[$x]";
     echo ",";
    } else {
     echo "$word[$x]";
     echo " ";
    }
}
echo "<br> ";
}


Unigrams($data);
Bigrams($data);
triGrams($data);




?>

</body>
</html>