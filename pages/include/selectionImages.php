<h2>Selectionnez les photos souhaitées</h2>

<div id="choixImg">

<?php

  if($dossier = opendir('img')){
    $index = 0;
    while(false !== ($fichier = readdir($dossier))){
      if($fichier != '.' && $fichier != '..'){
?>
        <div class="groupeImg">
<?php
          echo '<input type="checkbox" id="casePour'.$fichier.'" name="'.$index.'" value="on">';
          echo '<label for="casePour'.$fichier.'">';
            echo $fichier.' : <br>';
            echo '<img src="img/'.$fichier.'" alt="'.$fichier.'">';
          echo '</label>';
?>
        </div>
<?php
      }
      $index++;
    }
?>
    <div id="nomSlider">
      <p>Nom du Slider : <p>
<?php
      if (!empty($_POST["cheminSlider"])){
        $_SESSION["ancienNom"] = $_POST["cheminSlider"];
        echo '<input type="text" name="nomSlider" value="'.$_SESSION["ancienNom"].'">';
      } else {
        echo '<input type="text" name="nomSlider">';
      }
?>
    </div>

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
<?php
closedir($dossier);
