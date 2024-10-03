<?php
session_start();

if ($_SESSION["nome"] == null)
{
  header("Location: index.php");
  exit();
}
else{
  
  require "src/conexao-bd.php";
  require "src/Modelo/Carrinho.php";
  require "src/Repositorio/carrinhoRepositorio.php";
  require "src/Repositorio/pedidoRepositorio.php";

  $pedidoRepositorio = new pedidoRepositorio($pdo);
  $existe =  $pedidoRepositorio->existe($_SESSION["codigo"]);

  $precoTotal = 0;

  if ($existe != null)
  {
    $carrinhoRepositorio = new carrinhoRepositorio($pdo);
    $pedido = $carrinhoRepositorio->buscarPedido($existe); 
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
  <title>Filazero - carrinho</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo_fila_zero.svg" class="logo-admin" alt="logo-filazero">
    <h1>Carrinho</h1>
    <img class= "ornaments" src="img/ornaments-filazero.svg" alt="ornaments">
  

    <?php
if (isset($pedido)) {
    ?>
    <section class="container-table">
        <table>
            <thead>
                <tr>
                    <th>Código do Pedido</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Preço Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $precoTotal = 0;
                foreach ($pedido as $carrinho):
                    $precoTotal += $carrinho->getprecoTotal();
                ?>
                    <tr>
                        <td><?= $carrinho->getcodigoPedido() ?></td>
                        <td><?= $carrinho->getnomeProduto() ?></td>
                        <td><?= $carrinho->getqtde() ?></td>
                        <td><?= $carrinho->getprecoProduto() ?></td>
                        <td><?= $carrinho->getprecoTotal() ?></td>
                        <td><a class="botao-excluir" href="excluir.php?id=<?= $carrinho->getcodigoPedido() ?>&idproduto=<?=$carrinho->getcodigoProduto()?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total:</td>
                    <td><?= $precoTotal ?></td>
                </tr>
            </tfoot>
        </table>
    </section>    
    <?php
} else {
    echo "Seu carrinho está vazio!";
}
?>  
</table>

            
            
            <a class="botao-cadastrar" href="pagamento.php">pagar</a><br>
            
            <a class="botao-cadastrar" href="home.php">continuar comprando</a>




  </section>
