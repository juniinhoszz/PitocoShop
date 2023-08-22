<?php

namespace App\DAO;
use \PDO;
use App\Model\ServicoModel; 

class ServicoDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(ServicoModel $model) 
    {
        $sql = "INSERT INTO servicos
                (id_descricao_servico, id_preco_servico,
                 horario_entrega, horario_busca, id_cliente) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_descricao_servico);
        $stmt->bindValue(2, $model->id_preco_servico);
        $stmt->bindValue(3, $model->horario_entrega);
        $stmt->bindValue(4, $model->horario_busca);
        $stmt->bindValue(5, $model->id_cliente);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT s.*,
                tp.descricao as descricao
                tp.preco as preco
                from servicos s
                join tipo_servico tp on tp.id = s.id_descricao_servico 
                order by s.id
                ";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(ServicoModel $model) 
    {
        $sql = "UPDATE servicos SET id_descricao_servico=?, id_preco_servico=?, 
                horario_entrega=?, horario_busca=?, id_cliente=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_descricao_servico);
        $stmt->bindValue(2, $model->id_preco_servico);
        $stmt->bindValue(3, $model->horario_entrega);
        $stmt->bindValue(4, $model->horario_busca);
        $stmt->bindValue(5, $model->id_cliente);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM servicos WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\ServicoModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM servico WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}