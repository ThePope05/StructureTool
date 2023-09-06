<?php

//I need a class for a css file
//The class should contain a function that returns a css file with a basic html structure

class CssFile
{
    public function createCssFile()
    {
        $cssFile = "html {font-size: 16px;}
        
*{
    box-sizing: border-box; 
    margin: 0; 
    padding: 0
}";

        return $cssFile;
    }
}