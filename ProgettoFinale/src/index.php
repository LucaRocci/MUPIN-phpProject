<?php
declare(strict_types=1);
namespace App;
require '../vendor/autoload.php';
use Utility\CollegamentoDB;
use Utility\CommonQuery;
use League\Plates\Engine;

include 'init.php';

 $layoutHome= new Engine("../templates/templateHome");

 $connessione= new CollegamentoDB($dbms,$userDB,$passDB);

 $conn=$connessione->createConnection();
 if($conn===false) {
    echo "Impossibile contattare il server contattare l'amministratore";
    exit();
 }
  $querycomuni= new CommonQuery($conn);

 $categorie=$querycomuni->findCategories(); 

 $indicazione="Inserisci qualcosa per iniziare la ricerca";

 echo $layoutHome->render('homePage',[     
    'categorie'=>$categorie, 
   'indicazione'=>$indicazione
 ]
);