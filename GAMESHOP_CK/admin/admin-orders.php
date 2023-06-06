<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php'; ?>

<?php if(!is_admin()) {
    header('location: login.php');
    exit();
} ?>

<div class="container">
    <?php $orders = get_all_orders(); ?>
    <?php if (empty($orders)) { ?>
        <p>Vous n'avez pas de commandes.</p>
    <?php } else { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numéro de commande</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Date de la commande</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $orders = get_all_orders(); ?>
                <?php foreach($orders as $order) { ?>
                    <tr>
                        <th scope="row"><?= $order["order_number"] ?></th>
                        <td><?= $order["nomPren_user"] ?></td>
                        <td><?= $order["title_prod"] ?></td>
                        <td><?= $order["created"] ?></td>
                        <td>
                            <a href="admin-orders.php?action=del&id=<?= $order["order_id"] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer la commande ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>           
        </table>
    <?php } ?>    
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>