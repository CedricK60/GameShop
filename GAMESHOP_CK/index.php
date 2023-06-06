<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<!-- Section-->
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
          $produits = get_all_product();
          foreach($produits as $produit) { ?>
          <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/img/<?php echo $produit["img_prod"] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $produit["title_prod"] ?></h5>
                                    <!-- Product price-->
                                    <?php echo $produit["prix_prod"] ?> €
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="cart.php?action=add&id=<?php echo $produit["id_prod"] ?>">Ajouter au panier</a></div>
                            </div>
                        </div>
                    </div>
        <?php } ?>
      </div>
  </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>