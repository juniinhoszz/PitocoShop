<?php

namespace App\Model;
use App\DAO\ServicoDAO;

class ServicoModel extends Model
{
    public $id, $id_descricao_servico, $id_preco_servico, $horario_entrega, $horario_busca, $id_cliente;
    
    public function save()
    {
        $dao = new ServicoDAO();
        if(empty($this->id))
        {$dao->insert($this);} 
        else {$dao->update($this);}
    }

    public function getAllRows()
    {
        $dao = new ServicoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ServicoDAO();
        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new ServicoModel(); // Operador Ternário
    }

    public function delete(int $id)
    {
        $dao = new ServicoDAO();
        $dao->delete($id);
    }
}