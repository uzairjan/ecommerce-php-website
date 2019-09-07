<?php

namespace Client;

class DatabaseController
{
    public $host ='localhost';
    public $user ='root';
    public $password ='';
    public $database = 'ecomm';
    public $connection;

    function __construct(){
        
        $this->connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if(!$this->connection){
            die("unable to connect");

        }
    }

    public function help(){
        echo "i am help";
    }
}
?>