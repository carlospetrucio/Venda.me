<?php
require('../../vendor/autoload.php');
include('includes/functions.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('includes/head.php'); //mantem o mesmo css em todas as páginas ?>
    <title>Venda.me - Home</title>
  </head>
<body class="bg-primary">
<?php include('includes/navbar-admin.php') ?>

<main role="main">
  <div class="jumbotron bg-primary rounded-0">
          <div class="container text-center">
            <div class="col-12 text-center text-light">
              <img class="text-center" src="includes/img/home_logo.png" width="30%" >
            </div>
            <h1 class="display-3 text-light">Bem vindo a Venda.me!</h1>
            <p class="text-light">**Não compartilhe sua senha com ninguém, a equipe de suporte "venda.me" não solicitará sua senha nunca.</p>
            <hr>
            <?php ExibeDashboard();?>
          </div>
        </div>
 </main>
<?php include('includes/script.php'); ?>
</body>

</html>
