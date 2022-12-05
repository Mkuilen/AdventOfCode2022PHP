<?php

$crates = file_get_contents("../Input/Day5/Crates.txt");
$cratesArray = explode(PHP_EOL, $crates);

for($i = 0; $i < sizeof($cratesArray); $i++){
    $cratesArray[$i] = explode(" ", $cratesArray[$i]);
    array_shift($cratesArray[$i]);
}

$moves = file_get_contents("../Input/Day5/Moves.txt");
$movesArray = explode(PHP_EOL, $moves);
for($i = 0; $i < sizeof($movesArray); $i++){
    $movesArray[$i] = explode(" ", $movesArray[$i]);
}

foreach($movesArray as $move){
    $from = $move[3] - 1;
    $to = $move[5] - 1;
    $cratesToBeMoved = array();
    for ($i = 0; $i < $move[1]; $i++){
        $cratesToBeMoved[] = array_pop($cratesArray[$from]);
    }
    $cratesToBeMoved = array_reverse($cratesToBeMoved);
    print_r($cratesToBeMoved);
    $cratesArray[$to] = array_merge($cratesArray[$to], $cratesToBeMoved);
}

print_r($cratesArray);

foreach($cratesArray as $crate){
    echo end($crate);
}