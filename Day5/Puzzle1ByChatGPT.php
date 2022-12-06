<?php

// Read the input from standard input
$input = file_get_contents("../Input/Day5/Crates.txt");

// Parse the input into an array of stacks and an array of operations
$input = explode(PHP_EOL, $input);
$stacks = explode(" ", array_shift($input));
$operations = array_filter($input, function($line) {
    return !empty($line);
});

// Create an array to represent each stack of crates
$crates = array_map(function() {
    return [];
}, $stacks);

// Perform the operations on the stacks of crates
foreach ($operations as $operation) {
    $parts = explode(" ", $operation);
    $numCrates = (int)$parts[1];
    $srcStack = (int)$parts[3] - 1;
    $destStack = (int)$parts[5] - 1;

    // Move the crates from the source stack to the destination stack
    for ($i = 0; $i < $numCrates; $i++) {
        $crates[$destStack]->push($crates[$srcStack]->pop());
    }
}

// Determine the top crate on each stack
$topCrates = "";
foreach ($crates as $stack) {
    $topCrates .= $stack->top();
}

// Print the result
echo $topCrates . PHP_EOL;