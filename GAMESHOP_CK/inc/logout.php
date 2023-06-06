<?php
session_start();
echo $_SESSION["login"]." a été deconnecté...";
session_destroy();

//header("refresh:3;url=../index.php");  //Temporisé la deconnexion
header("location:../index.php");     //Deconnexion immédiate

?>