<?php

require_once './app/config/config.php';

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);

$allSqlFiles = glob('./app/db/*.sql');

foreach ($allSqlFiles as $sqlFile) {
    $sql = file_get_contents($sqlFile);
    $pdo->exec($sql);

    echo PHP_EOL . basename($sqlFile) . ' executed successfully' . PHP_EOL;
}
