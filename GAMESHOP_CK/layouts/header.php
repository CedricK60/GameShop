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
        <link href="./assets/CSS/bootstrap.css" rel="stylesheet" />
        <link href="./assets/CSS/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light py-3 bg-custom">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php" class="logo"><img title="logo" src="assets/img/logo3.png" alt="GAMESHOP LOGO"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="a_propos.php">A propos</a></li>
                    </ul>
                        <a href="cart.php" class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Mon panier
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php 
                                if(!empty($_SESSION['cart'])) {
                                    echo count($_SESSION['cart']);
                                }else {
                                    echo '0';
                                }
                            ?>
                        </span>
                        </a>

                        <?php if(!is_connected()) { ?>
                          <a class="btn btn-outline-dark" href="connexion.php">
                              <i class="bi bi-person-plus-fill"></i>
                              Connexion
                          </a>
                        <?php } ?>
                          
                        <?php if(!is_connected()) { ?>
                          <a class="btn btn-outline-dark" href="inscription.php">
                              <i class="bi bi-person-plus-fill"></i>
                              S'inscrire
                          </a>
                        <?php } ?>
                        <?php if(is_connected()) { ?>
                          <a class="btn btn-outline-dark" href="account.php">
                              <i class="bi bi-person-plus-fill"></i>
                              <?php echo $_SESSION["login"]; ?>
                          </a>
                        <?php } ?>
                        <?php if(is_connected()) { ?>
                            <a class="btn btn-outline-dark" href="inc/logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Déconnexion
                            </a>
                        <?php } ?>
                </div>
            </div>
        </nav>