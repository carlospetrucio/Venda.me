<?php
require('../../vendor/autoload.php');
include('includes/functions.php');

//este arquivo quando executado realiza a captura das transações que foram autorizadas, muda para paid.
//recomendo fortemente a remoção em caso de uso e configuração do postbak.php 
//Informações de como implementar o postback podem ser localizadas na documentação oficial da API Pagar.me (version 2018)
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('includes/head.php'); //mantem o mesmo css em todas as páginas ?>
    <title>Venda.me - Capturar</title>
  </head>

<body>
  <!-- navbar admin -->
<?php include('./includes/navbar-admin.php') ?>
<br><br><br>

<div class="row justify-content-center">
  <div class="col-11">
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Status</th>
        <th scope="col">Valor</th>
        <th scope="col">Pagamento</th>
        <th scope="col">Titular</th>
      </tr>
    </thead>
    <tbody>
      <?php ExibeTransacoesLista(); ?>
    </tbody>
  </table>



</div> <!--row-->
</div></div> <!-- container -->
  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
