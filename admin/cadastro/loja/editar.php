<?php
 
    require "src/conexao-bd.php";
    require "src/Modelo/loja.php";
    require "src/Repositorio/LojaRepositorio.php";


    if (isset($_POST['cadastroloja']))
    {
        $loja = new Loja
           ($_GET['id'],
            $_POST['cnpj'],
            $_POST['nome'],
            $_POST['celular'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['lojista'],
          
        );
           
        $lojaRepositorio = new lojaRepositorio($pdo);
        $lojaRepositorio->atualizar($loja);

        header("Location: index.php");

    }

    $lojaRepositorio = new lojaRepositorio($pdo);
    $loja = $lojaRepositorio->buscar($_GET['id']);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../css/reset.css">
    <link rel="stylesheet" href="../../../../css/index.css">
    <link rel="stylesheet" href="../../../../css/admin.css">
    <link rel="stylesheet" href="../../../../css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../../../../img/logo_fila_zero.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>filazero - Editar Loja</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="../../../../img/logo_fila_zero.svg" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Lojas</h1>
        <img class= "ornaments" src="../../../../img/ornaments-filazero.svg" alt="ornaments">
    </section>
    <section class="container-form">
        
        <form method="post" enctype="multipart/form-data">
            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" placeholder="Digite o CNPJ" value="<?= $loja->getCnpj() ?>" required>

            <label for="nome">Nome da Loja</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome da loja"value="<?= $loja->getNome() ?>" required>

            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" placeholder="Digite o número do celular"value="<?= $loja->getCelular() ?>" required>

            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" placeholder="Digite o E-Mail"value="<?= $loja->getEmail() ?>" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a senha"value="<?= $loja->getSenha() ?>" required>

            <label for="lojista">Nome do Lojista</label>
            <input type="text" id="lojista" name="lojista" placeholder="Digite o nome do lojista"value="<?= $loja->getNomelojista() ?>" required>

            <input type="submit" name="cadastroloja" class="botao-cadastrar" value="atualizar loja"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>