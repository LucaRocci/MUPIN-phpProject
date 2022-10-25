<?php
    declare(strict_types=1);
    namespace App;

    use Utility\CollegamentoDB;
    use Utility\CommonQuery;
    use League\Plates\Engine;
    include 'init.php';

    require '../vendor/autoload.php';

   /* 'modifica' => string 'Comp989' (length=7)
    'cat' => string 'computer' (length=8)*/

session_start();
    if(!empty($_GET)){

        $connessione= new CollegamentoDB($dbms,$userDB,$passDB);
        $conn=$connessione->createConnection();
            if($conn===false) {
                echo "Impossibile contattare il server contattare l'amministratore";
                exit();
            }
        $querycomuni= new CommonQuery($conn);

        if(!empty($_GET['modifica'] && isset($_SESSION['user']))){
            $identificativo= $_GET['modifica'];
            $tabella= $_GET['cat'];

            $templateUpdate = new Engine("../templates/templateUpdate");
            $risultato=$querycomuni->getRepertoById($identificativo,$tabella);
            $colonneObbligatorie= $querycomuni->findNotNullbleColumn($tabella);
            $ide= $risultato['Identificativo'];

            $modificabili= array_slice($risultato,2);
            echo $templateUpdate->render('UpdateLayout',[ 'notNull'=>$colonneObbligatorie,'cat'=>$tabella,'id'=>$ide,
                'reperto'=>$identificativo, 'daModificare'=>$modificabili]);
        }
    
    }

