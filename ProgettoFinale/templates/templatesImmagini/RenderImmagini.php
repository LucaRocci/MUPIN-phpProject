
<body>

    <?php foreach($immagine as $row){
    foreach($row as $key=>$img){
        $des=explode($directory,$img);
        if($amministratore===false){
       $this->insert('immagine',['immagine'=>$img,'descrizione'=>$des[1]]);
        }
        else{
            $this->insert('immagineAdministrator',['immagine'=>$img,'descrizione'=>$des[1]]);
        }
    }
}?>

<script>
$(".btn-del-img").on("click", function() {
      if (confirm("Procedere con l'eliminazione?")) {
        let id = $(this).attr("data-id");
  
        $.ajax({
          url: "../src/ControllerDelete.php",
          type: 'GET',
          data: {
            immagine: id,
          },
          error: function() {
            alert('Errore impossibile eliminare');
          },
          success: function(data) {
            $.get("../src/ControllerDelete.php/", {
              immagine: id
            });
            alert("Eliminazione eseguita con successo");
            location.reload();
          }
        })
      
      }
    });
  </script>
</body>

