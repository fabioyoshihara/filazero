<?php
session_start();

if ($_SESSION["nome"] == null)
{
  header("Location: index.php");
  exit();
}
else{
  

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
    <h1>Carrinho.php</h1>
    <img class= "ornaments" src="img/ornaments-filazero.svg" alt="ornaments">
  
    <table>
                <tr>
                  <th>código do pedido</th>
                  <th>produto</th> 
                  <th>quantidade</th> 
                  <th>preço unitário</th>
                  <th>preço total</th>

                </tr>
                <tr>
                    <td>#001</td>
                    <td>Canjica</td>
                    <td>04</td>
                    <td>R$12,00</td>
                    <td>R$48,00</td>
                    <td><button>limpar</button></td>
                </tr>
    </table>
            <h3>total<input type="text" id="total" name="total" placeholder="total a pagar"></h3>
            
            <a href="pagamento.php">pagar</a><br>
            
            <a href="home.php">continuar comprando</a>

  </section>
