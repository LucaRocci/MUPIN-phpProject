<?php
 declare(strict_types=1);
 namespace App;         
    use Monolog\Logger;             
    use Monolog\Handler\StreamHandler;
    require '../vendor/autoload.php';
    include 'init.php';

    
    $logout = new Logger('utente');

    $logout->pushHandler(new StreamHandler('../log/administrator.log',Logger::INFO));
    $log=$_GET["logout"]?? '0';
    session_start();
    if($log !=='0'){
        $logout->info("Utente scollegato ".$_SESSION['user']);
        session_unset();
        session_destroy();
        header("location: index.php");
    }
