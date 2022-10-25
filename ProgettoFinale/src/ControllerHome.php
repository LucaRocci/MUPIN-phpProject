<?php
declare(strict_types=1);
namespace App;

use League\Plates\Engine;
use Utility\CollegamentoDB;
use Utility\CommonQuery;
require '../vendor/autoload.php';
include 'init.php';


session_start(); 
if(!isset($_SESSION['user'])){
      header('Location: index.php');
}

  if(isset($_SESSION['user'])){
       

        $username= $_SESSION['user'];
        $connDB =new CollegamentoDB($dbms,$userDB,$passDB);
        $conndb=$connDB->createConnection();
        if($conndb===false) {
            echo "Impossibile contattare il server contattare l'amministratore";
            exit();
        }
        $categorie= new CommonQuery($conndb);
        $cat=$categorie->findCategories();

        $templateHome = new Engine('../templates/templateHome');
        echo $templateHome->render('homeAdministrator',[
        'nome' => $username,
        'categorie'=>$cat]);  
  }