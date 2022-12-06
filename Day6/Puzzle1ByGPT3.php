<?php
$order = file_get_contents("../Input/Day6.txt");

echo findMarker($order);

function findMarker($input) {
    $buffer = str_split($input);
    $marker = [null, null, null, null];

    for ($i = 0; $i < sizeof($buffer); $i++) {
        array_shift($marker);
        $marker[] = $buffer[$i];

        if ($marker[0] !== $marker[1] && $marker[0] !== $marker[2] &&
            $marker[0] !== $marker[3] && $marker[1] !== $marker[2] &&
            $marker[1] !== $marker[3] && $marker[2] !== $marker[3]) {
            return $i + 1;
        }
    }
}