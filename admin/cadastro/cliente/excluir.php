<?php
    require "src/conexao-bd.php";
    require "src/Modelo/Cliente.php";
    require "src/Repositorio/clienteRepositorio.php";
    
    $clienteRepositorio = new ClienteRepositorio($pdo);
    $clienteRepositorio->deletar($_GET['id']);

    header("Location: index.php");
?>