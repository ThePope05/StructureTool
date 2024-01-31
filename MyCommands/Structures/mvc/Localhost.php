<?php

include_once 'app/config/config.php';

$server = "localhost:" . PORT;

echo 'Server running on ' . $server . PHP_EOL;

shell_exec(sprintf('php -S %s', $server) . " -t public/ -c php.ini");
