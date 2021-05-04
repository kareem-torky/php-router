<?php 

namespace Src;

class View 
{
    public static function render()
    {
    
    }

    public static function errorRender(string $errorMessage)
    {
        include ERROR_VIEWS_PATH . "show.php";
        die();
    }
}