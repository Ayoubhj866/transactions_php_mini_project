<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


//PATHS
define("VIEWS_PATH" , dirname(__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR) ;