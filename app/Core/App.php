<?php

namespace App\Core;

use App\Controllers\AuthController;

class App
{
    private static $instance;


    /**
     * get instance of RouterResolve class
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Resolve router request
     *
     * @param array|boolean $match
     * @return void
     */
    public static function  getRoute(array|bool $match)
    {
        $withLayaut = false;

        

        if ($match) {

            //SAVE THE CURRENT ROUTE (WILL BE USEFUL IF THE NEXT ROUTE NOTE FOUND or USER DONT HAS THE AUTORISATION TO VISIT PAGE WE WILL USE THIS TO GO BACK)
            $_SESSION['back'] = $_SERVER["REQUEST_URI"];

            list($class, $methode, $withLayaut) = $match['target'];
            if (class_exists($class)) {
                if (!method_exists($class, $methode)) {
                    echo "methode not existe";
                    die;
                }

                $class = new $class;

                ob_start();
                echo  $class->$methode($match['params']);
                $pageContent = ob_get_clean();
            } else {
                echo "class not exist";
                die;
            }
        } else {
            //if page not found
            ob_start();
            require  VIEWS_PATH . DIRECTORY_SEPARATOR . "errors" . DIRECTORY_SEPARATOR . "404.php";
            $pageContent = ob_get_clean();
        }

        //! Current user (the user is connected currently )
        $currentUser = AuthController::getCurrentUser();

        //set the view in layaut
        if ($withLayaut !== false) {
            require VIEWS_PATH . "layaut.php";
            die;
        }

        //the content without layaut
        echo $pageContent;
    }


    /**
     * Run Router request and get the view
     *
     * @param array|boolean $match
     * @return void
     */
    public static function run(array|bool $match)
    {
        return self::getInstance()->getRoute($match);
    }
}
