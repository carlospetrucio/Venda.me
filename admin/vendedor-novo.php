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
    <title>Venda.me - Add Vendedor</title>
  </head>

<body>
  <!-- navbar admin -->
<?php include('./includes/navbar-admin.php') ?>

<div class="container px-lg-5 border border-dark">
<div class="row mx-lg-n5">
<div class="col-sm-12 py-3">
    <form method="POST" action="vendedor-novo.php">
      <?php echo display_error(); ?>

    <!-- NOME -->
    <div class="form-group">
    <input type="text" class="form-control" id="legal_name" name="legal_name"  aria-describedby="emailHelp" placeholder="Nome do vendedor">
    <small id="legal_nameHelp" class="form-text text-muted"> Informa acima o nome completo do titular.</small>
    </div>
    <!-- NOME -->

    <!-- CPF/CNPJ -->
    <div class="form-group">
    <input type="number" class="form-control" id="document_number" name="document_number"  aria-describedby="emailHelp" placeholder="Informe o CPF/CNPJ">
    <small id="emailHelp" class="form-text text-muted"> Informa acima o CPF/CNPJ do titular.</small>
    </div>
  <div class="form-group">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="document_type" id="document_type" value="1">
      <label class="form-check-label" for="inlineRadio1">CPF</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="document_type" id="document_type" value="2">
      <label class="form-check-label" for="inlineRadio2">CNPJ</label>
    </div>
    <small id="emailHelp" class="form-text text-muted"> Escolha o tipo de documento.</small>
  </div>
    <!-- CPF/CNPJ -->

    <!-- TIPO DE CONTA -->
  <div class="form-group">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="type" id="type" value="conta_corrente">
      <label class="form-check-label" for="inlineRadio3">Conta Corrente</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="type" id="type" value="conta_poupanca">
      <label class="form-check-label" for="inlineRadio4">Conta Poupança</label>
    </div>
    <small id="emailHelp" class="form-text text-muted"> Selecione o tipo de conta.</small>
  </div>
    <!-- TIPO DE CONTA -->

    <!-- N° DE CONTA -->
  <div class="form-row">
    <div class="col-10">
      <input type="number" id="conta" name="conta"  class="form-control" placeholder="n° da conta" >
      <small id="emailHelp" class="form-text text-muted"> Informe o número da conta e dígito.</small>
    </div>
    <div class="col-2">
      <input type="number" class="form-control" placeholder="dígito" id="conta_dv" name="conta_dv">
    </div>
  </div>
    <!-- N° DE CONTA -->

      <!-- N° DE AGÊNCIA -->
      <div class="form-row">
        <div class="col-10">
          <input type="number" class="form-control" placeholder="n° da agência" id="agencia" name="agencia" >
          <small id="emailHelp" class="form-text text-muted"> Informe o número da agência e dígito.</small>
        </div>
        <div class="col-2">
          <input type="text" class="form-control" placeholder="dígito" id="agencia_dv" name="agencia_dv" >
        </div>
      </div>
      <!-- N° DE AGÊNCIA -->

         <!-- BANCO CÓDIGO -->
         <div class="form-group">
         <select class="custom-select my-1 mr-sm-2" id="bank_code" name="bank_code">
            <option selected>Escolha o banco...</option>
            <option value="341">Itaú</option>
            <option value="033">Santander</option>
            <option value="237">Bradesco</option>
            <option value="756">Bancoob</option>
            <option value="001">Banco do Brasil</option>
            <option value="104">Caixa</option>
          </select>
        </div>
          <!-- BANCO CÓDIGO -->

          <!-- HABILITA ANTECIPAÇÃO DE VALORES -->
         <div class="form-group">
           <select class="custom-select my-1 mr-sm-2" id="transfer_enabled" name="transfer_enabled">
              <option selected>Pagamentos automaticos</option>
              <option value="true">Sim</option>
              <option value="false">Não</option>
            </select>
           <small id="transfer_enabledHelp" class="form-text text-muted">Indica se o recebedor pode receber os pagamentos automaticamente</small>
         </div>
          <!-- HABILITA ANTECIPAÇÃO DE VALORES -->

  <!-- HABILITA ANTECIPAÇÃO DE VALORES -->
  <div class="form-group">
  <select class="custom-select my-1 mr-sm-2" id="transfer_interval" name="transfer_interval">
     <option selected>Frequência de pagamentos</option>
     <option value="daily">Diário</option>
     <option value="monthly">Mensal</option>
     <option value="weekly">Semanal</option>
   </select>
   <small id="transfer_intervalHelp" class="form-text text-muted">Frequência na qual o recebedor irá ser pago.</small>
  </div>
  <!-- HABILITA ANTECIPAÇÃO DE VALORES -->

  	<button type="submit" class="btn btn-primary" name="btn_cadastrarvendedor" > + Add Vendedor</button>
</form>

</div> <!--col-12-->
</div> <!--row-->
</div> <!-- container -->
<?php include('includes/script.php'); ?>
</body>

</html>
