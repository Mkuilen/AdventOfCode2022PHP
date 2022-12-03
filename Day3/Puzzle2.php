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
$group = 0;
$groupArray = array();
foreach ($inputArray as $ruckSack) {
    $groupArray[] = $ruckSack;
    $group++;
    if($group == 3){
        $elve = 0;
        foreach($groupArray as $groupStr) {
            $groupArray[$elve] = str_split($groupStr);
            $elve++;
        }
        if($badge = array_intersect($groupArray[0], $groupArray[1], $groupArray[2])){
            if($badge){
                $priority = (array_search(reset($badge), $priorityArray) + 1);
                $totalPriority += $priority;
                $group = 0;
                $groupArray = array();
            }
        }
    }
}

echo $totalPriority;