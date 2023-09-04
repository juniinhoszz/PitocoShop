<?php

namespace App\Model;
use App\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    public $id, $descricao, $preco, $quantidade, $codigo, $id_categoria;

    public function save()
    {
        $dao = new ProdutoDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ProdutoDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new ProdutoModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new ProdutoDAO();
        $dao->delete($id);
    }
}