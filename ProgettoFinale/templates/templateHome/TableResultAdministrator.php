<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="row"> Risultati della Ricerca </th>
      <tr>
        <?php
        foreach ($result[0] as $key => $value) {
          echo "<th> $key </th>";
        } ?>
        <th></th>
        <th></th>
    </thead>
    <tbody>
      <?php foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
          echo "<td name=\"$key\" value=\"$value\"> $value</td>";
        }
        echo "<td><button class='btn btn-danger btn-del' data-id='$row[Identificativo]' data-tab='$tabella' >Elimina</button>";
        echo "<td><a href=\"../src/ControllerTemplateUpdate.php/?modifica=$row[Identificativo]&cat=$tabella\" role=\"button\" class=\"btn btn-warning\">Modifica</a> </td>";
        echo "</tr>";
      } ?>
    </tbody>

  </table>

  <a class="btn btn-primary" href="../src/ControllerHome.php">Nuova Ricerca</a>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(".btn-del").on("click", function() {
      if (confirm("Procedere con l'eliminazione?")) {
        let tabella = $(this).attr("data-tab");
        let id = $(this).attr("data-id");
  
        $.ajax({
          url: "../src/ControllerDelete.php",
          type: 'GET',
          data: {
            elimina: id,
            cat: tabella
          },
          error: function() {
            alert('Errore impossibile eliminare');
          },
          success: function(data) {
            $.get("../src/ControllerDelete.php/", {
              modifica: id
            }, {
              cat: tabella
            });
            alert("Eliminazione eseguita con successo");
            location.reload();
          }
        })
      }
    });
  </script>
  
  
</body>

</html>