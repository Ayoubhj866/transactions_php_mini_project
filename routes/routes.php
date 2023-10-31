<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\TransactionController;
use App\Controllers\UserController;

require "../vendor/autoload.php";
$router = new AltoRouter();

/**
 * /loogin : the route
 * [AuthController::class, "login" ,  true ] : [ COntroller, the methode will be executed ,  the view will be display inside the layaut or no (true if yes)]
 * "loginPage"  : the route name
 * $router->map("GET" , "/login" , [AuthController::class, "login" ,  true ] , "loginPage" );
 */

//! Get Routes

//auth routes
$router->map("GET" , "/login" , [AuthController::class, "loginPage" ,  true ] , "loginPage" );
$router->map("GET" , "/register" , [AuthController::class, "registerPage" , true ] ,  "registerPage");
$router->map("GET" , "/logout" , [AuthController::class, "logout" , true ] ,  "logout");

//home routes
$router->map("GET", "/", [HomeController::class, "index" , true], "homePage");

//users routes
$router -> map("GET" , "/users" , [UserController::class , "index" , true] , "usersPage") ;

//transactions routes
$router -> map('GET' , "/transactions" , [TransactionController::class , "index" , true] , "transactionsPage");
$router -> map('GET' , "/transactions/create" , [TransactionController::class , "create" , true] , "createTransaction");

//! POST Routes

//auth post routes
$router -> map("POST" , "/login" , [AuthController::class , "login" , true] , "login") ;
$router -> map("POST" , "/register" , [AuthController::class , "register" , true] , "register") ;