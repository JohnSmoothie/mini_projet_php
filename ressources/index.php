<?php

  if(isset($_POST["login"]) && isset($_POST["password"])){
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["password"] = $_POST["password"];
  }

  require "config/config.php";
  require PATH_CONTROLEUR."/routeur.php";

  $routeur=new Routeur();
  $routeur->routerRequete();

?>
