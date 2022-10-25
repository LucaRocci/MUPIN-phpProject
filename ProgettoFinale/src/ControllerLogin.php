<?php
declare(strict_types=1);

namespace App;

use League\Plates\Engine;
use Utility\CollegamentoDB;
use Utility\ControlloUtente;
use Monolog\Logger;             
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

ini_set('display_errors' ,'0');
ini_set('error_log', '../log/error.log');

$dbms= 'mysql:dbname=login;host=localhost:3306';  
$userDB='root';
$passDB='';
$directoryImmagini="../Immagini";


    $messaggio="Inserisci username e password";
    $templateform = new Engine('../templates');

    if(empty($_POST)){
    echo $templateform->render('formLogin',['messaggio' => $messaggio]);
    }
    
$connessione = new CollegamentoDB($dbms,$userDB,$passDB);

$log = new Logger('utente');
$log->pushHandler(new StreamHandler('../log/administrator.log', Logger::WARNING));
$log->pushHandler(new StreamHandler('../log/administrator.log',Logger::INFO));

$username=$_POST["us"]?? '0';
$password=$_POST["psw"]?? '0';


if($username!=='0' && $password!=='0')    // controllo del login 
{
  $conn=$connessione->createConnection();
  if($conn===false) {
    echo "Impossibile contattare il server contattare l'amministratore";
    exit();
    }
    $verifica = new ControlloUtente($conn);
    $a=$verifica->verify($username,$password);
 
    if($a===true){

      header('Location: ControllerHome.php');  
      session_start(); 
      $log->info($username." collegato");
      $_SESSION['user']=$username;
      exit();
    }

    else if($a===false){
        $messaggio="Login Fallito!";
        $log->warning($messaggio);
        echo $templateform->render('formLogin',['messaggio' => $messaggio]);
        exit();
    }
}
