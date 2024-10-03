<?php
    require "src/conexao-bd.php";
    require "src/Modelo/carrinho.php";
    require "src/Repositorio/carrinhoRepositorio.php";
    
    $carrinhoRepositorio = new carrinhoRepositorio($pdo);
    $carrinhoRepositorio->deletar($_GET['id'], $_GET['idproduto']);

    header("Location: carrinho.php");
?>