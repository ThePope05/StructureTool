<?php

// I need a if statement here to check the paramater so that I can run different code depending on the paramater

if($argc > 1){

    //echo "All paramaters: " . $Argv . "\n";

    //The argv in the if statement should be upper case

    if($argv[1] == "html"){
        echo "Test" . "\n";
    }
    else if($argv[1] == "test2"){
        echo "Test2" . "\n";
    }
    else{
        echo "Invalid paramater" . "\n";
    }
}
else{
    echo "No paramaters" . "\n";
}

