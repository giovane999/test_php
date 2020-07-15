 
<?php require_once 'includes/head.php'?>
<?php require_once 'includes/header.php'?>

<?php
    require_once 'config/autoload.php';
    $cliente = new Cliente();
    $res = $cliente->listaCliente($cliente);
?>
 
<div class="container">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Cpf</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>  
    <?php foreach($res as $cliente) : ?>
        <tr>
            <td><?= htmlspecialchars($cliente['id']); ?></td>
            <td><?= htmlspecialchars($cliente['nome']); ?></td>
            <td><?= htmlspecialchars($cliente['sobrenome']); ?></td>
            <td><?= htmlspecialchars($cliente['email']); ?></td>
            <td><?= htmlspecialchars($cliente['cpf']); ?></td>
            <td><?= htmlspecialchars($cliente['telefone']); ?></td>
            <td><a class="btn btn-danger" href="remover-cliente/<?= $cliente['id']?>">Remover</a> </td>
            <td><a class="btn btn-primary" href="editar-cliente/<?= $cliente['id']?>">Editar</a> </td>
        </tr>
    <?php endforeach ?>
 
  </tbody>
</table>
</div>

<?php require_once 'includes/footer.php'?>