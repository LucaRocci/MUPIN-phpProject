<?php 
declare(strict_types=1);
 namespace Utility;
use PDO;
use PDOException;

 class UpdateReperto{

function __construct(PDO $conn)
{
    $this->conn= $conn;
}

    function update(array $parametri, string $tabella,string $id){
        $query= "UPDATE $tabella SET ";
        foreach($parametri as $chiave=>$valore){
           $query.=$chiave." = ? , ";
        }
         $query=rtrim($query,", "); 
         $query.= " WHERE Identificativo= ?";
         $size=count($parametri);
         $a=1;
         $sth=$this->conn->prepare($query);
         while($a<=$size){
            foreach($parametri as $key=>$value){
                $sth->bindValue($a,$value,PDO::PARAM_STR);
                $a++;
            } 
         } 
         $sth->bindValue($size+1,$id,PDO::PARAM_STR);
            try{  

            $sth->execute();
           
                return true;
            }catch(PDOException $e){
                //return $e->getMessage();
                return false;
           
         }

    }

 }