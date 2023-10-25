<?php

if (isset($argv[1])) {
    $model = $argv[1] . "Model";
    $controller = $argv[1];

    //Create the model
    $modelFile = fopen("./app/libraries/components/newModel.php", "r") or die("Unable to open file!");
    $modelContent = fread($modelFile, filesize("./app/libraries/components/newModel.php"));
    fclose($modelFile);

    $modelContent = str_replace("MODEL_NAME", $model, $modelContent);

    $newModelFile = fopen("./app/models/" . $model . ".php", "w") or die("Unable to open file!");
    fwrite($newModelFile, $modelContent);
    fclose($newModelFile);

    //Create the controller
    $controllerFile = fopen("./app/libraries/components/newController.php", "r") or die("Unable to open file!");
    $controllerContent = fread($controllerFile, filesize("./app/libraries/components/newController.php"));
    fclose($controllerFile);

    $controllerContent = str_replace("CONTROLLER_NAME", $controller, $controllerContent);

    $newControllerFile = fopen("./app/controllers/" . $controller . ".php", "w") or die("Unable to open file!");
    fwrite($newControllerFile, $controllerContent);
    fclose($newControllerFile);

    //Create the view
    $viewFile = fopen("./app/libraries/components/newView.php", "r") or die("Unable to open file!");
    $viewContent = fread($viewFile, filesize("./app/libraries/components/newView.php"));
    fclose($viewFile);

    mkdir("./app/views/" . $controller, 0777, true);

    $newViewFile = fopen("./app/views/" . $controller . "/index.php", "w") or die("Unable to open file!");
    fwrite($newViewFile, $viewContent);
    fclose($newViewFile);
}
