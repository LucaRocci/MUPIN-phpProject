<?php
declare(strict_types=1);
namespace App;
use Utility\CollegamentoDB;
use Utility\CommonQuery;
use Utility\UpdateReperto;
use Utility\ImgOperation;
use Monolog\Logger;             
use Monolog\Handler\StreamHandler;
use League\Plates\Engine;
include 'init.php';
require '../vendor/autoload.php';


    session_start();
    $connessione= new CollegamentoDB($dbms,$userDB,$passDB);
    $conn=$connessione->createConnection();
      if($conn===false) {
        echo "Impossibile contattare il server contattare l'amministratore";
        exit();
      }
        $querycomuni= new CommonQuery($conn);
        $log = new Logger('utente');
        $log->pushHandler(new StreamHandler('../log/administrator.log',Logger::INFO));
        $log->pushHandler(new StreamHandler('../log/administrator.log',Logger::WARNING));
        $response= new Engine("../templates/templateHome");
    
  if(isset($_SESSION['user'])){
 
    $id= $_POST['Identificativo'];
    $tabella= $_POST['tabelle'];
    $parametri= array_slice($_POST,2);
    $update= new UpdateReperto($conn);
    $img= new ImgOperation($directoryImmagini);
    
   
    $resul=$update->update($parametri,$tabella,$id);
    if($resul===true){
      $log->info("Utente: ".$_SESSION['user']." ha modificato il reperto con id ".$_POST['Identificativo']);
    }
    else{
      $log->warning("Utente: ".$_SESSION['user']."operazione di modifica fallita");
    }

    // GESTIONE DELLE IMMAGINI  
    if(!empty($_FILES['immagini']['size']) && $resul===true)
    {
        $immagine= $_FILES;
        $idCatalogo=$_POST['Identificativo'];
        $nomeImmagine=$img->createImageName($idCatalogo);
        $esito=$img->insert($immagine,$nomeImmagine);
         if($esito===true){
           $log->info("Utente: ".$_SESSION['user']." caricata immagine con identificativo ".$_POST['Identificativo']);
          }
          else{
            $log->warning("Utente: ".$_SESSION['user'].$esito);
          } 
    }
        else{
          $esito=true;
        }
    // GESTIONE RESPONSE
    if($resul===true || $esito===true){
      $messaggio="Operazioni di modifica andate a buon fine";
      }
    if($esito!==true){
      $messaggio= "Errore nell'inserimento dell'immagine Riprovare";
    }
    if($resul!==true){
      $messaggio= "Errore durante la modifica nulla è stato modificato Riprovare ";
    }
    echo $response->render('response',['indicazione'=>$messaggio]); 
}