# Structure tool
With this tool you can easily with one command, setup a basic project structure.

## Download instructions

To get these tools to work simply

- Clone/Pull this repo *Preferably in a directory without spaces*

- Add the folder to your enviorment variables

And your good,
now you can use the "Create" command

## The files
Some of the files that come with the structure are filled in,
for example the php files.
They come with a CRUD class that can be used for mysql database connection.
You will need to make a new DbConnection like this:
```php
$DBconnection = new Database("dbUsername", "dbPassword", "dbName", "dbHost");
```
Now you can make a new CRUD object:
- "user" is the table name
- ["Username"] is the list of columns in the table we want to use
```php
$CrudObj = new CRUD($DBconnection,"user",["Username"]);
```

### Insert into db
To insert data into the database,
For example let's insert a new user into the database:
- We will need to change the value list to suit the table "user"
```php
$CrudObj = new CRUD($DBconnection,"user",["Username", "Password", "FullName"]);
```

Now we can add values to the database:
- Here we can enter a list of strings and those will be fired into the database
```php
$CrudObj->Create(["ThePope05", "1234", "Simon Wobben"]);
```

### Read from db
To read data from the database,
We will need //Work in progress

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
