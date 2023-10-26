<?php 
namespace App\Core ;

class Helper 
{
    public static function redirect(string $view, $data = [])
    {
        return View::make($view, $data) ;
    }
}