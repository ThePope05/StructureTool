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

writeTerminalLine([["bold", "underline", "reverse"], "magenta"], "Thank you for using my MVC framework");
writeTerminalLine(["bold", "green"], "Executing database");

require_once './app/config/config.php';

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    writeTerminalLine(["bold", "green"], "Connected to database");
} catch (PDOException $e) {
    writeTerminalLine(["bold", "red"], "Connection failed: " . $e->getMessage());
    writeTerminalLine(["bold", "yellow"], "Possible database creation required");

    writeTerminalLine(["bold", "yellow"], "Do you want to create database? (y/n):");
    $createDb = readline('');

    if ($createDb == 'y') {
        try {
            $pdo = new PDO('mysql:host=' . DB_HOST, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'CREATE DATABASE ' . DB_NAME . '; USE ' . DB_NAME;
            $pdo->exec($sql);

            writeTerminalLine(["bold", "green"], "Database created successfully");
        } catch (PDOException $e) {
            writeTerminalLine(["bold", "red"], "Database creation failed: " . $e->getMessage());
            cancelScript();
        }
    } else {
        cancelScript();
    }
}

if (isset($argv[1])) {
    $sqlFile = glob('./app/db/' . $argv[1] . '*.sql');
    $sql = file_get_contents($sqlFile[0]);
    $pdo->exec($sql);

    $cleanName = str_replace('.sql', '', $sqlFile[0]);
    $cleanName = str_replace('./app/db/', '', $cleanName);
    writeTerminalLine(["bold", "green"], $cleanName . ' executed successfully' . PHP_EOL);
    cancelScript();
} else {
    $allSqlFiles = glob('./app/db/*.sql');

    foreach ($allSqlFiles as $sqlFile) {
        $sql = file_get_contents($sqlFile);
        $pdo->exec($sql);

        $cleanName = str_replace('.sql', '', $sqlFile);
        $cleanName = str_replace('./app/db/', '', $cleanName);
        writeTerminalLine(["bold", "green"], $cleanName . ' executed successfully' . PHP_EOL);
    }

    writeTerminalLine(["bold", "green"], 'All SQL files executed successfully' . PHP_EOL);
    cancelScript();
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


function cancelScript($message = "Thank you for using my MVC framework")
{
    echo TS_Reset . "\n";
    writeTerminalLine([["bold", "underline", "reverse"], "magenta"], $message);
    echo TS_Reset . "\n";
    exit();
}
