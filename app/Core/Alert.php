<?php

namespace App\Core;

class Alert
{

    /**
     * Make alert with session
     *
     * @param mixed $message
     * @param string $alertType
     * @return void
     */
    public static function make(mixed $message, string $alertType = "warning")
    {
        return $_SESSION['alert'] = [
            "message"   => $message,
            "type"      => $alertType
        ];
    }


}
