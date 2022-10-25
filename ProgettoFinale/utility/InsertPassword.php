<?php
declare(strict_types=1);
namespace Utility;
use PDO;
use PDOException;
use Utility\CollegamentoDB;

    $dsn= 'mysql:dbname=login;host=localhost:3308';
    $userDB='root';
    $passDB='';

    $connessione= new CollegamentoDB($dsn,$userDB,$passDB);

    $conn=$connessione->createConnection();


    insert($conn,'luca.rocci@gmail.com','ciao');   // -> unica riga da cambiare per inserire nuovo utente

    function insert(PDO $conn,string $user,string $password) 
    {
    $encripted=password_hash($password,PASSWORD_BCRYPT);
        try{
    $insert= "INSERT INTO utenti(username,password) VALUES (:user,:pass) ";    
    $statement= $conn->prepare($insert);
    $statement->bindValue(':user',$user,PDO::PARAM_STR);
    $statement->bindValue(':pass',$encripted,PDO::PARAM_STR);
    $statement->execute();
   
        }
        catch(PDOException $ex){
            return $ex->getMessage();
            exit();
        }

    }



