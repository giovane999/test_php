<?php

class Conexao
{
    public static function db()
    {
        $db = new PDO('mysql:host=localhost;dbname=db_cadastro', 'root', '') or die ("Não foi possível conectar-se ao servidor MySQL [1]");
        return $db;
    } 
}
