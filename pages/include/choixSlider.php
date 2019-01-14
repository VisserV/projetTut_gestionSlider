
<div id="choixSlider">

<?php

  $fichierSlider = fopen('./defaultSlide.txt', 'r+');
  $cheminSlider = fgets($fichierSlider);
  fclose($fichierSlider);
  $defaultSlider = basename($cheminSlider, '.txt');

  if($dossier = opendir('sliders')){
    while(false !== ($fichier = readdir($dossier))){
      if($fichier != '.' && $fichier != '..'){

        $nomFichier = basename($fichier, '.txt');

        if ($nomFichier != $defaultSlider) {
          echo '<div class="groupeSlider">';
        } else {
          echo '<div class="groupeSlider" id="sliderACacher">';
          // on cachera ce slider dans le cas de la page supprimer
        }
          echo '<input type="radio" id="casePour'.$nomFichier.'" name="cheminSlider" value="'.$nomFichier.'">';
          echo '<label for="casePour'.$nomFichier.'">'.$nomFichier.'</label>';
?>
        </div>
<?php
      }
    }
?>
    <br><br>
    <div id="bouton">
      <input type="submit" value="Valider">
    </div>

<?php
  }
  else {
    echo 'Le dossier n\' a pas pu être ouvert';
?>
    <input type="submit" value="Recharger la page">
<?php
  }

?>
</div>
