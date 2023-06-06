<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<?php if(!is_admin()) {
    header('location: login.php');
    exit();
} ?>

<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $produit = get_product_by_id($id);
    }
    if(isset($_POST["edit"])) {
        if(!empty($_POST["id"]) && !empty($_FILES["img"]) && !empty($_POST["titre"]) && !empty($_POST["desc"]) && !empty($_POST["prix"])){

            $id = htmlentities($_POST["id"]);
            $titre = htmlentities($_POST["titre"]);
            $desc = htmlentities($_POST["desc"]);
            $prix = htmlentities($_POST["prix"]);

            

            //ajoute l'image au dossier img de notre projet 
            if(!empty($_FILES["img"]["name"])){
                $filename = $_FILES["img"]["name"];
                $tempname = $_FILES["img"]["tmp_name"];
                $folder = "../assets/img/" . $filename;
                move_uploaded_file($tempname, $folder);
            }else{
                $filename = $produit['img'];
            }
            
            $res = edit_product($filename, $titre, $desc, $prix, $id);
            if($res){
                $message = '<div class="alert alert-success" role="alert">Produit correctement modifié</div>';
            }else{
                $message = '<div class="alert alert-danger" role="alert">Echec lors de la modification du produit</div>';
            }
        }
    }
?>
<div class="container my-4"> 

    <h2 class="text-center">Modifier</h2>

    <?php if(isset($message)) { 
        echo $message;
     } ?>
    <?php if(isset($produit)) { ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="img" class="form-label">Image du produit</label>
            <div class="input-group">
                <input type="file" class="form-control" id="img" name="img" value="<?php echo $produit["img_prod"] ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="titre" class="form-label">Titre du produit</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $produit["title_prod"] ?>">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description du produit</label>
            <textarea class="form-control" id="desc" rows="3" name="desc"><?php echo $produit["desc_prod"] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix du produit</label>
            <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $produit["prix_prod"] ?>">
        </div>

        <input type="hidden" class="form-control" id="prix" name="id" value="<?php echo $id ?>">

        <button type="submit" class="btn btn-primary" name="edit">Modifier</button>
    </form>
    <?php } ?>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>