# Tools

## - Structure Tool

With this tool you can easily with one command, setup a basic project structure.

## - Start tool

With this tool you can start applications from anywhere

## Download instructions

To get these tools to work simply

-   Clone/Pull this repo _Preferably in a directory without spaces_

-   Add the folder to your enviorment variables

And your good,
now you can use the "Create" command

## The structures

### - HTML

```cmd
Create html YOUR_PROJECT_NAME
```

### - MVC Framework

```cmd
Create mvc YOUR_PROJECT_NAME
```
### - __Swift__
The mvc comes with it's own dev helper tool called __Swift__, this can help with starting a localhost, running database scripts and creating new models, views and controllers.

To run the localhost do:
```cmd
php Swift localhost
```
__*you need to fill in the config.php*__

To run the database scripts from the folder 'db' do:
```cmd
php Swift database
```
__*you need to fill in the config.php*__
It is possible to run single scripts instead of the whole folder content,
to do this run:
```cmd
php Swift database 01
```
*replace '01' with the numebr of your script*

To create a new __Model__:
```cmd
php Swift create MODEL_NAME -m
```
the script automatically adds 'Model' to the end of the name so there is no need to do this

To create a new __Controller__ do:
```cmd
php Swift create CONTROLLER_NAME -c
```

To create a new __ViewFolder__ and __View__ do:
```cmd
php Swift create VIEW_FOLDER_NAME -v
```


To create a new __Model__, __View__ and __Controller__ do:
```cmd
php Swift create NAME -a
```
or:
```cmd
php Swift create NAME -m -v -c
```

## Custom structures

If you want to add your own structures this is very easy to do,
simply create the structure, and add it to the structures folder.
The name of the paramater will be the main folder of the structure,
so say you add a python structure like this:

-   Structures
    -   pythonStructure
        -   pythonFile01
        -   pythonFile02

Your command to create this structure would be

```cmd
Create pythonStructure YOUR_PROJECT_NAME
```
