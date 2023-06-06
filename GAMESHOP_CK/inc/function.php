<?php 

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function is_connected(){
  return !empty($_SESSION['id']);
}

function is_admin(){
  return !empty($_SESSION['id_admin']);
}

?>