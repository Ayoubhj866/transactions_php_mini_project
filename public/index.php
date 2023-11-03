<?php

use App\Core\App;
use App\Helpers\CsvHelper;
use App\Models\Transaction;
use App\Models\User;

require "../app/Core/Config.php";
require "../routes/routes.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//! Match the routes
$match = $router->match();

//resolve route
App::run($match);

dump($_SERVER['REQUEST_URI']) ;