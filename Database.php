<?php

//I need a class "Database"
//the class should contain 4 variables
//the variables should be public
//the variables should be $dbUser, $dbPass, $dbName, $dbHost
//the variables should be set in the constructor

class Database
{
    public $dbUser;
    public $dbPass;
    public $dbName;
    public $dbHost;

    public function __construct($dbUser, $dbPass, $dbName, $dbHost)
    {
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
    }
}