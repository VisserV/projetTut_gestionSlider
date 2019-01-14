                          <h1>Supprimer un slider</h1>

<form action="index.php?page=4" id="suppSlider" method="post">

<?php

  if (empty($_POST["cheminSlider"])) {
    //choix des images

?>
    <h2>Selectionnez le slider obsolète</h2>
<?php

    include_once('./pages/include/choixSlider.php');

    // appel au fichier js qui cache le slider par défaut
?>
    <script src="./js/cacherSlider.js"></script>
<?php

  } else {
    $chemin = './sliders/'.$_POST["cheminSlider"].'.txt';
    unlink($chemin);

    //redirection vers la page voir slider
    header('Location: index.php?page=0');
    exit;
  }

?>
</form>
