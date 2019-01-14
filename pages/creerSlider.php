              <h1>Créer un slider</h1>

<form action="index.php?page=1" id="choixImages" method="post">

<?php

  if (empty($_POST["nomSlider"])) {
    //choix des images

    include_once('pages/include/selectionImages.php');

  } else {

    $cheminSlider = './sliders/'.$_POST["nomSlider"].'.txt';
    $fichierSlider = fopen("$cheminSlider", 'w+');

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
</body>
</html>
