
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Benvenuto <?=$nome?></title>
    <style>
     .insert{
        margin:2%;
        float:right;
      }
      </style>
</head>
<body>
    <form action="ControllerLogout.php" method="get">
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>
    
<form action="ControllerTemplateInsert.php" method="post">

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle insert" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Inserisci nuovo
      </button>

      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <?php 
        foreach($categorie as $key=>$val){
          $this->insert('dropdownButton',["val"=>$val]);
        }?> 
      </div>
    </div>
</form>

<form action="ControllerSelect.php" method="get" enctype="multipart/form-data">

    <h3>Cerca nel catalogo per modificare e eliminare oppure inserisci nuovo reperto:</h3>

    <div class="input-group"> 

      <select class="custom-select" name="categoria">
          <option selected>All</option>
          <?php foreach($categorie as $key=>$val)
          $this->insert('dropdownElement',["val"=>$val]);
          ?>
      <input name="parametri" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" required  minlength="2" maxlength="18" />
  <button type="submit" class="btn btn-outline-primary">Search</button>
      </div>
</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
