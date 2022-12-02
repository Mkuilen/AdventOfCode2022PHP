<?php

//Part 1

$input = file_get_contents("../Input/Day1.txt");

$inputArray = explode(PHP_EOL, $input);

$elves = array();
$totalCalories = 0;
foreach($inputArray as $calorie){
    if($calorie != ""){
        $totalCalories += intval($calorie);
    } else {
        $elves[] = $totalCalories;
        $totalCalories = 0;
    }
}

$highestValue = max($elves);

//Part 2

$sumTop3 = 0;

for($i=0;$i<3;$i++){
    $highestValue = max($elves);
    $sumTop3 += $highestValue;

    $highestValueKey = array_search($highestValue, $elves);
    unset($elves[$highestValueKey]);
}

echo $sumTop3;

