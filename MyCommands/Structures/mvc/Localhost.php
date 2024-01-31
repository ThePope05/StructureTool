<?php

$port = 8000;

$server = sprintf('localhost:%d', $port);

echo 'Server running on ' . $server . PHP_EOL;

shell_exec(sprintf('php -S %s', $server) . " -t public/ -c php.ini");
