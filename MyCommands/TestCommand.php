<?php

// I need a if statement here to check the paramater so that I can run different code depending on the paramater

if($argc > 1){

    //echo "All paramaters: " . $Argv . "\n";

    if ($argv[1] == "test") {
        echo "Testing" . "\n";
    } else if($argv[1] == "curDir") {
        echo getcwd() . "\n";
    }
}
else{
    echo "No paramaters" . "\n";
}

