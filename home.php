<?php
session_start();

if ($_SESSION["nome"] == null)
{
  header("Location: index.php");
  exit();
}
else
{
  
    require "src/conexao-bd.php";
    require "src/Modelo/Loja.php";
    require "src/Modelo/Produto.php";
    require "src/Repositorio/lojaRepositorio.php";
    require "src/Repositorio/produtoRepositorio.php";
    
    $produtoRepositorio = new produtoRepositorio($pdo);
    $lojaRepositorio = new lojaRepositorio($pdo);
    $lojas = $lojaRepositorio->buscarTodos();
    
    
    if (isset($_POST['botaoComprar']))
    {
        require "src/Modelo/pedido.php";
        require "src/Repositorio/pedidoRepositorio.php";

        $pedidoRepositorio = new pedidoRepositorio($pdo);

        $pedido = new Pedido (null, $_POST['codigoCliente'], 1, '');

        $existe =  $pedidoRepositorio->existe($_POST['codigoCliente']);

        

        if ($existe != null)
        {
            $pedidoRepositorio->salvarProdutoPedido($existe, $_POST['codigoProduto'], $_POST['qtde']);
        }
        else
        {
            $pedidoRepositorio->salvarPedido($pedido);
            $existe =  $pedidoRepositorio->existe($_POST['codigoCliente']);
            $pedidoRepositorio->salvarProdutoPedido($existe, $_POST['codigoProduto'], $_POST['qtde']);
        }

        header("Location: carrinho.php");
        exit();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/logo_fila_zero.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>filazero - cardápio</title>
</head>
<body>
    <main>
    <section class="container-table"> 
        <h2>Olá, <?=$_SESSION["nome"];?>!</h2>
        <h2>O que vai querer?</h2>    
        <a class="botao-cadastrar" href="logoff.php">Logoff</a><br>
        <a class="botao-cadastrar" href="carrinho.php">carrinho</a>
    </section>

        <section class="container-banner">
            <div class="">
                
            </div>
        </section>


        
    

        <?php foreach ($lojas as $loja):?>
            <?php
                    $produtos = $produtoRepositorio->buscarprodutoloja($loja->getCodigo()); 
            ?>

            <section class="container-cafe-manha">
                <div class="container-cafe-manha-titulo">
                    <h3>cardápio <?=$loja->getNome()?> </h3>
                    <img class= "ornaments" src="img/ornaments-filazero.svg" alt="ornaments">    
                </div>
                <div class="container-cafe-manha-produtos">
                <?php foreach ($produtos as $produto):?>
                    <form method="post">
                        <input type="hidden" name="codigoProduto" value="<?=$produto->getcodigoProduto()?>">
                        <input type="hidden" name="codigoCliente" value="<?=$_SESSION["codigo"]?>">
                        <input type="hidden" name="qtde" value="1">
                        <div class="container-produto">
                            <div class="container-foto">
                            <img src="<?= $produto->getImagemDiretorio()?>">
                            </div>
                            <p><?= $produto->getNome()?></p>
                            <p><?= $produto->getDescricao()?></p>
                            <p><?= $produto->getPrecoFormatado() ?></p>
                            <input type="submit" name="botaoComprar" class="botao-cadastrar" value="Comprar"/>
                            <br>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </section>

        <?php endforeach; ?>


        
    </main>
</body>
</html>