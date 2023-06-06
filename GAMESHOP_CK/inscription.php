<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header.php'; ?>
  <div class="container my-4">
<?php
  if(isset($_POST['envoi'])){
    if(!empty($_POST['login']) && !empty($_POST['nompren']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['adress']) && !empty($_POST['pass'])){

      require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php';
      $inscription = user_register($_POST);

      if($inscription){
        header("Location: connexion.php?success=1");
      } else {
          echo '<div class="alert alert-danger" role="alert">
          Inscription échoué.
          </div>';
      }
    } else {
      echo '<div class="alert alert-danger" role="alert">
          Tout les champs ne sont pas remplies
          </div>';
    }
  }
?>

  <div class="container my-4">
    <h2 class="text-center">Inscription</h2>
    <form method="POST" action="">

      <div class="mb-3">
        <label for="login" class="form-label">Identifiant</label>
        <input type="text" class="form-control" id="login" name="login">
      </div>

      <div class="mb-3">
        <label for="nomPren" class="form-label">Nom & Prénom</label>
        <input type="text" class="form-control" id="nomPren" name="nompren">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>

      <div class="mb-3">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="tel" name="tel">
      </div>

      <div class="mb-3">
        <label for="adress" class="form-label">Adresse</label>
        <textarea type="text" class="form-control" id="adress" rows="3" name="adress"></textarea>
      </div>

      <div class="mb-3">
        <label for="pass" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>

      <button type="submit" class="btn btn-primary" name="envoi">Envoyer</button></br>

    </form>

  </div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>