<?php
    
    $pdo = new PDO('mysql:host=localhost;dbname=filazero', 'filazero', 'filazero');
    require "src/Modelo/Cliente.php";
    require "src/Repositorio/clienteRepositorio.php";
 
    $clienteRepositorio = new ClienteRepositorio($pdo);
    $clientes = $clienteRepositorio->buscarTodos();
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
    <title>filazero - Lista de Clientes</title>
</head>
<body>
<main>
<section class="container-table">
  <table>
      <thead>
        <tr>
          <th>CPF</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>e-mail</th>
          <th>celular</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
              <td><?= $cliente->getCpf() ?></td>
              <td><?= $cliente->getNome() ?></td>
              <td><?= $cliente->getSobrenome() ?></td>
              <td><?= $cliente->getEmail() ?></td>
              <td><?= $cliente->getCelular() ?></td>
              <td><a class="botao-editar" href="editar.php?id=<?= $cliente->getCod_cliente() ?>">Editar</a></td>
              <td><a class="botao-excluir" href="excluir.php?id=<?= $cliente->getCod_cliente() ?>">Excluir</a></td>
              
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a class="botao-cadastrar" href="form.php">Cadastrar Cliente</a>
  <form action="gerador-pdf.php" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>
</main>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>