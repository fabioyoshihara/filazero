<?php
    require "src/conexao-bd.php";
    require "src/Modelo/Loja.php";
    require "src/Repositorio/lojaRepositorio.php";
    
    $lojaRepositorio = new LojaRepositorio($pdo);
    $lojaRepositorio->deletar($_GET['id']);

    header("Location: index.php");
?>