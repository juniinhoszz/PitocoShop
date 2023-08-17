<?php

namespace Api\Model;
use Api\DAO\CoresDAO;

class CoresModel extends Model
{
    public $id, $descricao;

    public function save()
    {
        $dao = new CoresDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new CoresDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new CoresDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new CoresModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new CoresDAO();
        $dao->delete($id);
    }
}