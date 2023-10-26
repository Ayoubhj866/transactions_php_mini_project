<?php 


namespace App\Core ;

use PDO;

class Database
{
    private static $instance ;
    private $connexion ;


    public function __construct()
    {
        $this -> connexion = new PDO($_ENV['MYSQL_DRIVER'] . ":host=". $_ENV['DB_HOST'] . "; dbname=". $_ENV['DB_NAME'] ."" , $_ENV['DB_USER'] , $_ENV['DB_PASS'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
        ]);
    }
    
    /**
     * return instance of self class (Database)
     *
     * @return self
     */
    public static function getInstance (): self
    {
        if(self::$instance === null)
        {
            self::$instance = new self() ;
        }

        return self::$instance ;
    }

    /**
     * return connexion
     *
     * @return PDO
     */
    public function getConnexion() : PDO 
    {
        try {
            return $this -> connexion ;
        } catch (\Throwable $th) {
            return $th -> getMessage() . " **** " .  $th -> getCode() . " ****  " . $th -> getLine();
        }
    }

    /**
     * return pdo object database connexion
     *
     * @return void
     */
    public static function connexion()
    {
        return self::getInstance()->getConnexion() ;
    }
}