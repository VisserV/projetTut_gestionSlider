<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>infiniteSlider</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Karma:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<nav>
  <a href="index.php?page=0">Voir le slider</a>
  <a href="index.php?page=1">Creer un slider</a>
  <a href="index.php?page=2">Choisir un slider</a>
  <a href="index.php?page=3">Ajouter des images</a>
  <a href="index.php?page=4">Supprimer un slider</a>
  <a href="index.php?page=5">Modifier un slider</a>
</nav>

<body>

<?php

  if (!empty($_GET["page"])) {
  	$page=$_GET["page"];}
  else {
  	$page=0;
  }

  switch ($page) {

    case 0:
    	// inclure ici la page voir le slider
    	include_once('pages/voirSlider.php');
    	break;

    case 1:
    	// inclure ici la page creer un slider
    	include_once("pages/creerSlider.php");
      break;

    case 2:
    	// inclure ici la page choisir un slider
    	include_once('pages/choisirSlider.php');
    	break;

    case 3:
      //inclure ici la page pour ajouter une image pour le slider
      include_once('pages/ajouterImages.php');
      break;

    case 4:
      //inclure ici la page pour supprimer un slider
      include_once('pages/supprimerSlider.php');
      break;

    case 5:
      //inclure ici la page pour supprimer un slider
      include_once('pages/modifSlider.php');
      break;

    default :
      include_once('pages/voirSlider.php');
  }

?>

</body>

</html>
