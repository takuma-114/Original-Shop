<?php

class Database{

    private $server_name = "localhost";
    private $user_name = "root";
    private $password = "root"; #for MAMP users password = root
    private $db_name = "final_portfolio";
    protected $conn;

    public function __construct()
    {
        $this -> conn = new mysqli($this -> server_name , $this -> user_name, $this ->password, $this -> db_name);

        if($this -> conn -> connect_error){
            die("Unable to connect to the  Database ".$this->conn -> connect_error);
        }
        
    }
}
?>