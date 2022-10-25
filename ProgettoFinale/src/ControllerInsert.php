<?php
declare(strict_types=1);
namespace App;

use Utility\CollegamentoDB;
use Utility\InsertReperto;
use Utility\ImgOperation;
use League\Plates\Engine;
use Monolog\Logger;             
use Monolog\Handler\StreamHandler;
include 'init.php';
require '../vendor/autoload.php';

session_start();


    $connessione= new CollegamentoDB($dbms,$userDB,$passDB);
    $conn=$connessione->createConnection();
      if($conn===false) {
        echo "Impossibile contattare il server contattare l'amministratore";
        exit();
      }
    $categoria= $_POST['categoria'];

   $insert= new InsertReperto($conn);
   $img= new ImgOperation($directoryImmagini);
   $log = new Logger('utente');
   $log->pushHandler(new StreamHandler('../log/administrator.log',Logger::INFO));
   $log->pushHandler(new StreamHandler('../log/administrator.log',Logger::WARNING));
   $response= new Engine("../templates/templateHome");
   $arrayParametri= array_slice($_POST,1);

if(isset($_SESSION['user'])){
   
        $esitoInsert=$insert->insertNewReperto($categoria,$arrayParametri);
        if($esitoInsert===true)
          $log->info("Utente: ".$_SESSION['user']." Inserito nuovo reperto con identificativo ".$_POST['Identificativo']);
            else{
              $log->warning("Utente: ".$_SESSION['user']." Inserimento reperto fallito");
            }
 
    if(!empty($_FILES['immagini']['size']) && $esitoInsert===true)        // GESTIONE IMMAGINI
    {
        $immagine= $_FILES;
        $idCatalogo=$_POST['Identificativo'];
      
        $nomeImmagine=$img->createImageName($idCatalogo);
        $esitoImmagine=$img->insert($immagine,$nomeImmagine);
          if($esitoImmagine===true){
            $log->info("Utente: ".$_SESSION['user']." caricata immagine con identificativo ".$_POST['Identificativo']);
          }
            else{             
              $log->warning("Utente: ".$_SESSION['user'].$esitoImmagine);
            } 
    }
      else{
        $esitoImmagine=true;
      }   
    //gestione response
        if($esitoInsert===true || $esitoImmagine===true){
            $messaggio="Operazioni di inserimento andate a buon fine";
            }
        if($esitoImmagine!==true){
          $messaggio= "Errore nell'inserimento dell'immagine andare alla sezione di modifica e riprovare";
        }
        if($esitoInsert!==true){
          $messaggio= "Errore durante inserimento nulla è stato inserito Riprovare ";
        }
        echo $response->render('response',['indicazione'=>$messaggio]);

}
