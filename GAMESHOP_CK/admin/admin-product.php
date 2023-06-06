<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<?php if(!is_admin()) {
    header('location: login.php');
    exit();
} ?>

<?php if(isset($_GET["action"]) && $_GET["action"] == 'del') {
    if(isset($_GET["id"])){
        $res = remove_product($_GET["id"]);
    }
} ?>
<div class="container">
    <?php if(isset($res) && $res) { ?>
        <div class="alert alert-success" role="alert"> Le produit a bien été supprimée</div>;
    <?php } else if (isset($res) && !$res) { ?>
        <div class="alert alert-success" role="alert"> Le produit a bien été supprimée</div>;
    <?php } ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $products = get_all_product(); ?>
            <?php foreach($products as $product) { ?>
                <tr>
                    <th scope="row"><?= $product["id_prod"] ?></th>
                    <td><?= $product["title_prod"] ?></td>
                    <td><?= $product["prix_prod"] ?> €</td>
                    <td>
                        <a href="edit-product.php?action=edit&id=<?= $product["id_prod"] ?>">Modifier</a>
                        <a href="admin-product.php?action=del&id=<?= $product["id_prod"] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer le produit ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>