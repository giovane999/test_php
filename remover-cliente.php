<?php

    require_once 'config/autoload.php';
    $cliente = new Cliente();
    $cliente->id = addslashes($_GET['id']); // Pega Id

    require_once 'includes/head.php';
    $cliente->removerCliente($cliente);


