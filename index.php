<?php
 
    require "src/conexao-bd.php";
    require "src/Modelo/Cliente.php";
    require "src/Repositorio/ClienteRepositorio.php";

    if (isset($_POST['botaoEntrar']))
    {
        $cliente = new Cliente
        (null,
         $_POST['cpf'],
          '',
          '',
          '',
          '',
          $_POST['senha']
        );
           
        $clienteRepositorio = new ClienteRepositorio($pdo);
        $result = $clienteRepositorio->entrar($cliente);

        if ($result != null)
        {
          $cliente = $clienteRepositorio->buscar($result);
          session_start();
          $_SESSION["codigo"] =  $cliente->getCod_cliente();
          $_SESSION["cpf"] =  $cliente->getCpf();
          $_SESSION["nome"] = $cliente->getNome();
          
          header("Location: home.php");
          exit();
        }
        else
        {
          $erro = "Erro no login";
          echo $erro;
        }
      }
?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="img/logo_fila_zero.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Filazero - Login</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo_fila_zero.svg" class="logo-admin" alt="logo-filazero">
    <h1>Login Filazero</h1>
    <img class= "ornaments" src="img/ornaments-filazero.svg" alt="ornaments">
  </section>
  <section class="container-form">
  <form method="post">

    <label for="cpf">CPF</label>
    <input type="cpf" name="cpf" id="cpf" placeholder="Digite o seu cpf" required>

    <label for="password">Senha</label>
    <input type="password" name="senha" id="password" placeholder="Digite a sua senha" required>

    <input type="submit"  name="botaoEntrar" class="botao-entrar" value="Entrar"/><br>

    <section class="container-table">
      <a href="recuperar_senha.php">esqueci minha senha</a><br>
      <a href="/admin/cadastro/cliente/form.php">Novo Cadastro</a><br>
      <a href="sobre_o_aplicativo.php">sobre o aplicativo</a>
    </section>    
  </form>
  
  </section>
</main>
</body>
</html>