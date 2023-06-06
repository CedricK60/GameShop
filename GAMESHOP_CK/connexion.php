<?php session_start(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/header.php'; ?>

<div class="container my-4">

  <?php
  if(isset($_POST['connect'])) {
    if(!empty($_POST['login']) && !empty($_POST['pass'])) {
      require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/inc/db-function.php';
      $res = user_connect($_POST);
      if(is_numeric($res)) {
        $_SESSION['login'] = $_POST["login"];
        $_SESSION['id'] = $res;
        header("Location: index.php");
      }
      
      switch ($res) {
        case 'wrongpass' :
          echo '<div class="alert alert-danger" role="alert">
          Mauvais mot de passe
          </div>';
          break;
        case 'wronglogin' :
          echo '<div class="alert alert-danger" role="alert">
          Mauvais identifiant
          </div>';
          break;
      }
    }
  }
  
  ?>
    <h2 class="text-center">Connexion</h2>

    <?php
      if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
      <div class="alert alert-success" role="alert">
        inscription réussi !
      </div>
    <?php } ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="login" class="form-label">Identifiant</label>
        <input type="text" class="form-control" id="login" name="login">
      </div>
      <div class="mb-3">
        <label for="pass" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>
      <button type="submit" class="btn btn-primary" name="connect">Connexion</button>
    </form>


</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/GAMESHOP_CK/layouts/footer.php'; ?>