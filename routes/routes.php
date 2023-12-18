<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\TransactionController;
use App\Controllers\UserController;

require "../vendor/autoload.php";
$router = new AltoRouter();

/**
 * /login : how to write an route
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
$router->map("GET", "/", [HomeController::class, "index" , true], "home");

//users routes
$router -> map("GET" , "/users" , [UserController::class , "index" , true] , "users")  ;
$router -> map("GET" , "/users/[*:id]/edit" , [UserController::class , "edit" , true] , "editUser") ;
$router -> map("GET" , "/users/[*:id]/delete" , [UserController::class , "delete" , true] , "deleteUser") ;
$router -> map("GET" , "/users/create" , [UserController::class , "create" , true] , "createUser") ;

//transactions routes
$router -> map('GET' , "/transactions" , [TransactionController::class , "index" , true] , "transactions");
$router -> map('GET' , "/transactions/create" , [TransactionController::class , "create" , true] , "createTransaction");

//! POST Routes

//auth post routes
$router -> map("POST" , "/login" , [AuthController::class , "login" , true] , "login") ;
$router -> map("POST" , "/register" , [AuthController::class , "register" , true] , "register") ;

//transactions
$router -> map("POST" , "/transactions/create" , [TransactionController::class , "store"  , true ] , "createTransactions") ;

//users
$router -> map("POST" , "/users/create" , [UserController::class , "store" , true] , "storeUser") ;
