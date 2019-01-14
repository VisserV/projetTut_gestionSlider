                  <h1>Ajouter des images pour le slider</h1>

<form enctype=multipart/form-data action="index.php?page=3" id="choixSlider" method="post">

<?php
  if (empty($_FILES["fichier"])){
?>

    <input name="fichier" type="file" value="Choisir une image" />
    <input type="submit" value="Enregistrer l'image" />

<?php
  } else {

    if($dossierFichierTempo = opendir(sys_get_temp_dir())){
      if($dossierImage = opendir('img')){

        $fichier = $_FILES['fichier'];

        if(strpos($fichier['type'], 'image') !== false){

          $fichierTemporaire = $fichier["tmp_name"];
          $src = realpath(dirname($fichierTemporaire)).'\\'.basename($fichierTemporaire);

          $dst = 'img/'.$fichier["name"];

          $result = copy($src, $dst);

          if ($result == true){
            echo '<img src="imagePage/valid.png" alt="valid">';
            echo 'La photo a bien été ajoutée à la liste des photos pour le slider';
          } else {
            echo '<img src="imagePage/erreur.png" alt="erreur">';
            echo "Echec lors de l'import de la photo";
          }

        }
        else {
          echo '<img src="imagePage/erreur.png" alt="erreur">';
          echo 'Veuillez sélectionner une image !';
        }
      } else {
        echo '<img src="imagePage/erreur.png" alt="erreur">';
        echo "Erreur d'ouverture du dossier images";
      }
    } else {
      echo '<img src="imagePage/erreur.png" alt="erreur">';
      echo "Erreur d'ouverture du dossier contenant les fichiers temporaires";
    }

    closedir($dossierImage);
    closedir($dossierFichierTempo);

?>
    <br><br> <input type="submit" value="Enregistrer une autre image" />
<?php
  }
?>

</form>
