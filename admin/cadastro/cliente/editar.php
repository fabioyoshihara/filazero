<?php
 
    require "src/conexao-bd.php";
    require "src/Modelo/Cliente.php";
    require "src/Repositorio/ClienteRepositorio.php";


    if (isset($_POST['cadastrocliente']))
    {
        $cliente = new Cliente
           ($_GET['id'],
            $_POST['cpf'],
            $_POST['nome'],
            $_POST['sobrenome'],
            $_POST['email'],
            $_POST['celular'],
            $_POST['senha'],
          
        );
           
        $clienteRepositorio = new ClienteRepositorio($pdo);
        $clienteRepositorio->atualizar($cliente);

        header("Location: index.php");

    }

    $clienteRepositorio = new ClienteRepositorio($pdo);
    $cliente = $clienteRepositorio->buscar($_GET['id']);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/index.css">
    <link rel="stylesheet" href="../../../css/admin.css">
    <link rel="stylesheet" href="../../../css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../../../img/logo_fila_zero.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>filazero - Edição de Clientes</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="../../../img/logo_fila_zero.svg" class="logo-admin" alt="logo-serenatto">
        <h1>Editar Cliente</h1>
        <img class= "ornaments" src="../../../img/ornaments-filazero.svg" alt="ornaments">
    </section>
    <section class="container-form">
        
        <form method="post" enctype="multipart/form-data">

            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF" value="<?= $cliente->getCpf() ?>" required>
        
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" value="<?= $cliente->getNome() ?>" required>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" placeholder="Digite o seu sobrenome" value="<?= $cliente->getSobrenome() ?>" required>

            <label for="email">e-mail</label>
            <input type="text" name="email" placeholder="Digite seu e-mail" value="<?= $cliente->getEmail() ?>">

            <label for="celular">Celular</label>
            <input type="text" name="celular" placeholder="Digite o número do celular com ddd (só números)" value="<?= $cliente->getCelular() ?>">

            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Crie uma senha" value="<?= $cliente->getSenha() ?>">



            <input type="submit" name="cadastrocliente" class="botao-cadastrar" value="Atualizar cliente"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>