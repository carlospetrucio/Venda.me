<?php
require('../vendor/autoload.php');
include('admin/includes/functions.php');

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
    <link rel="stylesheet" href="admin/includes/css/bootstrap.min.css">
    <script src="admin/includes/js/bootstrap.min.js"></script>
    <script src="admin/includes/js/jquery.min.js"></script>
    <link rel="stylesheet" href="admin/includes/css/bootstrap-reset.css">

    <title>VendaMe</title>
  </head>


  <body class="bg-success">
        <?php include('includes/navbar.php'); ?>
        <div class="container">
            <div class="row ">
    <!-- Index Logo -->
    <div class="col-12 text-center">
      <img class="text-center" src="admin/includes/img/home_logo.png" width="20%" >
    </div>
    <br>

    <!--- verifica se esta logado para exibir boas vindas --->
    <?php 	if (!isLoggedIn() == true) {
      echo "<center><h4>Você precisa realizar <a class='btn btn-danger' href='login.php'>login</a> para poder comprar !</h4></center>";
    }else {
      echo "<center><h4>Bem vindo";
      echo "</h4></center>";
    } ?>
    <!--- verifica se esta logado para exibir boas vindas --->

    <!-- Index Logo -->
        </div> <!-- encerra row -->

        <br>
        <div class="row">
        	<?php ExibeProdutos();?>
        </div> <!-- row.// -->
      </div> <!-- encerra container -->
      <!-- Optional JavaScript -->
      <script src="admin/includes/contadores.js"></script>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
