<?php 

// Gets the absolute url by route name

use Src\Routing\Route;

if (! function_exists('route')) {
    function route(string $name) {
        echo URL . Route::getInstance()->getOneByName($name);
    }
}

// Gets the absolute url by relative url
if (! function_exists('url')) {
    function url(string $url) {
        echo URL . $url;
    }
}