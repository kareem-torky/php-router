<?php 

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", __DIR__ . DS);
define("APP_PATH", ROOT . "app" . DS);
define("ROUTES_PATH", ROOT . "routes" . DS);
define("SRC_PATH", ROOT . "src" . DS);
define("VENDOR_PATH", ROOT . "vendor" . DS);
define("RESOURCES_PATH", ROOT . "resources" . DS);
define("VIEWS_PATH", RESOURCES_PATH . "views" . DS);
define("ERROR_VIEWS_PATH", VIEWS_PATH . "errors" . DS);
define("URL", $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));