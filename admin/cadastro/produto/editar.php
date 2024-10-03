<?php 
    
    require "../../../src/conexao-bd.php";
    require "../../../src/Modelo/produto.php";
    require "../../../src/Repositorio/produtoRepositorio.php";
    require "../../../src/Modelo/loja.php";
    require "../../../src/Repositorio/lojaRepositorio.php";

    if (isset($_POST['cadastroproduto']))
    {
        $produto = new Produto
           ($_GET['id'],
            $_POST['codigoLoja'],
            $_POST['nome'],
            $_POST['descricao'],
            "logo_fila_zero.svg",
            $_POST['preco'],
            $_POST['tamanho'],
            $_POST['tempo']
        );

        if ( isset($_FILES['imagem']) && $_FILES['imagem']['name'] != "")
        {
            $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
            move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
        }
        else{
            $produto->setImagem($_POST['imagemCorreto']);
        }
           
        $produtoRepositorio = new ProdutoRepositorio($pdo);
        $produtoRepositorio->atualizar($produto);

        header("Location: index.php");

    }

    $produtoRepositorio = new ProdutoRepositorio($pdo);
    $lojaRepositorio = new LojaRepositorio ($pdo);
    $produto = $produtoRepositorio->buscar($_GET['id']);
    $loja = $lojaRepositorio->buscar($produto->getcodigoLoja());
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
    <title>filazero - Cadastrar Produto</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <img src="../../../../img/logo_fila_zero.svg" class="logo-admin" alt="logo-serenatto">
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="../../../../img/ornaments-filazero.svg" alt="ornaments">
    </section>
    <section class="container-form">
        
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" id="codigoLoja" name="codigoLoja" value="<?= $produto->getcodigoLoja() ?>">

            <label for="nome">Loja</label>
            <input type="text" value="<?= $loja->getNome() ?>" readonly>

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto"value="<?= $produto->getNome() ?>" required>

            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição"value="<?= $produto->getDescricao() ?>" required>

            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite uma preço"value="<?= $produto->getPreco() ?>" required>

            <label for="tamanho">Tamanho</label>
            <input type="text" id="tamanho" name="tamanho" placeholder="Digite um tamanho"value="<?= $produto->getTamanho() ?>" required>

            <label for="tempo">Tempo</label>
            <input type="text" id="tempo" name="tempo" placeholder="Digite um tempo de preparo"value="<?= $produto->getTempo() ?>" required>

            <label for="imagem">Envie uma imagem do produto</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
            <input type="hidden" id="imagemCorreto" name="imagemCorreto" value="<?= $produto->getImagem() ?>">

            <input type="submit" name="cadastroproduto" class="botao-cadastrar" value="atualizar produto"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>