<?php

namespace Api\DAO;
use \PDO;
use Api\Model\AnimaisModel; 

class AnimaisDAO extends DAO
{
    function __construct() 
    {
        parent::__construct();
    }

    function insert(AnimaisModel $model) 
    {
        $sql = "INSERT INTO animais
                (nome, id_dono, id_especie, sexo, id_raca, id_cor, porte, peso, castrado, idade) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id_dono);
        $stmt->bindValue(3, $model->id_especie);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->id_raca);
        $stmt->bindValue(6, $model->id_cor);
        $stmt->bindValue(7, $model->porte);
        $stmt->bindValue(8, $model->peso);
        $stmt->bindValue(9, $model->castrado);
        $stmt->bindValue(10, $model->idade);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT a.*,
                c.nome as nome_cliente,
                e.descricao as especie
             ---r.nome_raca as raca
                co.descricao as cor  
                from animais a
                join clientes c on c.id = a.id_dono
                join especie_animal e on e.id = a.id_especie
             ---join racas r on r.id = a.id_raca ?
                join cores_animais co on co.id = a.id_cor
                order by a.id
                ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function update(AnimaisModel $model) 
    {
        $sql = "UPDATE animais SET nome=?, id_dono=?, 
                id_especie=?, sexo=?, id_raca=?, id_cor=?, porte=?, peso=?, castrado=?, idade=?
                WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id_dono);
        $stmt->bindValue(3, $model->id_especie);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->id_raca);
        $stmt->bindValue(6, $model->id_cor);
        $stmt->bindValue(7, $model->porte);
        $stmt->bindValue(8, $model->peso);
        $stmt->bindValue(9, $model->castrado);
        $stmt->bindValue(10, $model->idade);
        $stmt->bindValue(11, $model->id);

        $stmt->execute();      
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM animais WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\AnimaisModel"); // Retornando um objeto específico PessoaModel
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM animais WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}