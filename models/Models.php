<?php
require_once 'config/db.php';

class Models
{
    public function SelectId($models)
    {
        $db = Conexao::db();
        $query = "SELECT * FROM tb_clientes WHERE id = '$models->id'"; // Seleciona todos pelo id
        $res = $db->query($query);
        $res = $res->fetchAll(); // Retorna array do banco
        return $res;
    }

    public function RemoveId(Cliente $models)
    {
        $db = Conexao::db();
        $query = "DELETE FROM tb_clientes WHERE id = '$models->id'";
        $res = $db->query($query);
        return $res;
    }

    public function SelectEmail(Cliente $models)
    {
        $db = Conexao::db();
        $query = "SELECT * FROM tb_clientes WHERE email = '$models->email'";
        $res = $db->query($query);
        $res = $res->fetchAll(); // Retorna array do banco
        return $res;
    }

    public function SelectCpf(Cliente $models)
    {
        $db = Conexao::db();
        $query = "SELECT * FROM tb_clientes WHERE cpf = '$models->cpf'";
        $res = $db->query($query);
        $res = $res->fetchAll(); // Retorna array do banco
        return $res;
    }

    public function SelectAll()
    {
        $db = Conexao::db();
        $query = "SELECT * FROM tb_clientes"; // Seleciona todos
        $res = $db->query($query);
        $res = $res->fetchAll(); // Retorna array do banco
        return $res;
    }

    public function Insert(Cliente $models)
    {
        $db = Conexao::db();
        $query = "INSERT INTO tb_clientes SET  nome = '$models->nome', sobrenome = '$models->sobrenome', email = '$models->email', cpf = '$models->cpf', telefone = '$models->telefone'";
        $res = $db->query($query);
        return $res;
    }

    public function Update(Cliente $models)
    {
        $db = Conexao::db();
        $query = "UPDATE tb_clientes SET  nome = '$models->nome', sobrenome = '$models->sobrenome', email = '$models->email', cpf = '$models->cpf', telefone = '$models->telefone' WHERE id = '$models->id'";
        $res = $db->query($query);
        return $res;
    }


} // Fim Model


