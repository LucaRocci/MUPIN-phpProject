<?php
declare(strict_types=1);
namespace Utility;
use PDO;
use PDOException;

class InsertReperto{

    function __construct(PDO $conn)
    {
        $this->conn= $conn;
    }


    function insertNewReperto(string $categoria,array $arrayParametri)
    {
        $query= "INSERT INTO $categoria ( ";
       
        $arrayPieno=[];
        foreach($arrayParametri as $key=>$value) 
        {
           if(!empty($value)){
              $arrayPieno[$key]=$value;
              $query.=$key.", ";
           }
        }
        $query=rtrim($query,", ");  //tolgo l'ultima virgola
        $query.=") VALUES (";
            foreach($arrayPieno as $key=>$value){
                $query.="?,";
            }
           $query=rtrim($query,",");
           $query.=")";      // fine creazione della query   
     
           $sth=$this->conn->prepare($query);    // fase di binding dei parametri 
           $size=count($arrayPieno);
           $a=1;
           while($a<=$size){
            foreach($arrayPieno as $key=>$value){
            $sth->bindValue($a,$value,PDO::PARAM_STR);
            $a++;
        } 
    }
        try{
         $sth->execute();
         return true;
        }
        catch(PDOException $ex){
           return false;
        }
        
    }
}


