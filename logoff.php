<?php
    session_start();
    $_SESSION["codigo"] = null;
    $_SESSION["cpf"] =  null;
    $_SESSION["nome"] = null;

    header("Location: index.php");
    exit();
?>