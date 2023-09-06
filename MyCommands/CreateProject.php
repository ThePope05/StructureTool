<?php

include_once("Examples/htmlPage.php");
include_once("Examples/cssFile.php");
// I need a if statement here to check the paramater so that I can run different code depending on the paramater

if ($argc > 1) {

    //echo "All paramaters: " . $Argv . "\n";

    //The argv in the if statement should be upper case

    if ($argv[1] == "html") {
        if ($argv[2] != null) {
            echo "Creating html structure" . "\n";

            if (is_dir(getcwd() . "/" . $argv[2])) {
                echo "Project already exists" . "\n";
                exit();
            }

            $dirName = getcwd() . "/" . $argv[2];

            $projectDir = mkdir($dirName, 0755);

            //Creating the index file
            $indexFile = fopen($dirName . "/index.html", "w");
            $indexFileContent = new HtmlPage($argv[2]);
            $indexFileContent = $indexFileContent->createHtmlPage();
            fwrite($indexFile, $indexFileContent);
            fclose($indexFile);

            //Creating Assets folder
            $assetsDir = mkdir($dirName . "/Assets", 0755);

            //Creating CSS folder and file
            $cssDir = mkdir($dirName . "/Assets/Css", 0755);
            $cssFile = fopen($dirName . "/Assets/Css/style.css", "w");
            $cssFileContent = new CssFile();
            $cssFileContent = $cssFileContent->createCssFile();
            fwrite($cssFile, $cssFileContent);
            fclose($cssFile);

            //Creating JS folder and file
            $jsDir = mkdir($dirName . "/Assets/Js", 0755);
            $jsFile = fopen($dirName . "/Assets/Js/script.js", "w");
            fclose($jsFile);
        } else {
            echo "Excpected project name" . "\n";
        }
    } else {
        echo "Invalid paramater: " . $argv[1] . "\n";
    }
} else {
    echo "No paramaters" . "\n";
}
