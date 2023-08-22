<?php

namespace App\Model;
use App\DAO\AnimaisDAO;

class AnimaisModel extends Model
{
    public $id, $nome, $id_dono, $id_especie, $sexo;
    public $id_raca, $id_cor, $porte, $peso, $castrado, $idade;

    public function save()
    {
        $dao = new AnimaisDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new AnimaisDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new AnimaisDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new AnimaisModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new AnimaisDAO();
        $dao->delete($id);
    }
}