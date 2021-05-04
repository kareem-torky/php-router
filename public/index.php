<?php 

require __DIR__ . "/../env.php";
require VENDOR_PATH . "autoload.php";
require ROUTES_PATH . "web.php";

use Src\App;

$app = new App;