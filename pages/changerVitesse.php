
     <h1>Choisir la vitesse du slider</h1>

<form action="index.php?page=6" id="choixImages" method="post">
<?php
  if (empty($_POST["vitesse"])){
    echo"Temps (en seconde) :";
    echo '<input type="text" name="vitesse">';
    echo "<br><br>";
    echo'<input type="submit" value="Valider " />';
  }
  else {
    $vitesseSlider = $_POST["vitesse"] * 1000;

    $fichierVitesse = fopen('./defaultSpeed.txt', 'w+');
    fputs($fichierVitesse, $vitesseSlider);
    fclose($fichierVitesse);

    //redirection vers la page voir slider
  	header('Location: index.php?page=0');
  	exit;
}

?>
</form>
