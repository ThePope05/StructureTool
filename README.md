# Structure tool
With this tool you can easily with one command, setup a basic project structure.

## Download instructions

To get these tools to work simply

- Clone/Pull this repo *Preferably in a directory without spaces*

- Add the folder to your enviorment variables

And your good,
now you can use the "Create" command

## Using the CRUD class
The structure comes with a class file,
this can be used to comunicate a mysql database.
To use this there are a few simple steps.
### Connecting to the database
For starters we need a Database object,
this will be used to connect to the database.
This object will save your database information.

```php
$DBconnection = new Database("dbUsername", "dbPassword", "dbName", "dbHost");
```
- dbUsername:
  - The username u use to log into your database
- dbPassword:
  - The password u use to log into your database
- dbName:
  - The name of your database
- dbHost:
  - The name of the database host
 
### Creating a CRUD object
To make a new CRUD object you will need the Database object,
```php
$CrudObj = new CRUD(Object : Database, String : TableName, Array : ListOfColumns);
```
- Database:
  - This excpects a Database object
- TableName:
  - This excpects a String
  - References to the database table
- ListOfColumns:
  - This excpects a Array of Strings
  - References to columns of the table
### *Important*
The List of columns changes on what you need,
for example. If you need to read a table, the list doesn't matter at all. However if you create a new row of data, you will need to mention all data that is not null or auto fill in.
//Work in progress

### Insert into db
To insert data into the database,
```php
$CrudObj = new CRUD(Object : Database, String : TableName, Array : ListOfColumns);
```
- Database:
  - This excpects a Database object
- TableName:
  - This excpects a String
  - References to the database table
- ListOfColumns:
  - This excpects a Array of Strings
  - References to columns of the table

Now we can add values to the database:
- Here we can enter a list of strings and those will be fired into the database
```php
$CrudObj->Create(["ThePope05", "1234", "Simon Wobben"]);
```

### Read from db
To read data from the database,
We will need to 

## Documentation
'Create' is the base command, it all works from here.
After 'Create' there will be a keyword, the keyword will reference to a structure.
Then there will be a 'ProjectName'

### The main structure
- html
  - Assets
    - Js
    - Css
    - Php
