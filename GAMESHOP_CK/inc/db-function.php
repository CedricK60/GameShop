<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getCartCount') {
  if (!empty($_SESSION['cart'])) {
      echo count($_SESSION['cart']);
  } else {
      echo '0';
  }
}

function connect(){
  $host       ="localhost";
  $username   ="root";
  $pass       ="root";
  $dbname     ="shop_bdd";

  $connexion = new mysqli($host, $username, $pass, $dbname);
  if($connexion){
    return $connexion;
  } else {
    die('Connexion impossible');
  }
}

function user_register($info_user) {
  $bdd = connect();

  $login    = htmlentities($info_user["login"]);
  $nompren  = htmlentities($info_user["nompren"]);
  $email    = htmlentities($info_user["email"]);
  $tel      = htmlentities($info_user["tel"]);
  $adresse  = htmlentities($info_user["adress"]);
  $pass     = password_hash($info_user["pass"], PASSWORD_DEFAULT);

  /*definition de la requete SQL*/
  $requete_sql = "INSERT INTO user(login_user, nomPren_user, email_user, tel_user, adress_user, pass_user) VALUES ('$login', '$nompren', '$email', '$tel', '$adresse', '$pass')";

  /*execution de la requete SQL */
  $result_sql = $bdd->query($requete_sql);

  /*resultat de la requete*/
  return $requete_sql;

}

function user_connect($info_user){
  $bdd = connect();

  $login    = htmlentities($info_user["login"]);
  $pass     = $info_user["pass"];

  $requete_sql = "SELECT * FROM user WHERE login_user ='$login' ";

  $result_sql = $bdd->query($requete_sql);

  if($result_sql->num_rows > 0){
    $ligne  = $result_sql->fetch_array();
    $passwordHash = $ligne['pass_user'];

    if(password_verify($pass, $passwordHash)) {
      //le mot de passe est vérifié et on est connecté
        return $ligne['id_user'];
    } else {
        return "wrongpass";
    }
  } else {
      //mauvais identifiant
        return "wronglogin";
  }
  
}

function get_all_product() {
  $bdd = connect();
  /*definition de la requete SQL*/
  $requete_sql = "SELECT * FROM produit";

  /*execution de la requete SQL */
  $result_sql = $bdd->query($requete_sql);

  if($result_sql->num_rows > 0) {
    return $result_sql->fetch_all(MYSQLI_ASSOC);
  }
}

function get_product_by_id($id_product) {
  $bdd = connect();
  /*definition de la requete SQL*/
  $requete_sql = "SELECT * FROM produit where id_prod = $id_product";

  /*execution de la requete SQL */
  $result_sql = $bdd->query($requete_sql);

  if($result_sql->num_rows > 0) {
    return $result_sql->fetch_array();
  }
}

function remove_product($id_product) {
  $bdd = connect();
  /*definition de la requete SQL*/
  $requete_sql = "DELETE FROM produit where id_prod = $id_product";

  /*execution de la requete SQL */
  $result_sql = $bdd->query($requete_sql);

    return $result_sql;
}

function add_product($image, $titre, $desc, $prix) {
  $bdd = connect();

  /*definition de la requete SQL*/
  $requete_sql = "INSERT INTO produit(title_prod, desc_prod, prix_prod, img_prod) VALUES ('$titre', '$desc', '$prix', '$image')";

  /*execution de la requete SQL */
  $result_sql = $bdd->query($requete_sql);

  /*resultat de la requete*/
  return $requete_sql;

}

function edit_product($image, $titre, $desc, $prix, $id_product){
  $bdd = connect();
  /* Définition de la requête SQL */
  $requete_sql = "UPDATE produit SET title_prod = '$titre', desc_prod = '$desc', prix_prod = '$prix', img_prod = '$image' WHERE id_prod = $id_product";

  /* Execution de la requête SQL */
  $result_sql = $bdd->query($requete_sql);

  return $result_sql;
}

function edit_user($id, $nom, $tel, $adresse){
  $bdd = connect();
  /* Définition de la requête SQL */
  $requete_sql = "UPDATE user SET nomPren_user = '$nom', tel_user = '$tel', adress_user = '$adresse' WHERE id_user = $id";
  /* Execution de la requête SQL */
  $result_sql = $bdd->query($requete_sql);
  return $result_sql;
}

function get_user_by_id($id){
  $bdd = connect();

  /* Définition de la requête SQL */
  $requete_sql = "SELECT * FROM user WHERE id_user = $id" ;
  /* Execution de la requête SQL */
  $result_sql = $bdd->query($requete_sql);
  if($result_sql->num_rows > 0){
      $user = $result_sql->fetch_array();
      return $user;
  }
}

function create_order($order_number, $user_id, $produit, $created) {
  $bdd = connect();

  // Définition de la requête SQL pour insérer la commande
  $requete_insert = "INSERT INTO orders (order_number, user_id, product_id, created)
                     VALUES ('$order_number', '$user_id', '$produit', '$created')";

  // Exécution de la requête d'insertion
  $result_insert = $bdd->query($requete_insert);

  // Vérification si l'insertion a réussi
  if ($result_insert) {
      // Récupération des détails de la commande créée en utilisant le user_id
      $requete_select = "SELECT o.*, p.*, u.* FROM orders o, user u, produit p WHERE o.user_id = '$user_id'";
      $result_select = $bdd->query($requete_select);

      if ($result_select->num_rows > 0) {
          return $result_select->fetch_assoc();
      }
  }

  return null;
}

function get_all_orders() {
  $bdd = connect();
  /* Définition de la requête SQL */
  $requete_sql = "SELECT o.*, u.*, p.* FROM orders as o LEFT JOIN user as u ON o.user_id = u.id_user LEFT JOIN produit as p ON p.id_prod = o.product_id";

  /* Exécution de la requête SQL */
  $result_sql = $bdd->query($requete_sql);

  if($result_sql->num_rows > 0) {
    return $result_sql->fetch_all(MYSQLI_ASSOC);
  }
}

function get_product_title($id_produit) {
  $bdd = connect();

  // Définition de la requête SQL pour récupérer le titre du produit
  $requete_select = "SELECT title_prod FROM produit WHERE id_prod = '$id_produit'";
  $result_select = $bdd->query($requete_select);

  if ($result_select->num_rows > 0) {
    $row = $result_select->fetch_assoc();
    return $row['title_prod'];
  }

  return null;
}


?>