<?php
//I want this script to be able to create a new model, view and controller
//This will be done by copying some files and replacing some strings
//First we need to get the name of the model, view and controller
//We can do this by using the $argv variable
//The first argument will be the name of the model
//The second argument will be the name of the view
//The third argument will be the name of the controller

//The example files are located in the app/libraries/components folder
//The example files are called newModel.php, newView.php and newController.php
//The controller will be placed in the app/controllers folder
//The model will be placed in the app/models folder
//The view will be placed in the app/views folder

//The example files contain the following strings:
//MODEL_NAME the name of the model will be $argv[1]
//CONTROLLER_NAME the name of the controller will be $argv[1] + Controller

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
