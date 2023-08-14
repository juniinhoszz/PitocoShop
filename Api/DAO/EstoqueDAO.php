<?php

namespace Api\DAO;
use \PDO;
use Api\Model\EstoqueModel; 

class EstoqueDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(EstoqueModel $model) 
    {
        $sql = "INSERT INTO estoque
                (produto, id_categoria, preco, quantidade, codigo) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->produto);
        $stmt->bindValue(2, $model->id_categoria);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->quantidade);
        $stmt->bindValue(5, $model->codigo);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT e.*,
                c.nome as categoria
                from estoque e
                join categoria_produtos c on c.id = e.id_categoria
                order by e.id
                ";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(EstoqueModel $model) 
    {
        $sql = "UPDATE estoque SET produto=?, id_categoria=?, 
                preco=?, quantidade=?, codigo=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->produto);
        $stmt->bindValue(2, $model->id_categoria);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->quantidade);
        $stmt->bindValue(5, $model->codigo);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM estoque WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\EstoqueModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM estoque WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}