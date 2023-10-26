<?php 

namespace App\Controllers ;

use App\Core\Alert;
use App\Core\Database;
use App\Core\Helper;
use App\Core\View;
use PDO;

class HomeController
{
    /**
     * Get home page
     *
     * @return View
     */
    public function index() 
    {
        //user connected
        $user = AuthController::getCurrentUser();
        if($user === false)
        {
            Alert::make("You have to log in !" , "error") ;
            header("Location: /login") ;
            die ;
        }
        return View::make("home" , ["user" => $user ]) ;
    }
}