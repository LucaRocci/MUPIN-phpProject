<?php
namespace Utility;
use PDO;
use PDOException;
class CollegamentoDB{
    
    protected $dsn;
    protected $userDB;
    protected $passDB;

    function __construct($dsn,$userDB,$passDB)
    {
        $this->dsn=$dsn;
        $this->userDB=$userDB;
        $this->passDB=$passDB;
    }

    function createConnection(): PDO | bool
    { 
        try{
            $conn= new PDO($this->dsn,$this->userDB,$this->passDB);
        }catch(PDOException $ex){
            return false;
            http_response_code(500);
            exit(1);
        }
         return $conn;
        }




}