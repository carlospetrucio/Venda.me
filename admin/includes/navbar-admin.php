<!-- navbar vendedores -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">VendaMe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="produto-novo.php">Novo Produto</a>
          <a class="dropdown-item" href="produtos-cadastrados.php">Produtos Cadastrados</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vendedores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="vendedor-novo.php">Novo Vendedor</a>
          <a class="dropdown-item" href="vendedores-cadastrados.php">Vendedores Cadastrados</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!---<a class="dropdown-item" href="cliente-novo.php">Novo Vendedor</a>--->
          <a class="dropdown-item" href="clientes-cadastrados.php">Clientes Cadastrados</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!---<a class="dropdown-item" href="cliente-novo.php">Novo Vendedor</a>--->
          <a class="dropdown-item" href="simular-captura.php">Simular Captura</a>
        </div>
      </li>

    </ul>
    <div class="form-inline my-2 my-lg-0">
      <a href="index.php?logout='1'" class="btn btn-success my-2 my-sm-0">Sair</a>
    </div>
  </div>
</nav><br><br>
<!-- navbar vendedores -->
