                    <h1>Choisir le slider à afficher</h1>

<form action="index.php?page=2" id="choixSlider" method="post">

<?php

  if (empty($_POST["cheminSlider"])) {
    //choix des images

?>
    <h2>Selectionnez le slider souhaité</h2>
<?php

    include_once('pages/include/choixSlider.php');

  } else {
    $cheminSlider = './sliders/'.$_POST["cheminSlider"].'.txt';

    $fichierSlider = fopen('./defaultSlide.txt', 'w+');
    fputs($fichierSlider, $cheminSlider);
    fclose($fichierSlider);

    //redirection vers la page voir slider
  	header('Location: index.php?page=0');
  	exit;
  }

?>
</form>
