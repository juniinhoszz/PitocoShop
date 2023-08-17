<?php

namespace Api\DAO;
use \PDO;
use Api\Model\CoresModel; 

class CoresDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(CoresModel $model) 
    {
        $sql = "INSERT INTO cores_animais
                (descricao) 
                VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT *
                from cores_animais c
                order by c.id
                ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(CoresModel $model) 
    {
        $sql = "UPDATE cores_animais SET descricao=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM cores_animais WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\CoresModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM cores_animais WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}