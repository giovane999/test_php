<?php

switch ($_SERVER['PHP_SELF'])
{
    case '/listar-usuarios,php':
        require_once 'listar-usuarios.php';
        break;
    default:
        require_once 'cadastrar-clientes.php';

}
