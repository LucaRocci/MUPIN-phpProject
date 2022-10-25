<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Modifica del reperto <?= $reperto?></title>
</head>
<body>
<form action="../../src/ControllerUpdate.php" method="post" enctype="multipart/form-data">
  
  <input type="hidden" name="tabelle" value=<?=$cat?>>
  <input type="hidden" name="Identificativo" value=<?=$id?>>
      <?php 
          foreach($daModificare as $key=>$value){
            if(in_array($key,$notNull)){
              $req='required';
            }
            else{
              $req='';
            }
            $this->insert('tableDataUpdate',['var'=>$key, 'oldValue'=>$value,'null'=>$req]);
          }
          ?>

  <div class="mb-3">
      <h4>Aggiunta Immagini</h4>
      <label for="exampleFormControlFile1">Carica Qui le tue immagini <strong> [Formato .jpg]</strong></label>
      <input type="file" class="form-control" name="immagini" id="formImmagini">
  </div>

 
  <button type="submit" class="btn btn-danger">Invia Modifiche</button>
  <a href="../../src/ControllerHome.php"  role="button" class="btn btn-warning">Annulla</a>

    </form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>