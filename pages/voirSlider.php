                  <h1>Exemple du slider BOREAL MAROQUINERIE</h1>

<?php
if ( file_exists('./defaultSlide.txt') ) {
  $fichierSlider = fopen('./defaultSlide.txt', 'r+');
} else {
  $fichierSlider = fopen('./defaultSlide.txt', 'w+');
}

if (filesize('./defaultSlide.txt') == 0) {
  fputs($fichierSlider, "./img");
  fseek($fichierSlider, 0);
}

$cheminSlider = fgets($fichierSlider);
fseek($fichierSlider, 0);

$slider = fopen("$cheminSlider", 'r+');

?>

<div id="infinite-slider2">
<?php

  while(false !== ($fichier = fgets($slider))){
    echo' <div>
      <img src="'.$fichier.'" alt="'.$fichier.'">
    </div>';
  }

?>
</div><br><br>

  <script src="js/infiniteSlider2.js"></script>
  <script src="js/call.js.php"></script>
  <script src="js/jquery-3.2.1.js"></script>

<?php

  fclose($fichierSlider);
?>

<!--
  <div>
      <img src="img/s1.jpg" alt="s1.jpg">
  </div>
  <div>
      <img src="img/s2.jpg" alt="s2.jpg">
  </div>
  <div>
      <img src="img/s3.jpg" alt="s3.jpg">
  </div>
  <div>
      <img src="img/s4.jpg" alt="s4.jpg">
  </div>
  <div>
      <img src="img/s5.jpg" alt="s5.jpg">
  </div>
-->
