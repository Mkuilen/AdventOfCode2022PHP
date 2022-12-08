<?php

$files = file_get_contents("../Input/Day7.txt");
$filesArray = explode(PHP_EOL, $files);

$numbers = range(1, 9);

$fileSystem["/"] = array();
$currentDir = array();
foreach ($filesArray as $key => $file) {
    switch ($file[0]) {
        case '$':
            //Is command
            if (preg_match('/cd/i', $file)) {
                preg_match('/cd (.*)/i', $file, $workingDir);
                $currentDir[] = $workingDir[1];

                if ($workingDir[1] == "/") {
                    $currentDir = array();

                } else if ($workingDir[1] == "..") {
                    array_pop($currentDir);
                }

            } else if (preg_match('/ls/i', $file)) {
//                print_r($file . PHP_EOL);
                continue 2;
            } else {
                echo "AN ERROR HAS OCCURRED DETERMINING THE COMMAND, THE COMMAND WAS " . $file;
                die;

            }
            break;
        case is_numeric($file[0]):
            //Is file
            preg_match('/[0-9]+/', $file, $fileSize);
            $fileSystem['/'] = createMultiDimArray($currentDir, $fileSize[0]);
            print_r($fileSystem);
            break;
        case "d":
            //Is directory
            $currentDir[] = str_replace("dir ", "", $file);
            break;
    }
}


function createMultiDimArray(array $directory, int $file): ?array
{
    if (empty($directory)) {
        return null;
    }
    if (sizeof($directory) == 1) {
        return [array_shift($directory) => array($file)];
    }
    return [array_shift($directory) => createMultiDimArray($directory, $file)];
}