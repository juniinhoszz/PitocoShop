<?php

namespace App\Model;
use App\DAO\ClienteDAO;

class ClienteModel extends Model
{
    public $id, $nome, $cpf, $telefone, $sexo, $id_animais;

    public function save()
    {
        $dao = new ClienteDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new ClienteDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ClienteDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new ClienteModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new ClienteDAO();
        $dao->delete($id);
    }
}