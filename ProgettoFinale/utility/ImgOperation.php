<?php 
declare(strict_types=1);
 namespace Utility;

use Exception;

class ImgOperation{

    function __construct(string $directory)
    {
        $this->directory=$directory;
    }

    function estract(array $daCercare) :  array  | bool
    {
        $arrayDaCercare=[];
            foreach($daCercare as $key=>$name){
            $arrayDaCercare[]= $this->directory."/".$name;
    }
            $images = glob($this->directory . "/*.jpg");
            $arrayImmagini=[];

        if (count($images) > 0) {
            foreach($images as $img)
            {
                foreach($arrayDaCercare as $key=>$daCercare){
                if(str_starts_with($img,$daCercare))  {
                    array_push($arrayImmagini,$img);
                } 
            }
              }
              if(empty($arrayImmagini)){
                return false;
            }
              return $arrayImmagini;
        }
        else{  // caso di directory vouta DA gestire
            return false;
        }
    }
   
    function insert(array $immagine,string $nomeImmagine) :string |bool 
    {
      
        if (!isset($immagine['immagini']['error'])) {
            $ritorno= 'Non è stato inviato nessun file' ;
            return $ritorno;
            exit();
            }
        if ($immagine['immagini']['error'] != UPLOAD_ERR_OK) {
            $ritorno=  'Il file inviato non è valido' ;
            return $ritorno;
            exit();
            }
        if($immagine['immagini']['size']===0){         
            $ritorno=  'Invio non valido,file vuoto' ;
            return $ritorno;
            exit();
        }

        if($immagine['immagini']['type'] !="image/jpeg"){             // controllo sul tipo di file 
            $ritorno= 'il file non ha un esetensione valida';
            return $ritorno;
            exit();
        }
    
        $directory = $this->directory."/". $nomeImmagine.".jpg"; 
        if (!move_uploaded_file ($immagine['immagini']['tmp_name'], $directory)) {  
            $ritorno='Errore durante la scrittura del file' ;
            return $ritorno;
            exit(); 
        }
        else{
            $ritorno=true;    
        }  
        return $ritorno;  
    }

    function createImageName(string $idCatalogo):string {       //TO DO:gestione Eventuale cartella vuota

        $daCercare = $this->directory."/".$idCatalogo;
            $images = glob($this->directory . "/*.jpg");
            $arrayImmagini=[];
                foreach($images as $num=>$img)
                {
                    if(str_starts_with($img,$daCercare)) {
                        array_push($arrayImmagini,$img);
                    }                      
                }  
    if(count($arrayImmagini)===0){
        $nomeImmagine=$idCatalogo."_01";
    }  
        else{
            $quante=count($arrayImmagini);
            if($quante<10)
                $nomeImmagine=$idCatalogo."_0".$quante+1;
            else
                $nomeImmagine=$idCatalogo."_".$quante+1;
        }  
    return $nomeImmagine;
    }

    function delete(string $daCercare):bool{
        try{
            $daCercare=$this->directory."/".$daCercare;
            unlink($daCercare);
        return true;
        }
        catch(Exception $e){
             $e->getMessage();
             return false; 
        }        
    }
}
