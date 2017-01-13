<?php

class DB {
    public static $instance;
    public $bdd;

    private function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8','root','');
    }

    public static function getInstance()
    {
        if(empty(self::$instance)){
            self::$instance = new DB();
        }
        return self::$instance;
    }
}

//$db = new DB();
?>
	