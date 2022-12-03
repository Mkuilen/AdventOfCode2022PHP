<?php

$input = file_get_contents("../Input/Day3.txt");

$inputArray = explode(PHP_EOL, $input);

/**
 * a - z priority 1 - 26
 * A - Z priority 27 - 52
 */

$priorityArray = range('a', 'z');
$priorityArray = array_merge($priorityArray, range('A', 'Z'));

$totalPriority = 0;
foreach ($inputArray as $ruckSack) {
    $charArray = str_split($ruckSack);
    $secondHalf = array_chunk($charArray, ceil(count($charArray) / 2));
    for ($i = 0; $i < sizeof($charArray) / 2; $i++) {
        $key = array_search($charArray[$i], $secondHalf[1]);
        if($key){
            break;
        }
    }
    $priority = array_search($secondHalf[1][$key], $priorityArray) + 1;
    $totalPriority += $priority;
}

echo $totalPriority;