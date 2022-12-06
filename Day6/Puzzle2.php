<?php

$order = file_get_contents("../Input/Day6.txt");
$orderArray = str_split($order);

$queue = new SplQueue();

foreach($orderArray as $key => $char){
    while($queue->count() != 14){
        $queue->enqueue($char);
    }
    $queueArray = iterator_to_array($queue);
    if(count(array_unique($queueArray)) == count($queueArray)){
        echo "MARKER FOUND AFTER " . $key + 1 . " CHARACTERS";
        break;
    }
    $queue->dequeue();
}