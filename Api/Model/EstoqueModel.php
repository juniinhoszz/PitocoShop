<?php

namespace Api\Model;
use Api\DAO\EstoqueDAO;

class EstoqueModel extends Model
{
    public $id, $produto, $id_categoria, $preco, $quantidade, $codigo;

    public function save()
    {
        $dao = new EstoqueDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new EstoqueDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new EstoqueDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new EstoqueModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new EstoqueDAO();
        $dao->delete($id);
    }
}