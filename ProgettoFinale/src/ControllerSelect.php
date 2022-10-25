<?php
    declare(strict_types=1);
    namespace App;

    use Utility\CollegamentoDB;
    use League\Plates\Engine;
    use Utility\SearchData;
    use Utility\CommonQuery;
    use Utility\ImgOperation;
    require '../vendor/autoload.php';
    include 'init.php';

$layoutSelect= new Engine("../templates/templateHome");
$renderImmagini = new Engine("../templates/templatesImmagini");
$connessione= new CollegamentoDB($dbms,$userDB,$passDB);
$conn=$connessione->createConnection();
  if($conn===false) {
    echo "Impossibile contattare il server contattare l'amministratore";
    exit();
  }

session_start();

if(!empty($_GET['categoria']) && !empty($_GET['parametri'])){

  $ricerca =new SearchData($conn,$directoryImmagini);
  $common= new  CommonQuery($conn);
  $tabelle=$common->findCategories();

  if(in_array($_GET['categoria'],$tabelle)){     // -> controllo per verificare che la tabella esista
    $filtro= $_GET['categoria'];
  }
  else{
    echo $layoutSelect->render('response',['indicazione'=>'errore nella ricerca']);
    http_response_code(404);
    exit();
  }
  $parametri= $_GET['parametri'];
  $img= new ImgOperation($directoryImmagini);


    if($filtro==='All')                  // -> al momento non implementato
    {
      $risultato=$ricerca->findResultAllTable($parametri,$tabelle);
      echo $layoutSelect->render('response',['indicazione'=>'Funzionalità al momento non implementata']);
     // var_dump($risultato);
    }
    if($filtro!=='All'){
      $risultato=$ricerca->findResultOneTable($filtro,$parametri); 
      if(empty($risultato)){
        $messaggio= "Spiacente,la ricerca non ha prodotto risultati,Riprova";
        echo $layoutSelect->render('response',['indicazione'=>$messaggio]);
        exit();
      }
        if(!empty($risultato)){
          $identificativi= array_column($risultato,'Identificativo');
          $arrayImmagini[]=$img->estract($identificativi);
        } 

            if(!isset($_SESSION['user'])){                                       //pagina semplice 
              echo $layoutSelect->render('TableResult',['result'=>$risultato]) ;
              if($arrayImmagini[0]!==false){
                $directoryImmagini=$directoryImmagini."/";
                echo $renderImmagini->render('RenderImmagini',['immagine'=>$arrayImmagini,'directory'=>$directoryImmagini,'amministratore'=>false]);         
              }
        
            }
            else{                                       // pagina amministratore
              echo $layoutSelect->render('TableResultAdministrator',['result'=>$risultato, 'tabella'=>$filtro]) ;
              if($arrayImmagini[0]!==false){
                $directoryImmagini=$directoryImmagini."/";
                echo $renderImmagini->render('RenderImmagini',['immagine'=>$arrayImmagini,'directory'=>$directoryImmagini, 'amministratore'=>true]);         
              }
            }         
  }  
}

