<?php

//I need a class for multiple php files
//The class should contain multiple functions that returns a php file
//CRUD should be implemented in these functions
//one function for each CRUD operation

class PhpFiles
{
    public function createPhpFile()
    {
        //I need a function that creates a php file
        //In that php file I need a class
        //The class should contain a function
        //the class function should take in a list of strings
        
        $phpFile = '<?php
        
include("config.php");
class CRUD
{
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
    
    public function Create($listOfStrings)
    {
        try
        {
            $pdo = new PDO($dsn, $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO $tableName (listOfStrings) VALUES (:listOfStrings)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":listOfStrings", $listOfStrings);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}';

    }
}