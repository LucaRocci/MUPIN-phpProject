<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      a {
        float: right;
        margin-right: 5%;
      }
      </style>
    <title>Inserisci nuovo <?=$tipoReperto?></title>
</head>

<body>
<form action="../src/ControllerInsert.php" method="post" enctype="multipart/form-data">
  <input type="hidden"  value=<?=$tipoReperto?>  name="categoria">

  <h3> Inserimento nuovo reperto: <?=$tipoReperto?>  </h3>
  <table class="table table-striped">
    <thead>
        <tr>
        <?php foreach($colonneTabella as $key=>$value){
          echo "<th scope='col'> $value</th>";
        }?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach($colonneTabella as $key=>$value){
            if(in_array($value,$notNull)){
              $req='required';
            }
            else{
              $req='';
            }
              $this->insert('tableData',['var'=>$value,'null'=>$req]);
            }?>

      </tr>
    </tbody>
    </table>
    <div class="mb-3">
      <label for="exampleFormControlFile1">Carica Qui le tue immagini <strong> [Formato .jpg / .jpeg]</strong></label>
      <input type="file" class="form-control" name="immagini" id="formImmagini">
    </div>

  <button type="submit" class="btn btn-primary">Invia</button>
</form>

  <a href="ControllerHome.php" role="button" class="btn btn-info">Back</a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>