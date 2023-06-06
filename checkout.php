<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<?php if(!is_connected()) {
  exit();
}


if (!empty($_SESSION["cart"])) {
  $today = date("Ymd");
  $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
  $order_number = $today . $rand;
  $created = date("Y-m-d H:i:s");
  $user_id = $_SESSION["id"];
  $title_prod = ""; // Variable pour stocker les titres des produits

  foreach ($_SESSION["cart"] as $id_produit) {
    $res = create_order($order_number, $user_id, $id_produit, $created);

    // Récupérer le titre du produit en fonction de l'id_produit
    $titre_produit = get_product_title($id_produit);

    if ($titre_produit) {
      $title_prod .= $titre_produit . ', ';
    }
  }

  if ($res) {
    $_SESSION["cart"] = array();
    echo '<div class="container"> 
              <h1>Détails de la commande</h1>
              <p><strong>Numéro de commande : </strong>'  . $order_number . '</p>
              <p><strong>Produits : </strong>' . rtrim($title_prod, ', ') . '</p>
              <p><strong>Date de création : </strong>' . $created . '</p>
          </div>';
  }
}

?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>