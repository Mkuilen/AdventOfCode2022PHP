<?php

$order = file_get_contents("../Input/Day6.txt");
$orderArray = str_split($order);

$queue = new SplQueue();

foreach($orderArray as $key => $char){
    echo $char . PHP_EOL;
    while($queue->count() != 4){
        echo $char . PHP_EOL;
        $queue->enqueue($char);
    }
    $queueArray = iterator_to_array($queue);
    if(count(array_unique($queueArray)) == count($queueArray)){
        echo "MARKER FOUND AFTER " . $key + 1 . " CHARACTERS";
        break;
    }
    $queue->dequeue();
}