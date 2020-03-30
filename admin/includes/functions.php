<?php
	ini_set('default_charset', 'UTF-8'); 
	date_default_timezone_set('America/Sao_Paulo');
	session_start();
	$db = mysqli_connect('SERVERDB', 'USERNAMEDB', 'PASSWORDDB', 'NAMEDB');

	$nome_usuario = "";
	$email_usuario    = "";
	$errors   = array();

	if (isset($_POST['btn_cadastrarproduto'])) {
		CadastrarProduto();
	}

	if (isset($_POST['btn_cadastrarvendedor'])) {
		CadastrarVendedor();
	}

	if (isset($_POST['registro_btn'])) {
		registro();
	}

	if (isset($_POST['login_btn_vendedores'])) {
		loginVendedores();
	}

	if (isset($_POST['login_btn'])) {
		login();
	}

	 function CadastrarProduto(){
		 global $db, $errors;
		 $nomedoproduto = e($_POST['nomedoproduto']);
		 $adjetivodoproduto = e($_POST['adjetivodoproduto']);
		 $vendidopor =  e($_POST['vendidopor']);
		 $valorproduto =  e($_POST['valorproduto']);
		 $adjetivodoproduto  = e($_POST['adjetivodoproduto']);

		 if (empty($nomedoproduto)) {
			 array_push($errors, "Você precisa informar o nome do produto");
		 }
		 if (empty($valorproduto)) {
			 array_push($errors, "Você precisa informar o valor do produto");
		 }
		 if (empty($adjetivodoproduto)) {
			 array_push($errors, "Você precisa informar o adjetivo do produto");
		 }
		 if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {
		 	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
		 	$nome = $_FILES['arquivo']['name'];

		 	$extensao = strrchr($nome, '.');

		 	$extensao = strtolower($extensao);

		 	if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
		 	{

		 		$novoNome = md5(microtime()) . '.' . $extensao;
		 		// Concatena a pasta com o nome
		 		$destino = 'imagens/' . $novoNome;
		 		// tenta mover o arquivo para o destino
		 		@move_uploaded_file( $arquivo_tmp, $destino  );
		 $fotodoproduto =  $novoNome;
		 $query = "INSERT INTO produtos (nomedoproduto,vendidopor,valorproduto,fotodoproduto,adjetivodoproduto)
					 VALUES('$nomedoproduto','$vendidopor','$valorproduto','$fotodoproduto','$adjetivodoproduto')";
					 mysqli_query($db, $query);
					 header('location: produtos-cadastrado.php');
	 		    }
	 	    }
	 		}
	function CadastrarVendedor(){
	  global $db, $errors;

		$legal_name =  e($_POST['legal_name']);
	  $legal_name =  e($_POST['legal_name']);
	  $document_number =  e($_POST['document_number']);
	  $document_type =  e($_POST['document_type']);
	  $type =  e($_POST['type']);
	  $conta =  e($_POST['conta']);
	  $conta_dv =  e($_POST['conta_dv']);
	  $agencia  =  e($_POST['agencia']);
	  $agencia_dv =  e($_POST['agencia_dv']);
	  $bank_code =  e($_POST['bank_code']);
	  $transfer_enabled =  e($_POST['transfer_enabled']);
	  $transfer_interval =  e($_POST['transfer_interval']);
		$external_id_count = 1234569123812310238;
		$external_id = md5($conta*$agencia+$external_id_count);

	  if (empty($legal_name)) {
	    array_push($errors, "Você precisa informar o nome do vendedor");
	  }
	  if (empty($document_number)) {
	    array_push($errors, "Você precisa informar o CPF/CNPJ");
	  }
	  if (empty($document_type)) {
	    array_push($errors, "Você precisa selecionar o tipo de documento.");
	  }
	  if (empty($type)) {
	    array_push($errors, "Você precisa selecionar o tipo de conta.");
	  }
	  if (empty($conta)) {
	    array_push($errors, "Você precisa informar o número da conta.");
	  }
	  if (empty($conta_dv)) {
	    array_push($errors, "Você precisa informar o digíto da conta.");
	  }
	  if (empty($agencia)) {
	    array_push($errors, "Você precisa informar o número da agência.");
	  }
	  if (empty($agencia_dv)) {
	    array_push($errors, "Você precisa informar o digíto da agência.");
	  }
	  if (empty($bank_code)) {
	    array_push($errors, "Você precisa selecionar o banco.");
	  }
	  if (empty($transfer_enabled)) {
	    array_push($errors, "Você precisa selecionar se o vendedor poderá receber os pagamentos automaticamente");
	  }
	  if (empty($transfer_interval)) {
	    array_push($errors, "Você precisa selecionar a frequência de transferências");
	  }

	  if (count($errors) == 0){
			//
			$pagarme = new PagarMe\Client('SUA-API');
			$recipient = $pagarme->recipients()->create([
			  'external_id' => $external_id,
			  'anticipatable_volume_percentage' => '100',
			  'automatic_anticipation_enabled' => 'true',
			  'bank_account' => [
			  'bank_code' => $bank_code,
			  'agencia' => $agencia,
			  'agencia_dv' => $agencia_dv,
			  'conta' => $conta,
			  'type' => $type,
			  'conta_dv' => '1',
			  'document_number' => $document_number,
			  'legal_name' => $legal_name
			  ],
			  'transfer_day' => '5',
			  'transfer_enabled' => 'true',
			  'transfer_interval' => 'weekly'
			]);
			//
	      $query = "INSERT INTO vendedores (legal_name,document_number,document_type,type,conta,conta_dv,agencia,agencia_dv,bank_code,transfer_enabled,transfer_interval,external_id,recebedorcriado,perfildousuario)
	            VALUES('$legal_name','$document_number','$document_type','$type','$conta','$conta_dv','$agencia','$agencia_dv','$bank_code','$transfer_enabled','$transfer_interval','$external_id','2','2')";
	      mysqli_query($db, $query);
	      // get id of the created user
	      $logged_in_user_id = mysqli_insert_id($db);
	      $_SESSION['usuarios'] = getUserById($logged_in_user_id); // put logged in user in session
	      header('location: vendedores-cadastrados.php');
	    }
	  }

		function formatar($input)
		{
		  if(strlen($input)<=3)
		  { return $input; }
		  $length=substr($input,0,strlen($input)-3);
		  $formatted_input = formatar($length).",".substr($input,-3);
		  return $formatted_input;
		}

		 function ExibeDashboard(){
			 global $db, $errors;
			 $pagarme = new PagarMe\Client('SUA-API');
			 $transactions = $pagarme->balances()->get();
			 foreach($transactions as $waiting_funds => $amount){
			 if ($waiting_funds == "waiting_funds") {
				 echo"<div class='row text-center'>
							 <div class='col'>
							 <div class='card bg-dark'>
								 <div class='card-body'>
							 <div class='counter'>
					 <i class='fa fa-code fa-2x'></i>
					 <h2 class='text-center text-light'>".formatar($amount->amount)."</h2>
							<h5 class='count-text text-light '>Saldo a Receber</h5>
				 </div></div></div></div>";
			 } if ($waiting_funds == "available") {
					 echo"<div class='col'>
					 <div class='card bg-dark'>
						 <div class='card-body'>
								 <div class='counter'>
						 <i class='fa fa-code fa-2x'></i>
					 <h2 class='text-light timer count-title count-number' data-to='".$amount->amount."' data-speed='1500'></h2>
						 <h5 class='count-text text-light '>Saldo Disponível</h5>
					 </div></div>  </div></div>";
			 } if ($waiting_funds == "transferred") {
						echo"<div class='col'>
						<div class='card bg-dark'>
							<div class='card-body'>
									<div class='counter'>
							<i class='fa fa-code fa-2x'></i>
							<h2 class='text-light timer count-title count-number' data-to='".$amount->amount."' data-speed='1500'></h2>
							 <h5 class='count-text text-light '>Saldo Transferido</h5>
						</div></div></div></div>";
					}
				}
			} 

			 function ExibeClientes(){
				 global $db, $errors;
				 $pagarme = new PagarMe\Client('SUA-API');
				// acima a conexão
				 $query = "SELECT * FROM usuarios";
				 $resultado_clientes = mysqli_query($db, $query);
				 while($row_clientes = mysqli_fetch_assoc($resultado_clientes)){
					 echo "<tr>";
					 echo "<th scope='row'>".$row_clientes['idusuarios']."</th>";
					 echo "<td>".$row_clientes['nome_usuario']."</td>";
					 echo "<td>".$row_clientes['email_usuario']."</td>";

					 echo "<td>".$row_clientes['type_usuario']."</td>";
					 echo "<td>".$row_clientes['birthday_usuario']."</td>";
					 echo "<td>".$row_clientes['document_type_usuario']."</td>";
					 echo "<td>".$row_clientes['document_number_usuario']."</td>";
					 echo "<td>".$row_clientes['country_usuario']."</td>";
					 $idexterno = $row_clientes['external_id_usuario'];
					 $customers = $pagarme->customers()->getList([
						 'external_id' => $row_clientes['external_id_usuario']
					 ]);
					 foreach($customers as $object => $external_id){

						 if ($external_id == $idexterno) {
							 echo "<td>Customer Criado</td>";
							 echo "<td>".$external_id->external_id."</td>";
					}
					 }
					 echo "<td>".$row_clientes['external_id_usuario']."</td>";
				 }
			 }

		 function ExibeVendedores(){
			 global $db, $errors;
			 $pagarme = new PagarMe\Client('SUA-API');
			// acima a conexão
			 $query = "SELECT * FROM vendedores";
			 $resultado_vendedores = mysqli_query($db, $query);
			 while($row_vendedores = mysqli_fetch_assoc($resultado_vendedores)){
				 echo "<tr>";
				 echo "<th scope='row'>".$row_vendedores['idvendedores']."</th>";
				 echo "<td>".$row_vendedores['legal_name']."</td>";
				 echo "<td>".$row_vendedores['document_number']."</td>";
				 echo "<td>".$row_vendedores['document_type']."</td>";
				 echo "<td>".$row_vendedores['conta']." - ".$row_vendedores['conta_dv']."</td>";
				 echo "<td>".$row_vendedores['agencia']." - ".$row_vendedores['agencia_dv']."</td>";
				 echo "<td>".$row_vendedores['type']."</td>";
				 echo "<td>".$row_vendedores['bank_code']."</td>";
				 $recipients = $pagarme->recipients()->getList([
					 'external_id' => $row_vendedores['external_id']
				 ]);
				 foreach($recipients as $object => $external_id){
					 if ($external_id == $external_id) {
						 echo "<td>Recebedor Integrado</td>";
	 			    echo "<td>".$external_id->external_id."</td>";
	 			};
	 			}
		  }
		} 
		 function ExibeProdutosLista(){
		   global $db, $errors;
		   $query = "SELECT * FROM produtos";
		   $resultado_produtos = mysqli_query($db, $query);
		   while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){
		   echo "<tr>";
		   echo "<th scope='row'>".$row_produtos['idprodutos']."</th>";
		   echo "<td>".$row_produtos['nomedoproduto']."</td>";
		   echo "<td>".$row_produtos['valorproduto']."</td>";
		   echo "<td>".$row_produtos['adjetivodoproduto']."</td>";
		   echo "<td>".$row_produtos['vendidopor']."</td>";
		   echo "<td>";
			 echo "<button type='submit' class='btn btn-success' name='remover-produto' id='remover-produto'>Editar</button> ";
			 echo "<button type='submit' class='btn btn-danger' name='remover-produto' id='remover-produto'>Remover</button>";
			 echo "</td>";
		   }
		    } 

				 function ExibeTransacoesLista(){
					 global $db, $errors;
					 $statuspreciso = 'authorized';
					 $pagarme = new PagarMe\Client('SUA-API');
					 $transactions = $pagarme->transactions()->getList();
						 foreach($transactions as $object => $transaction){
							 if ($transaction->status == $statuspreciso) {
								echo "<td>".$transaction->id."</td>";
								echo "<td>".$transaction->status."</td>";
								echo "<td>".$transaction->amount."</td>";
								echo "<td>".$transaction->payment_method."</td>";
								echo "<td>".$transaction->card_holder_name."</td>";
								echo "<td>";
								echo "<a href='#' id='simularcaptura' class='btn btn-primary'>Capturar</a>";
								echo "</td>";
								$capturedTransaction = $pagarme->transactions()->capture([
  								'id' => $transaction->id,
  								'amount' => $transaction->amount
								]);

						};
					}
				 } 

		 function ExibeProdutos(){
			 global $db, $errors;
			 $query = "SELECT * FROM produtos
			 INNER JOIN vendedores ON produtos.vendidopor = vendedores.idvendedores";
			 $resultado_produtos = mysqli_query($db, $query);
			 while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){
				 $valor = str_replace("." , "" , $row_produtos['valorproduto'] ); // Primeiro tira os pontos
				 $idproduto = $row_produtos['idprodutos'];
				 echo"<script>
				     $(document).ready(function() {
				         var button = $('#pay-button".$idproduto."');
				         button.click(function() {
				             // INICIAR A INSTÂNCIA DO CHECKOUT
				             // declarando um callback de sucesso
				             var checkout = new PagarMeCheckout.Checkout({'encryption_key':'ek_test_xYJENgrnTpEfy172Cg8FARfHldoXCN', success: function(data) {
				                 console.log(data);
				                 //Tratar aqui as ações de callback do checkout, como exibição de mensagem ou envio de token para captura da transação
				             }});
				             // DEFINIR AS OPÇÕES
				             // e abrir o modal
				             // É necessário passar os valores boolean em 'var params' como stringlocalhost:8090/pagarme/postback.php
				             // NOVO BUG TRANSAÇÃO NÃO CRIADA
				             //reference_key se torna em pagar.me external_id
				             var params = {
				               'reference_key': 'REFERENCIADATRANS2019',
				               'amount':".$valor.",
				               'buttonText':'Pagar',
				               'customerData':'true',
				               'paymentMethods':'boleto,credit_card',
				               'maxInstallments':12,
				               'uiColor':'#1a6ee1',
				               'postbackUrl':'localhost:8090/pagarme/postback.php',
				               'createToken':'true',
				               'interestRate':1,
				               'freeInstallments':3,
				               'defaultInstallment':5,
				               'headerText':'Título'
				             };
				             checkout.open(params);
				         });
				     });
				 </script>";
				 echo"<div class='col-md-4'>
				 	<figure class='card card-product'>
					<h4 class='title text-center'>".$row_produtos['nomedoproduto']."</h4>
				 		<div class='img-wrap'><img src='admin/imagens/".$row_produtos['fotodoproduto']."'> </div>
				 		<figcaption class='info-wrap'>
						<p class='desc text-center'>".$row_produtos['nomedoproduto']." - ".$row_produtos['adjetivodoproduto']."</p>
							<h6 class='text-center'> <span class='badge badge-secondary'>Produto vendido e entregue por ".$row_produtos['legal_name']."</span></h6>
				 		</figcaption>
				 		<div class='bottom-wrap'>";
						if (!isLoggedIn()==false) {
						echo "<button id='pay-button".$idproduto."' class='btn btn-lg btn-primary float-right'>Comprar</button>";
					}else {
						echo "<!-- Botão para acionar modal -->
						<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalExemplo'>Comprar</button>
						<!-- Modal -->
						<div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
						  <div class='modal-dialog' role='document'>
						    <div class='modal-content'>
						      <div class='modal-header'>
						        <h5 class='modal-title' id='exampleModalLabel'>Alerta</h5>
						        <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
						          <span aria-hidden='true'>&times;</span>
						        </button>
						      </div>
						      <div class='modal-body'>
						        <h6>Você precisa realizar login, para então comprar !</h6>
						      </div>
						      <div class='modal-footer'>
						        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
										<a class='btn btn-primary' href='login.php'>login</a>
						      </div>
						    </div>
						  </div>
						</div>";
					}
					echo $row_produtos['valorproduto'];
							echo "<div class='price-wrap h5'>	<h2 class='text-dark'>".$row_produtos['valorproduto']."</h2>";

								//$valor = str_replace("." , "" , $row_produtos['valorproduto'] ); // Primeiro tira os pontos
								//$valor = str_replace("," , "" , $row_produtos['valorproduto']); // Depois tira a vírgula".
								//echo $valor;
				 			echo"	</div> <!-- price-wrap.// -->
				 		</div> <!-- bottom-wrap.// -->
				 	</figure>
				 </div> <!-- col // -->";
			 }
				} // fim da ExibeProdutos
	//botão de ação para logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['usuarios']);
		header("location: index.php");
	}
	//function que registra usuário no banco de dados
	function registro(){
		global $db, $errors;
		// Recebe todos os valores do formulário por meio de POST
		$nome_usuario      =  e($_POST['nome_usuario']);
		$email_usuario     =  e($_POST['email_usuario']);
		$type_usuario			 =  e($_POST['type_usuario']);
		$country_usuario   =  e($_POST['country_usuario']);
		$birthday_usuario  =  e($_POST['birthday_usuario']);
		$phone_numbers_usuario 		= e($_POST['phone_numbers_usuario']);
		$document_type_usuario		 =	e($_POST['document_type_usuario']);
		$document_number_usuario		= e($_POST['document_number_usuario']);
		$senhadousuario_1  =  e($_POST['senhadousuario_1']);
		$senhadousuario_2  =  e($_POST['senhadousuario_2']);
		$external_id_usuario = $document_number_usuario;
		// Validação de formulário: verifica se os dados estão ok
		if (empty($nome_usuario)) {
			array_push($errors, "Você precisa informar o seu nome completo.");
		}
		if (empty($email_usuario)) {
			array_push($errors, "Você precisa informar um e-mail.");
		}
		if (empty($country_usuario)) {
			array_push($errors, "Você precisa informar o país.");
		}
		if (empty($birthday_usuario)) {
			array_push($errors, "Você precisa informar a data de seu aniversário.");
		}
		if (empty($phone_numbers_usuario)) {
			array_push($errors, "Você precisa informar um telefone.");
		}
		if (empty($document_number_usuario)) {
			array_push($errors, "Você precisa informar o número do CPF/CNPJ.");
		}
		if (empty($senhadousuario_1)) {
			array_push($errors, "Você precisa informar a senha do usuário");
		}
		if ($senhadousuario_1 != $senhadousuario_2) {
			array_push($errors, "A senha e confirmação não são iguais");
		}
		// registrar usuário se não houver erros no formulário
		if (count($errors) == 0) {
			$senha = md5($senhadousuario_1);
			//criptografar a senha antes de salvar no banco de dados
				$query = "INSERT INTO usuarios (nome_usuario,email_usuario,external_id_usuario,type_usuario,country_usuario,birthday_usuario,phone_numbers_usuario,document_type_usuario,document_number_usuario,senhadousuario_usuario,perfildousuario_usuario)
						  VALUES('$nome_usuario','$email_usuario','$external_id_usuario','$type_usuario','$country_usuario','$birthday_usuario','$phone_numbers_usuario','$document_type_usuario','$document_number_usuario','$senha','2')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['usuarios'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "Você está logado";
				header('location: index.php');
		}
	}
	// Retornar usuário pelo ID
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM usuarios WHERE idusuarios=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}
	// LOGIN USER
	function loginVendedores(){
		global $db, $username, $errors;
		// pega dados do form
		$email = e($_POST['email']);
		$senha = e($_POST['senha']);
		// make sure form is filled properly
		if (empty($email)) {
			array_push($errors, "Informe o e-mail");
		}
		if (empty($senha)) {
			array_push($errors, "Informe a senha");
		}
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$senha = md5($senha);
			$query = "SELECT * FROM vendedores WHERE email='$email' AND senhadousuario='$senha' LIMIT 1";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['perfildousuario'] == '1') {

					$_SESSION['usuarios'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}else{
					$_SESSION['usuarios'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}
			}else {
				array_push($errors, "Combinação de nome de usuário / senha incorreta");
			}
		}
	}
	// Login Usuário
	function login(){
		global $db, $username, $errors;

		// pega dados do form
		$email = e($_POST['email']);
		$senha = e($_POST['senha']);
		if (empty($email)) {
			array_push($errors, "Informe o e-mail");
		}
		if (empty($senha)) {
			array_push($errors, "Informe a senha");
		}
		if (count($errors) == 0) {
			$senha = md5($senha);
			$query = "SELECT * FROM usuarios WHERE email_usuario='$email' AND senhadousuario_usuario='$senha' LIMIT 1";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				// verificar nivel de acesso
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['perfildousuario'] == '1') {
					$_SESSION['usuarios'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}else{
					$_SESSION['usuarios'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}
			}else {
				array_push($errors, "Combinação de nome de usuário / senha incorreta");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['usuarios'])) {
			return true;
		}else{
			return false;
		}
	}
	function isAdmin()
	{
		if (isset($_SESSION['usuarios']) && $_SESSION['usuarios']['perfildousuario'] == '1' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="alert alert-danger" role="alert">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
?>
