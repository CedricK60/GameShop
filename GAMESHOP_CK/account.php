<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>


<?php if(!is_connected()) {
    header('location: login.php');
    exit();
}
$user = get_user_by_id($_SESSION['id']);
if(isset($_POST["edit"])){
    if(!empty($_POST['nompre']) && !empty($_POST['tel']) && !empty($_POST['adresse'])){

        $nompre = htmlentities($_POST['nompre']);
        $tel = htmlentities($_POST['tel']);
        $adresse = htmlentities($_POST['adresse']);

        $res = edit_user($_SESSION["id"], $nompre, $tel, $adresse);
        if($res){
            header("Refresh:0");
        }
    }
}
?>

<div class="container my-4">
    <div class="page-profile">
        <div class="row">
            <!-- COL 1 -->
            <div class="col-md-4">
                <section class="panel">
                    <div class="panel-body noradius padding-10">

                        <!-- About -->
                        <h3 class="text-black">
                            <?php echo $user["nomPren_user"] ?>
                        </h3>
                        <small class="text-gray size-14"><?php echo $user["email_user"];?></small>
                        <ul class="list-group mt-4">
                            <li class="list-group-item active"><a href="account.php">Modifier le profile</a></li>
                            <li class="list-group-item"><a href="orders.php">Mes commandes</a></li>
                            <li class="list-group-item"><a href="logout.php">Déconnexion</a></li>
                        </ul>
                        <!-- /About -->

                    </div>
                </section>
            </div><!-- /COL 1 -->

            <!-- COL 2 -->
            <div class="col-md-8">
                <!-- Edit -->
                <div id="edit">

                    <form class="form-horizontal padding-10" method="POST" action="" enctype="multipart/form-data">
                        <h4>Information personnel</h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nompre">Nom & Prénom</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="nompre" name="nompre" value="<?php echo $user['nomPren_user'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tel">Tel</label>
                                <div class="col-md-8">
                                    <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $user['tel_user'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="adresse">Adresse</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="adresse" name="adresse" ><?php echo $user['adress_user'] ?></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" name="edit" class="btn btn-primary btn-block my-4">
                        Modifier
                        </button>
                    </form>

                </div>
            </div><!-- /COL 2 -->
        </div>
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>