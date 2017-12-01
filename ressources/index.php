<?php

<<<<<<< HEAD
=======
  if(isset($_POST["login"]) && isset($_POST["password"])){
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["password"] = $_POST["password"];
  }

>>>>>>> b0d04c20ab2d911eba935077f8fb1abb3ab89804
  require "config/config.php";
  require PATH_CONTROLEUR."/routeur.php";

  $routeur=new Routeur();
  $routeur->routerRequete();

?>
