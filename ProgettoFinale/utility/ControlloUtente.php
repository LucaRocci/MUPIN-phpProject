<?php
declare(strict_types=1);
namespace Utility;
use PDO;
use PDOException;

class ControlloUtente {
        protected PDO $conn;
        protected string $username;
        protected string $password;

        function __construct(PDO $conn)
        {
            $this->conn=$conn;
        }

    function verify(string $userInserito, string $passInserito): bool         //dell'utente 
    {
        $query= "SELECT username, password FROM utenti WHERE username=:user ";
        
        $sth=$this->conn->prepare($query);
        $sth->bindValue(':user',$userInserito,PDO::PARAM_STR);
        try{
            $sth->execute();
        }catch(PDOException $ex){
            return $ex->getMessage();
        }
           
        $result = $sth->fetch(PDO::FETCH_OBJ);

        if($result===false)
         {
            return $a=false;
            exit();
         }
            $hash=$result->password; 
            if(password_verify($passInserito,$hash) && $result->username===$userInserito)
            {  
                return $a=true;
                exit();
            }
            else{
                return $a=false;
                exit();
            }  
    }
}