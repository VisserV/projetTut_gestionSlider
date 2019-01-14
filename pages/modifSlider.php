                          <h1>Modifier un slider</h1>

<form action="index.php?page=5" id="choixSlider" method="post">

<?php

  if ( empty($_POST["cheminSlider"]) &&  empty($_POST["nomSlider"])) {
    //choix des images

?>
    <h2>Selectionnez le slider incorrect</h2>
<?php

    include_once('pages/include/choixSlider.php');

  } else if ( !empty($_POST["cheminSlider"] && empty($_POST["nomSlider"])) ) {

    $cheminSlider = './sliders/'.$_POST["cheminSlider"].'.txt';
    $slider = fopen("$cheminSlider", 'w+');

    include_once('pages/include/selectionImages.php');

  } else {

    $ancienNom = $_SESSION["ancienNom"].'.txt';
    $nouveauNom = $_POST["nomSlider"].'.txt';

    $ancienChemin = './sliders/'.$ancienNom;
    $nouveauChemin = './sliders/'.$nouveauNom;

    if ($ancienNom != $nouveauNom) {
      rename($ancienChemin, $nouveauChemin);

      $fichierSlider = fopen('./defaultSlide.txt', 'r+');
      $defaultSlider = fgets($fichierSlider);
      fclose($fichierSlider);

      if ($defaultSlider = $ancienChemin) {

        $fichierSlider = fopen('./defaultSlide.txt', 'w+');
        fputs($fichierSlider, $nouveauChemin);
        fclose($fichierSlider);

      }

    }


    $fichierSlider = fopen("$nouveauChemin", 'w+');

    if($dossier = opendir('img')){
      $index = 0;
      while(false !== ($fichier = readdir($dossier))){
        if($fichier != '.' && $fichier != '..'
                && !empty($_POST["$index"])) {

          if ($_POST["$index"] == 'on'){

            $src = './img/'.$fichier;
            fputs($fichierSlider, "$src\n");


          }
        }
        $index++;
      }
    } else {
      echo 'Le dossier n\' a pas pu être ouvert';
?>
      <input type="submit" value="Recharger la page">
<?php
    }

    closedir($dossier);
    fclose($fichierSlider);

    //redirection vers la page voir slider
  	header('Location: index.php?page=0');
  	exit;
  }


?>
</form>
