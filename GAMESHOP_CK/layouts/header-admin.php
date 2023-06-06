<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/function.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GameShop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/CSS/bootstrap.css" rel="stylesheet" />
        <link href="../assets/CSS/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <div class="container px-4 px-lg-5">
                <?php if(is_admin()) { ?>
                    <a class="navbar-brand" href="">ADMIN</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item">
                                <a href="admin-product.php"class="nav-link"">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a href="add-product.php" class="nav-link"">Ajouter un produit</a>
                            </li>
                            <li class="nav-item">
                                <a href="admin-orders.php" class="nav-link"">Commandes</a>
                            </li>
                        </ul>

                        <a class="btn btn-outline-dark" href="">
                            <i class="bi bi-person-plus-fill"></i><?php echo $_SESSION["login_admin"] ?>
                        </a>
                        <?php if(is_admin()) { ?>
                            <a class="btn btn-outline-dark" href="/GAMESHOP_CK/inc/logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Déconnexion
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </nav>