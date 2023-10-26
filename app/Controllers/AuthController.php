<?php

namespace App\Controllers;

use App\Core\Alert;
use App\Core\View;
use App\Helpers\Validation;
use App\Models\User;

use function PHPSTORM_META\type;

class AuthController
{
    /**
     * Get the login page
     *
     * @return void
     */
    public function loginPage()
    {
        return View::make("auth/login", []);
    }

    /**
     * Get register page
     *
     * @return void
     */
    public function registerPage()
    {
        return View::make("auth/register", []);
    }

    /**
     * Log in
     *
     * @return void
     */
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $testValidation = Validation::isValideConnexion($email, $password);

            // user infos are corrects
            if ($testValidation !== false) {

                //set status to true
                $userId = $testValidation;
                (new User)->update($userId , ['status' => true]) ;

                //create auth session
                $_SESSION['auth'] = $userId;

                //make alert
                Alert::make("You are logged succesfuly !", "success");

                //redirecte user to home page
                header("Location: /");
                die;
            }


            // user infos are incorrect
            Alert::make("Email or Password incorect !", "error");
            header("Location: /login");
            die;
        }
    }


    /**
     * Register : create
     *
     * @return void
     */
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $_POST;
            $email = $data['email'];
            $username = $data['username'];
            $role = $data['role'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user  = new User();

            //Validate data
            if (!empty($errors = Validation::isValidRegistrationData($_POST))) {
                Alert::make($errors, "error");
                $_SESSION['invalideData'] = $data;
                header("Location: /register");
                die;
            } else {
                //create user
                if ($user->create(['username' => $username, "email" => $email, "password" => $password, "role" => $role])) {
                    Alert::make("User added successfully.", "success");
                    header("Location: /login");
                } else {
                    $_SESSION['invalideData'] = $data;
                    Alert::make("User not added. Please check the input and try again.", "error");
                    header("Location: /register");
                }
            }
        }
    }


    /**
     * get the current user  connected
     *
     * @return User|boolean
     */
    public static function getCurrentUser(): User|bool
    {
        if (isset($_SESSION['auth'])) {
            return (new User)->where("id_user", ($_SESSION['auth']));
        }

        return false;
    }


    /**
     * Lougout 
     *
     * @return void
     */
    public function logout(): void
    {

        //TODO  User::update(["status" => false], self::getCurrentUser()->getId());
        if (isset($_SESSION['auth'])) {
            $userId = (int) $_SESSION['auth'];

            //set status to false (0)
            (new User)->update($userId , ['status' => 0]) ;

            //delete the auth session
            unset($_SESSION['auth']);

            //make logout alert
            Alert::make("You are logout !", "info");
        }

        //redirect user to login page
        header("Location: /login");
    }
}
