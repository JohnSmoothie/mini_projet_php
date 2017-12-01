<?php

  $toto = crypt('toto');
  $titi = crypt('titi');

// il faut que la fonction crypt() connaisse la méthode de cryptage et le "sel" à utiliser.
//Il faut que ce soit les mêmes que ce qui a été utilisé lors du cryptage.
// ces 2 informations sont stockées au début de la chaîne de caractères résultant du cryptage
//C'est pour cette raison que l'on passe $toto comme 2ème paramètre.
// voir documentation php

  if (crypt('toto', $toto) == $toto) {
      echo 'Vous êtes identifié !';
  } else {
      echo 'Mot de passe incorrect !';
  }
?>
