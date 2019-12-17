<?php
require('../../vendor/autoload.php');
include('includes/functions.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('includes/head.php'); //mantem o mesmo css em todas as páginas ?>
    <title>Venda.me - Add Produto</title>
  </head>
<body>
  <!-- navbar admin -->
<?php include('./includes/navbar-admin.php') ?>
<div class="container px-lg-5 border border-dark">
<div class="row mx-lg-n5">
<div class="col-sm-12 py-3">
  <form method="post" enctype="multipart/form-data" action="produto-novo.php">
    <!-- ENVIA FOTO PRODUTO -->
    <div class="form-group">
        <label for="exampleFormControlFile1">Escolha uma imagem do produto. (*Dica : 500x500)</label>
        <input type="file" class="form-control-file" id="arquivo" name="arquivo">
      </div>
    <!-- ENVIA FOTO PRODUTO -->
    <!-- NOME DO PRODUTO -->
    <div class="form-group">
    <input type="text" class="form-control" id="nomedoproduto" name="nomedoproduto" aria-describedby="emailHelp" placeholder="Digite um nome para o produto">
    <small id="nomedoproduto_nameHelp" class="form-text text-muted"> Informe o nome do produto.</small>
    </div>
    <!-- NOME DO PRODUTO -->
    <!-- VALOR DO PRODUTO -->
    <div class="form-group">
    <input type="number" class="form-control" id="valorproduto" name="valorproduto" aria-describedby="emailHelp" placeholder="Digite um nome para o produto">
    <small id="nomedoproduto_nameHelp" class="form-text text-muted"> Informe o valor do produto sem virgúlas, exemplo : R$ 10,00 = 1000.</small>
    </div>
    <!-- VALOR DO PRODUTO -->
    <!-- VENDEDOR DO PRODUTO -->
    <div class="form-group">
    <select class="form-control" id="vendidopor" name="vendidopor">
      <option>Selecione quem vende o produto.</option>
      <?php
        $result_vendedores = "SELECT * FROM vendedores";
        $resultado_niveis_acesso = mysqli_query($db, $result_vendedores);
        while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
          <option value="<?php echo $row_niveis_acessos['idvendedores']; ?>"><?php echo $row_niveis_acessos['legal_name']; ?></option>
          <?php } ?></select>
    <small id="vendidoporHelp" class="form-text text-muted"> Selecione quem vende o produto.</small>
    </div>
    <!-- VENDEDOR DO PRODUTO -->
    <!-- ADJETIVO DO PRODUTO -->
    <div class="form-group">
    <input type="text" class="form-control" id="adjetivodoproduto" name="adjetivodoproduto" aria-describedby="emailHelp" placeholder="Digite um adjetivo deste produto">
    <small id="adjetivodoprodutoHelp" class="form-text text-muted"> Informe um adjetivo deste produto.</small>
    </div>
    <!-- ADJETIVO DO PRODUTO -->
	<button type="submit" class="btn btn-primary" name="btn_cadastrarproduto" > + Add Vendedor</button>
</form>
</div> <!--col-12-->
</div> <!--row-->
</div> <!-- container -->
<?php include('includes/script.php'); ?>
</body>

</html>
