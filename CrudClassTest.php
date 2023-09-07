<?php

include_once("Database.php");

$DBconnection = new Database("root", "15122005", "login_user_info", "localhost");

$crudObj = new CRUD(
    $DBconnection,
    "user",
    ["Username"]
);
var_dump($crudObj->Update("id", "9", ["DikkeDaap"]));

class CRUD
{
    private string $TableName;

    private array $TableValues;

    private Database $DB;

    private string $dsn;

    public function __construct(Database $dbObject, string $tableName, array $tableValues)
    {
        $this->TableName = $tableName;
        $this->TableValues = $tableValues;
        $this->DB = $dbObject;
        $this->dsn = "mysql:host=" . $this->DB->dbHost . ";dbname=" . $this->DB->dbName . ";charset=UTF8";
    }

    function Create(array $listOfStrings)
    {
        try {
            $pdo = new PDO($this->dsn, $this->DB->dbUser, $this->DB->dbPass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Creating the sql string
        $sql = "INSERT INTO $this->TableName ";
        $sql .= "(";
        foreach ($this->TableValues as $value) {
            $sql .= $value . ", ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ") VALUES (";
        foreach ($this->TableValues as $value) {
            $sql .= ":" . $value . ", ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ");";

        //Prepare the sql statement
        $stmt = $pdo->prepare($sql);

        //Bind the values to the sql statement
        $i = 0;
        foreach ($this->TableValues as $value) {
            $stmt->bindParam(":" . $value, $listOfStrings[$i]);
            $i++;
        }
        $stmt->execute();
    }
    //I need a function that reads from the database
    //The function should take in a string
    //The string should be the of the column that will be used for the where comparison
    //The function should take in a string
    //The string should be the value that will be used for the where comparison
    //The function should return an array of strings

    function Read(string $column, string $value)
    {
        try {
            $pdo = new PDO($this->dsn, $this->DB->dbUser, $this->DB->dbPass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Creating the sql string
        $sql = "SELECT * FROM $this->TableName WHERE $column = :$column;";

        //Prepare the sql statement
        $stmt = $pdo->prepare($sql);

        //Bind the values to the sql statement
        $stmt->bindParam(":" . $column, $value);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    //I need a function that updates the database
    //The function should take in two strings and an array of strings
    //The first string should be the of the column that will be used for the where comparison
    //The second string should be the value that will be used for the where comparison
    //The array of strings should be the values that will be used for the update
    //The function should return a boolean

    function Update(string $column, string $value, array $listOfNewValues)
    {
        try {
            $pdo = new PDO($this->dsn, $this->DB->dbUser, $this->DB->dbPass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Creating the sql string
        $sql = "UPDATE $this->TableName SET ";
        foreach ($this->TableValues as $val) {
            $sql .= $val . " = :" . $val . ", ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE $column = :$column;";

        //Prepare the sql statement
        $stmt = $pdo->prepare($sql);

        //Bind the values to the sql statement
        $i = 0;
        foreach ($this->TableValues as $val) {
            $stmt->bindParam(":" . $val, $listOfNewValues[$i]);
            $i++;
        }
        $stmt->bindParam(":" . $column, $value);
        $stmt->execute();

        return true;
    }
}
