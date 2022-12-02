<?php

$input = file_get_contents("../Input/Day2.txt");

$inputArray = explode(PHP_EOL, $input);

/**
 * A = Rock
 * B = Paper
 * C = Scissors
 *
 * X = Rock
 * Y = Paper
 * Z = Scissors
 */

print_r($inputArray);

$score = 0;
foreach ($inputArray as $turn) {
    $game = explode(" ", $turn);
    switch ($game) {
        case $game[0] == 'B' && $game[1] == 'X':
        case $game[0] == 'C' && $game[1] == 'Y':
        case $game[0] == 'A' && $game[1] == 'Z':
            //LOSE
            $score += calculateScore($game[1]);
            break;
        case $game[0] == 'C' && $game[1] == 'X':
        case $game[0] == 'A' && $game[1] == 'Y':
        case $game[0] == 'B' && $game[1] == 'Z':
            //WIN
            $score += 6 + calculateScore($game[1]);
            break;
        case $game[0] == 'A' && $game[1] == 'X':
        case $game[0] == 'B' && $game[1] == 'Y':
        case $game[0] == 'C' && $game[1] == 'Z':
            //DRAW
            $score += 3 + calculateScore($game[1]);
            break;
        default:
            echo "Can't determined who won for players $game[0] & $game[1]";
            exit;

    }
}

echo $score;

function calculateScore($shape)
{
    switch ($shape) {
        case 'X':
            return 1;
        case 'Y':
            return 2;
        case 'Z':
            return 3;
        default:
            echo "Can't calculate score for $shape!";
            exit;
    }
}