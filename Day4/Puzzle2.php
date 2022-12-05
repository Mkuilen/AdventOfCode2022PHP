<?php

$input = file_get_contents("../Input/Day4.txt");

$inputArray = explode(PHP_EOL, $input);

for ($i = 0; $i < sizeof($inputArray); $i++) {
    $inputArray[$i] = explode(",", $inputArray[$i]);
    for ($j = 0; $j < sizeof($inputArray[$i]); $j++) {
        $inputArray[$i][$j] = explode("-", $inputArray[$i][$j]);
        $inputArray[$i][$j] = range($inputArray[$i][$j][0], $inputArray[$i][$j][1]);
    }
    $inputArray[$i] = array_merge((array)$inputArray[$i][0], (array)$inputArray[$i][1]);
}

//print_r($inputArray);

$totalOverlap = 0;
foreach ($inputArray as $assignments) {
//    print_r(gettype($assignments));
    $countAssignments = array_count_values($assignments);
    foreach ($countAssignments as $countAssignment){
        if($countAssignment > 1){
            $totalOverlap += 1;
            break;
        }
    }
}

echo $totalOverlap;