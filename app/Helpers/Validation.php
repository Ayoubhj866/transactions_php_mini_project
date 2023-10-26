<?php

namespace App\Helpers;

use App\Models\User;

class Validation
{

    /**
     * Verify the connexion informations
     *
     * @param string $email
     * @param string $password
     * @return int|bool
     */
    public static function isValideConnexion(string $email, string $password): int|bool
    {
        $user = (new User())->where('email', $email);
        if ($user !== false) {
            if (password_verify($password, $user->getPassword())) {
                return (int) $user->getId();
            }
        }
        return false;
    }


    //registration validation
    public static function isValidRegistrationData(array $data): array
    {
        $users = (new User)->readAll();

        $errors = [];

        if ($data) {
            $email = $data['email'] ?? null;
            $username = $data['username']  ?? null;
            $password = $data['password']  ?? null;
            $cPassword = $data['cPassword']  ?? null;

            //email validation
            if (is_string(self::isValideEmail($users, $email))) {
                $errors[] =  self::isValideEmail($users, $email);
            };

            //username validation
            if (is_string(self::isValideUsername($users, $username))) {
                $errors[] =  self::isValideUsername($users, $username);
            };

            //username validation
            if (is_string(self::isValideConfirmPassword($password, $cPassword))) {
                $errors[] =  self::isValideConfirmPassword($password, $cPassword);
            };
        }

        return $errors;
    }


    /**
     * Email Validation
     *
     * @param string $email
     * @return mixed
     */
    public static function isValideEmail(array $users, string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //check if this email is exist
            if (self::existEmail($users, $email)) {
                return "The Email is already in use or already exists.!";
            }
            return true;
        }
        return "Invalid Email !";
    }


    /**
     * Check if email is exist in database
     *
     * @param array $users
     * @param string  $email
     * @return boolean (return true if email exist)
     */
    public static function existEmail(array $users, string $email): bool
    {
        foreach ($users as $user) {
            if ($user->getEmail() === $email) {
                return true;
            }
        }
        return false;
    }

    /**
     * Esername validation
     *
     * @param array $users
     * @param string $username
     * @return boolean
     */
    public static function isValideUsername(array $users, string $username)
    {
        if (strlen($username) >= 4) {
            //check if this email is exist
            if (count($users) > 0) {
                foreach ($users as $user) {
                    if (strtolower($user->getUsername()) === strtolower($username)) {
                        return "The username is already in use or already exists !";
                    }
                }
            }
            return true;
        }
        return "Please ensure that your username is at least 4 characters long !";
    }

    /**
     * Password Validation
     *
     * @param string $password
     * @return boolean
     */
    public static function isValidePassword(string $password): bool
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Confirm password validation
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    public static function isValideConfirmPassword(string $password, string $cPassword)
    {
        if (self::isValidePassword($password)) {
            if ($password === $cPassword) {
                return true;
            }
            return "The password and password confirmation do not match !";
        }
        return "Please ensure that your password is at least 6 characters long ";
    }
}
