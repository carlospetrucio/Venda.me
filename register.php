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
<link rel="stylesheet" href="admin/includes/css/bootstrap.min.css">
<script src="admin/includes/js/bootstrap.min.js"></script>
<script src="admin/includes/js/jquery.min.js"></script>
<link rel="stylesheet" href="admin/includes/css/bootstrap-reset.css">
	<title>Venda.me -Registro</title>
</head>
<body>

	<?php include('includes/navbar.php') ?>
<br>
	<div class="container px-lg-5 border border-dark">
	<div class="row mx-lg-n5">
	<div class="col-sm-12 py-3">

	<div class="header">
		<h2>Criar Conta</h2>
	</div>

	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<!-- EMAIL DO USUÁRIO -->
		<div class="form-group">
		<input type="email" class="form-control" id="email_usuario" name="email_usuario" value="<?php echo $email_usuario; ?>" aria-describedby="emailHelp" placeholder="seuendereco@email.com">
		<small id="email_usuario_nameHelp" class="form-text text-muted"> Digite seu melhor e-mail</small>
		</div>
		<!-- EMAIL DO USUÁRIO -->

		<!-- NOME DO USUÁRIO -->
    <div class="form-group">
    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" value="<?php echo $nome_usuario; ?>" aria-describedby="emailHelp" placeholder="Nome">
    <small id="nome_usuario_nameHelp" class="form-text text-muted"> Digite seu nome completo, sem abreviações</small>
    </div>
    <!-- NOME DO USUÁRIO -->

		<!-- DATA DE NASCIMENTO -->
		<div class="form-group">
		<input type="date" class="form-control" id="birthday_usuario" name="birthday_usuario" aria-describedby="emailHelp" placeholder="Nome">
		<small id="nome_usuario_nameHelp" class="form-text text-muted">Qual a sua data de nascimento ?</small>
		</div>
		<!-- DATA DE NASCIMENTO -->

		<!-- TELEFONE DE CONTATO -->
		<div class="form-group">
		<input type="number" class="form-control" id="phone_numbers_usuario" name="phone_numbers_usuario" aria-describedby="emailHelp" placeholder="(XX) XXXX-XXXX">
		<small id="nome_usuario_nameHelp" class="form-text text-muted">Informe ao menos um telefone</small>
		</div>
		<!-- TELEFONE DE CONTATO -->

		<!-- DOCUMENTO -->
		<div class="form-group">
		<select class="custom-select my-1 mr-sm-2" id="document_type_usuario" name="document_type_usuario">
			 <option selected>Tipo de documento</option>
			 <option value="cpf">CPF</option>
			 <option value="cnpj">CNPJ</option>
		 </select>
		</div>

		<div class="form-group">
		<input type="number" class="form-control" id="document_number_usuario" name="document_number_usuario" aria-describedby="emailHelp" placeholder="1234567890 (Somente números)">
		<small id="document_number_nameHelp" class="form-text text-muted">Informe o CPF/CNPJ </small>
		</div>
		<!-- DOCUMENTO -->


		<!-- PAÍS -->
		<div class="form-group">
		<select class="custom-select my-1 mr-sm-2" id="country_usuario" name="country_usuario">
			 <option selected>Escolha o seu país</option>
			 <option value="br">Brasil</option>
		 </select>
		</div>
		<!-- PAÍS -->

		<!-- TIPO DE CONTA DO USUÁRIO -->
		<div class="form-group">
		<select class="custom-select my-1 mr-sm-2" id="type_usuario" name="type_usuario">
			 <option selected>Tipo de conta</option>
			 <option value="individual">Pessoa Fisica</option>
			 <option value="corporation">Pessoa Juridica</option>
		 </select>
		 <small id="email_usuario_nameHelp" class="form-text text-muted">Pessoa Fisica -> CPF  | Pessoa Juridica -> CNPJ</small>
		</div>
		<!-- TIPO DE CONTA DO USUÁRIO -->

		<!-- SENHA DO USUÁRIO -->
		<div class="form-group">
		<input type="password" class="form-control" id="senhadousuario_1" name="senhadousuario_1" aria-describedby="emailHelp" placeholder="Senha de acesso">
		<small id="nome_usuario_nameHelp" class="form-text text-muted">Digite uma senha para a sua conta venda.me</small>
		</div>

		<div class="form-group">
		<input type="password" class="form-control" id="senhadousuario_2" name="senhadousuario_2" aria-describedby="emailHelp" placeholder="Confirmação de senha de acesso">
		<small id="nome_usuario_nameHelp" class="form-text text-muted">Confirme a senha</small>
		</div>
		<!-- SENHA DO USUÁRIO -->



		<div class="input-group">
			<button type="submit" class="btn btn-success" name="registro_btn">Criar conta</button>
		</div>
		<p>
			Já é membro? <a href="login.php">Sign in</a>
		</p>
	</form>

</div> <!-- container -->
</div> <!-- r o w --->
</div> <!-- col-12 -->
</body>
</html>
