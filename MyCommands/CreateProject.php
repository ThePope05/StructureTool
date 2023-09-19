<?php

if ($argc > 1) {

    $allArg = scandir(__DIR__ . "/Structures");

    array_shift($allArg);
    array_shift($allArg);

    if (in_array($argv[1], $allArg)) {
        if ($argv[2] != null) {
            echo "Creating structure" . "\n";

            if (is_dir(getcwd() . "/" . $argv[2])) {
                echo "Project already exists" . "\n";
                exit();
            }

            //Creating the project folder
            
            $dir = getcwd() . "/" . $argv[2];
            $projectDir = mkdir($dir, 0777);

            if ($projectDir) {
                echo "Created project folder" . "\n";
                scanCopyDir($dir, __DIR__ . "/Structures/" . $argv[1]);
            } else {
                echo "Failed to create project folder" . "\n";
                exit();
            }


            echo "\n" . "Process complete" . "\n \n";
        } else {
            echo "Excpected [project name]" . "\n";
        }
    }
    else {
        echo "Invalid keyword: " . $argv[1] . "\n \n";
        echo "Valid keywords: " . "\n";
        foreach($allArg as $arg){
            echo "- " . $arg . "\n";
        }
    }
} else {
    echo "Excpected keyword" . "\n";
}

function scanCopyDir($dir = "", $exampleDir = ""){
    $allFiles = scandir($exampleDir);
    $toScan = [];

    foreach($allFiles as $file){
        if($file != "." && $file != ".."){
            if(!is_dir($exampleDir . "/" . $file)){
                $fileCopy = copy($exampleDir . "/" . $file, $dir . "/" . $file);
                if($fileCopy){
                    echo "Created " . $file . "\n";
                }
                else{
                    echo "Failed to create " . $file . "\n";
                    exit();
                }
            }
            else{
                $newDir = mkdir($dir . "/" . $file, 0777);
                if($newDir){
                    echo "Created " . $file . "\n";

                    scanCopyDir($dir . "/" . $file . "/", $exampleDir . "/" . $file . "/");
                }
                else{
                    echo "Failed to create " . $file . "\n";
                    exit();
                }
            }
        }
    }
}