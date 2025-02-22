<?php

define("TS_Reset", "\033[0m");

$terminalColors = [
    "red" => "\033[31m",
    "green" => "\033[32m",
    "yellow" => "\033[33m",
    "blue" => "\033[34m",
    "magenta" => "\033[35m",
    "cyan" => "\033[36m",
    "white" => "\033[37m",
];

$terminalStyles = [
    "bold" => "\033[1m",
    "underline" => "\033[4m",
    "blink" => "\033[5m",
    "reverse" => "\033[7m",
    "hidden" => "\033[8m",
];

if ($argc > 1) {

    if ($argv[1] == "-v"){
        writeTerminalLine(["bold", "green"], "¯\_(ツ)_/¯ no clue");
        cancelScript();
    }

    if (is_dir(__DIR__ . "/Structures/" . $argv[1])) {
        if ($argc > 2) {
            writeTerminalLine(["blink", "green"], "Creating project");

            if (is_dir(getcwd() . "/" . $argv[2])) {
                writeTerminalLine(["bold", "red"], "Project folder already exists");
                cancelScript();
            }

            //Creating the project folder

            $dir = getcwd() . "/" . $argv[2];
            $projectDir = mkdir($dir, 0777);

            if ($projectDir) {
                writeTerminalLine(["bold", "green"], "Created project folder");
                scanCopyDir($dir, __DIR__ . "/Structures/" . $argv[1]);
            } else {
                writeTerminalLine(["bold", "red"], "Failed to create project folder");
                cancelScript();
            }


            writeTerminalLine(["bold", "green"], "\n Project created");
            cancelScript();
        } else {
            writeTerminalLine(["bold", "red"], "Expected project name");
            cancelScript();
        }
    } else {
        writeTerminalLine(["bold", "red"], "Project structure not found");
        cancelScript();
    }
} else {
    writeTerminalLine(["bold", "red"], "Expected project structure");

    $allStructures = scandir(__DIR__ . "/Structures");
    $allStructures = array_slice($allStructures, 2);

    writeTerminalLine(["bold", "green"], "Available structures:");
    foreach ($allStructures as $structure) {
        writeTerminalLine(["bold", "green"], " - " . $structure);
    }

    cancelScript();
}

function scanCopyDir($dir = "", $exampleDir = "")
{
    $allFiles = scandir($exampleDir);
    $toScan = [];

    foreach ($allFiles as $file) {
        if ($file != "." && $file != "..") {
            if (!is_dir($exampleDir . "/" . $file)) {
                $fileCopy = copy($exampleDir . "/" . $file, $dir . "/" . $file);
                if ($fileCopy) {
                    writeTerminalLine(["bold", "green"], "Created " . $file);
                } else {
                    writeTerminalLine(["bold", "red"], "Failed to create " . $file);
                    unlink($dir);
                    cancelScript();
                }
            } else {
                $newDir = mkdir($dir . "/" . $file, 0777);
                if ($newDir) {
                    writeTerminalLine(["bold", "green"], "Created " . $file);

                    scanCopyDir($dir . "/" . $file . "/", $exampleDir . "/" . $file . "/");
                } else {
                    writeTerminalLine(["bold", "red"], "Failed to create " . $file);
                    unlink($dir);
                    cancelScript();
                }
            }
        }
    }
}

function writeTerminalLine($style = [["bold"], "red"], $text = "No Text Specified")
{
    global $terminalColors;
    global $terminalStyles;

    echo "\n";

    if (!is_array($style[0])) {
        $style[0] = [$style[0]];
    }
    foreach ($style[0] as $styleName) {
        echo $terminalStyles[$styleName];
    }


    echo $terminalColors[$style[1]] . $text . "\n" . TS_Reset;
    echo $terminalStyles["bold"] . $terminalColors["red"];
}

function cancelScript()
{
    echo TS_Reset . "\n";
    exit();
}
