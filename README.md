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
Create html yourProjectName
```

### - MVC Framework

```cmd
Create mvc yourProjectName
```
#### - Sub-command
The mvc comes with a sub command, to create a new Controller, Model and View.
To use said command, you have to be in the same directory as the Create.cmd and do:
```cmd
./Create.cmd YourControllerName
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
Create pythonStructure yourProjectName
```
