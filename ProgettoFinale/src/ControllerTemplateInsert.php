<?php
namespace App;
require '../vendor/autoload.php';
use League\Plates\Engine;
use Utility\CollegamentoDB;
use Utility\CommonQuery;
include 'init.php';

if(!empty($_POST)){
    $templateInsert= new Engine('../templates/templatesInsert');

    $conn= new CollegamentoDB($dbms,$userDB,$passDB);
    $pdo=$conn->createConnection();
    if($pdo===false) {
      echo "Impossibile contattare il server contattare l'amministratore";
      exit();
    }
    $commonm= new CommonQuery($pdo);
    $tabelle= $commonm->findCategories();
    $tipo= $_POST['tipo'];

      $colonne=$commonm->findColunmName($tipo);
      $colonneObbligatorie= $commonm->findNotNullbleColumn($tipo);
      $colonne= array_slice($colonne,1);
      echo $templateInsert->render('InsertLayout',[ 'notNull'=>$colonneObbligatorie, 'colonneTabella'=>$colonne, 'tipoReperto'=>$tipo]);
      exit();
}