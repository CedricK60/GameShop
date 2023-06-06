<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<?php if(!is_admin()) {
    header('location: login.php');
    exit();
} ?>

<?php 
    if(isset($_POST["ajouter"])) {
        if(!empty($_FILES["img"]) && !empty($_POST["titre"]) && !empty($_POST["desc"]) && !empty($_POST["prix"])) {
            // ajoute l'image au dossier img de notre projet
            $filename = $_FILES["img"]["name"];
            $tempname = $_FILES["img"]["tmp_name"];
            $folder   = "../assets/img/" . $filename;

            $titre = htmlentities($_POST["titre"]);
            $desc = htmlentities($_POST["desc"]);
            $prix = htmlentities($_POST["prix"]);

            if (move_uploaded_file($tempname, $folder)) {
                $res = add_product($filename, $titre, $desc, $prix);
                if($res){
                  $message = '<div class="alert alert-success" role="alert">Produit correctement ajouté</div>';
                  }else{
                  $message = '<div class="alert alert-danger" role="alert">Echec lors de l\'ajout du produit</div>';
                  }
            }else{
                  $message = '<div class="alert alert-danger" role="alert">Image non envoyé</div>';
                  }        
        }
    }   
?>
<div class="container my-4">
    <h2 class="text-center">Ajouter un produit</h2>
    <form method="POST" action="" enctype="multipart/form-data">

      <?php if(isset($message)) { ?>
      <?= $message ?>
      <?php } ?>

      <div class="mb-3">
        <label for="img" class="form-label">Image du produit</label>
        <div class="input-group">
            <input type="file" class="form-control" id="img" name="img" aria-label="Selectionner">
        </div>
      </div>

      <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre">
      </div>

      <div class="mb-3">
        <label for="desc" class="form-label">Description du produit</label>
        <textarea type="text" class="form-control" id="desc" rows="3" name="desc"></textarea>
      </div>

      <div class="mb-3">
        <label for="prix" class="form-label">Prix du produit</label>
        <input type="text" class="form-control" id="prix" name="prix">
      </div>

      <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button></br>

    </form>

  </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>