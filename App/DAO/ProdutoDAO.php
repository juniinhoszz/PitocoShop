<?php

namespace App\DAO;
use \PDO;
use App\Model\ProdutoModel; 

class ProdutoDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(ProdutoModel $model) 
    {
        $sql = "INSERT INTO produto
                (descricao, preco, quantidade, codigo, id_categoria) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $model->codigo);
        $stmt->bindValue(5, $model->id_categoria);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT e.*,
                c.nome as categoria
                from produto p
                join categoria_produtos c on c.id = p.id_categoria
                order by p.id
                ";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(ProdutoModel $model) 
    {
        $sql = "UPDATE produto SET descricao=?, 
                preco=?, quantidade=?, codigo=?, id_categoria=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $model->codigo);
        $stmt->bindValue(5, $model->id_categoria);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\ProdutoModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produtos WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}