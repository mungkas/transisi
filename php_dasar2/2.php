<?php
function enkripsi($input){ 
    $base = range('A', 'Z');
    $enkrip = array(); 
        $text = strtoupper($input); 
        $inputArr = str_split($text);
        $arrlength = count($inputArr);
        for($x = 0; $x < $arrlength;$x++) {
            if(($x+1) % 2  == 1) {
                $pola= array_search($inputArr[$x],$base,true);
                $pola = $pola+($x+1);
                $enkrip[$x] = $base[$pola];
            } else {
                $pola = array_search($inputArr[$x],$base,true);
                $pola = $pola+(1-$x-2);
                $enkrip[$x] = $base[$pola];
            }
        } 
        return $hasil=implode(" ", $enkrip);;        

}

$text="DFHKNQ";
echo enkripsi($text);

?>