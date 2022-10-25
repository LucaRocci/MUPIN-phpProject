<?php
declare(strict_types=1);
namespace Utility;
use PDO;
use PDOException;


class CommonQuery{

    function __construct(PDO $conn)
    {
        $this->conn=$conn;
    }

    function findCategories():?array  
    {
        try{
            $query= "show TABLES ";
            $sth=$this->conn->prepare($query);
            $sth->execute();
            $array =[];
            $result= $sth->fetchAll(PDO::FETCH_ASSOC);
        
                foreach($result as $key=>$value){
                    $array[]= $value['Tables_in_museoinformaticatest'];
                }
            return $array;
        }
        catch(PDOException $ex){
            return $ex->getMessage();
            exit();
        }
    }

    function findColunmName(string $filtro):?array
    {
        try{
            $query= " SELECT `COLUMN_NAME` 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA`='museoinformaticatest' 
                AND `TABLE_NAME`=:categoria;";

            $sth=$this->conn->prepare($query);
            $sth->bindValue(':categoria',$filtro,PDO::PARAM_STR);
            try{
                $sth->execute();
            }catch(PDOException $ex){
                return $ex->getMessage();
            }
            $array =[];
            $result= $sth->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $key=>$value){
                    $array[]= $value['COLUMN_NAME'];
                }
            return $array;
        }
        catch(PDOException $ex){
            return $ex->getMessage();
            exit();
        }
    }

    function buildQuerySelect(array $colonne, string $parametri):string
    {
        $query="";
        $size= count($colonne);
        $parametri= "'%".$parametri."%'";      //sostituisci con ?
        for($a=0; $a<=$size-2;$a++){
                $condizione= $colonne[$a]." LIKE ".$parametri." OR ";    
                $query.=$condizione;
        }
        $query.=$colonne[$size-1]." LIKE ".$parametri;     
        return $query;
    }

        function getRepertoById(string $identificativo, string $tabella) :array
        {
            $query= "SELECT * FROM $tabella WHERE `Identificativo`= :ide";
            $sth=$this->conn->prepare($query);
            $sth->bindValue(':ide',$identificativo,PDO::PARAM_STR);
            try{
                $sth->execute();
            }catch(PDOException $es){
                return $es->getMessage();
            }
            $result= $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


       /* function getRepertoByIdCatalogo(string $id, string $tabella) :array
        {
            $query= "SELECT * FROM $tabella WHERE `Id_catalogo`= :ide";
            $sth=$this->conn->prepare($query);
            $sth->bindValue(':ide',$id,PDO::PARAM_STR);
            $sth->execute();
            $result= $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        }*/

        function deleteReperto(string $id,string $tabella)
        {
            $query= "DELETE FROM $tabella WHERE `Identificativo`= :id";
            $sth=$this->conn->prepare($query);
            $sth->bindValue(':id',$id,PDO::PARAM_STR);
            try{
                $sth->execute();
                return true;
            }catch(PDOException $ex){
                return false;
            }
        }

        function findNotNullbleColumn(string $tabella):array{
            $query= "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = :tab and is_nullable = 'NO' ORDER BY `columns`.`COLUMN_NAME` ASC";
            $sth=$this->conn->prepare($query);
            $sth->bindValue(':tab',$tabella,PDO::PARAM_STR);
            $sth->execute();
            $result= $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $key=>$value){
                $array[]= $value['COLUMN_NAME'];
            }
        return $array;

        }

}