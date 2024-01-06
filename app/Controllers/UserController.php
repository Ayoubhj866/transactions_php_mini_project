<?php

namespace App\Controllers;

use App\Core\Alert;
use App\Core\View;
use App\Helpers\Validation;
use App\Models\User;
use Dotenv\Validator;

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
            Alert::make("Only admins can visite this page", "info");
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
            if ($user = (new User)->where("id_user", (int)$id)) {
                return View::make("users/edit", $user);
            }
        }
        Alert::make("User not found !", "error");
        header("/users");
        die;
    }

    public function update()
    {
        // if($_SERVER['REQUIST_METHOD'] === "POST") {
        //     \dump($_POST) ;
        // }

        
    }

    /**
     * Delete User 
     *
     * @param array $params
     * @return void
     */
    public function delete(array $params)
    {
        //bool => true if user deleted false if else
        $delet = (new User)->delete((int) \base64_decode($params['id']));

        if ($delet) {
            Alert::make("User deleted succesfully !", "success");
            \header("Location: /users") ;
            die ;
        }
        Alert::make("We can't delete user, try again !", "error");
        \header("Location: /users") ;
        die ;
    }

    /**
     * Get create new user page
     *
     * @return void
     */
    public function create() {

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

        //return create page
        return View::make("users/create") ;
    }

    public function store() {

        if($_SERVER['REQUEST_METHOD'] === "POST") 
        {
            if(!empty($errors = Validation::isValidRegistrationData($_POST))) 
            {
                Alert::make($errors , "error") ;
                $_SESSION['invalideData'] = $_POST ;
                header("Location: /users/create") ;
                die ;
            }
            $data = ["username" => $_POST['username'] , "role" => $_POST['role'] , "email" => $_POST['email'] , "password" => password_hash($_POST['password'] , \PASSWORD_DEFAULT)] ;
            if((new User)->create($data)) 
            {
                Alert::make("User has created successfuly !" , "success") ;
                header("Location: /users") ;
                die ;
            }
            Alert::make("User not created try again !" , "danger") ;
            \header("Location: /users") ;
            die ;
        }
    }

    
}

