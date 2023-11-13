<?php
require_once 'libraries/Core.php';
require_once 'libraries/BaseController.php';
require_once 'libraries/Database.php';
require_once 'config/config.php';

$components = scandir('./components');
foreach ($components as $component) {
    if ($component != '.' && $component != '..') {
        require_once './components/' . $component;
    }
}

$init = new Core();
