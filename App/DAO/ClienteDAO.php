<?php

namespace App\DAO;
use \PDO;
use App\Model\ClienteModel; 

class ClienteDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(ClienteModel $model) 
    {
        $sql = "INSERT INTO clientes
                (nome, cpf, telefone, sexo, id_animais) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->id_animais);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT c.*,
                a.nome as nome_animais
                from clientes c
                join animais a on a.id = c.id_animais
                order by c.id
                ";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(ClienteModel $model) 
    {
        $sql = "UPDATE clientes SET nome=?, cpf=?, 
                telefone=?, sexo=?, id_animais=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->id_animais);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM clientes WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\ClienteModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM clientes WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}