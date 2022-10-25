<?php
declare(strict_types=1);
namespace App;
require '../vendor/autoload.php';

use Utility\CollegamentoDB;
use Utility\CommonQuery;
use Utility\ImgOperation;
use Monolog\Logger;             
use Monolog\Handler\StreamHandler;
use League\Plates\Engine;
include 'init.php';

session_start();
$connessione=  new CollegamentoDB($dbms,$userDB,$passDB);
$conn=$connessione->createConnection();
    if($conn===false) {
        echo "Impossibile contattare il server contattare l'amministratore";
        exit();
    }
$querycomuni= new CommonQuery($conn);
$imgOperation = new ImgOperation($directoryImmagini);
$log = new Logger('utente');
$log->pushHandler(new StreamHandler('../log/administrator.log',Logger::INFO));
$log->pushHandler(new StreamHandler('../log/administrator.log',Logger::WARNING));

$response= new Engine("../templates/templateHome");

if(!empty($_GET['elimina'])){

    $id= $_GET['elimina'];
    $tabella=$_GET['cat'];

    $esitoDelete=$querycomuni->deleteReperto($id,$tabella);
        if($esitoDelete===true)
            $log->info("Utente ". $_SESSION['user'] ." ha eliminato il reperto: ".$id);
  
}
else{
    $esitoDelete=true;
}
if(!empty($_GET['immagine'])){
    $immagine= $_GET['immagine'];
    $esitoImg=$imgOperation->delete($immagine);
    if($esitoImg!==true){
        $log->warning("Utente ". $_SESSION['user'].$esitoImg);
    }
    $log->info("Utente ". $_SESSION['user'] ." ha eliminato l'immagine: ".$immagine);
}


