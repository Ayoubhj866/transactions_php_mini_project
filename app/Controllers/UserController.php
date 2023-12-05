<?php

namespace App\Controllers;

use App\Core\Alert;
use App\Core\View;
use App\Models\User;

class UserController
{
    /**
     * Users list
     *
     * @return View
     */
    public function index(): View
    {
        //get all users from database
        $users = (new User())->readAll();

        //user connected
        $user = AuthController::getCurrentUser();

        if ($user === false) {
            Alert::make("You have to log in !", "error");
            header("Location: /login");
            die;
        } else if ($user->getRole() !== 'admin') {
            Alert::make("Only admins can visite this page", "error");
            header("Location: /");
            die;
        }

        return View::make("users/index", $users);
    }

    /**
     * Update user
     *
     * @param array $params
     * @return void
     */
    public function edit(array $params)
    {
        if ($id = \base64_decode($params["id"])) {
            if($user = (new User) -> where("id_user" , (int)$id)) {
                return View::make("users/edit" , $user) ;
            }
        }
        Alert::make("User not found !" , "error") ;
        header("/users") ;
        die ;
    }
}
