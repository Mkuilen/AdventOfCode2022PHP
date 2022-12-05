<?php

$input = file_get_contents("../Input/Day4.txt");

$inputArray = explode(PHP_EOL, $input);

for ($i = 0; $i < sizeof($inputArray); $i++) {
    $inputArray[$i] = explode(",", $inputArray[$i]);
    for ($j = 0; $j < sizeof($inputArray[$i]); $j++){
        $inputArray[$i][$j] = explode("-", $inputArray[$i][$j]);
        $inputArray[$i][$j] = range($inputArray[$i][$j][0], $inputArray[$i][$j][1]);
    }
}

$assignments = 0;
foreach($inputArray as $pairs){
    if(!array_diff($pairs[0], $pairs[1])){
        $assignments += 1;
    } else if(!array_diff($pairs[1], $pairs[0])) {
        $assignments += 1;
    }
}

echo $assignments;