<?php

$input = file_get_contents("../Input/Day2.txt");

$inputArray = explode(PHP_EOL, $input);

/**
 * A = Rock
 * B = Paper
 * C = Scissors
 *
 * X = Lose
 * Y = Draw
 * Z = Win
 */

$score = 0;
foreach ($inputArray as $turn) {
    $game = explode(" ", $turn);
    $score += determineShapeAndOutcome($game[0], $game[1]);
}

echo $score;

function determineShapeAndOutcome($shape, $outcome): ?int
{
    $points = 0;

    switch ($shape){
        case 'A':
            switch (determineOutcome($outcome)){
                case 0:
                    $points += 3;
                    break;
                case 3:
                    $points += 1;
                    break;
                case 6:
                    $points += 2;
                    break;
            }
            break;
        case 'B':
            switch (determineOutcome($outcome)){
                case 0:
                    $points += 1;
                    break;
                case 3:
                    $points += 2;
                    break;
                case 6:
                    $points += 3;
                    break;
            }
            break;
        case 'C':
            switch (determineOutcome($outcome)){
                case 0:
                    $points += 2;
                    break;
                case 3:
                    $points += 3;
                    break;
                case 6:
                    $points += 1;
                    break;
            }
            break;
        default:
            echo "An error occurred!";
            break;
    }

    return $points += determineOutcome($outcome);
}

function determineOutcome($outcome){
    return match ($outcome) {
        'X' => 0,
        'Y' => 3,
        'Z' => 6,
        default => null,
    };
}