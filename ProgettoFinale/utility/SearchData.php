<?php
declare(strict_types=1);
namespace Utility;
use PDO;
use Utility\CommonQuery;
use Utility\ImgOperation;
require '../vendor/autoload.php';

class SearchData{

    function __construct(PDO $conn,string $directory)
    {
        $this->conn=$conn;
        $this->directory=$directory;
    }
    
    function findResultOneTable(string $filtro,string $parametri)  :?array
    {
          $comuni= new CommonQuery($this->conn);
          $colonne= $comuni->findColunmName($filtro);
          $colonne= array_slice($colonne,1);
         // $size=count($colonne);
          $completa=$comuni->buildQuerySelect($colonne,$parametri);
          $query = "SELECT * from $filtro WHERE ";
          $query.=$completa;
          $sth=$this->conn->prepare($query);
          $sth->execute();
          $result= $sth->fetchAll(PDO::FETCH_ASSOC);
          $size=count($result);
          for($a=0;$a<$size;$a++){                         // <- per rimuovere l'Id_catalogo
            $result[$a]=array_slice($result[$a],1);
          }
              return $result;
        }
        

        function findResultAllTable(string $parametri,array $categorie){    //rimozione id_catalogo, binding e eliminazione array vuoti

            $comuni= new CommonQuery($this->conn);
            
            $size= count($categorie);
            $result=[];
            for($a=0; $a<$size;$a++){
                $colonne= $comuni->findColunmName($categorie[$a]);
                $colonneRicerca=array_slice($colonne,1);
                $completa=$comuni->buildQuerySelect($colonneRicerca,$parametri);
                $query = "SELECT * from $categorie[$a] WHERE ";
                $query.=$completa;
                $sth=$this->conn->prepare($query);
                $sth->execute();
                $result[]= $sth->fetchAll(PDO::FETCH_ASSOC);
                $size=count($result);
               /* for($a=0;$a<$size;$a++){                         // <- per rimuovere l'Id_catalogo
                  $result[][$a]=array_slice($result[$a],1);
                }*/
              }

        return $result;

}
}
