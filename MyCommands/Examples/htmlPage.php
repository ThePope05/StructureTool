<?php

//I need a class for a html page
//The class should contain only a title
//The class should return an empty html page with the title as the header title

class HtmlPage
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function createHtmlPage()
    {
        $htmlPage = "<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='Assets/Css/style.css'>
        <title>" . $this->title . "</title>
    </head>
    <body>
        
    <script src='Assets/Js/script.js'></script>
    </body>
</html>";

        return $htmlPage;
    }
}