<?php

namespace Api\Controller;
use Exception,
    Api\Model\ServicoModel,
    Api\DAO\ServicoDAO;;

class ServicoController extends Controller 
{
    public static function save(){
        try
        {
            $servico = new ServicoModel();

            $servico->id = $_POST['id'];
            $servico->id_descricao_servico = $_POST['id_descricao_servico'];
            $servico->id_preco_servico = $_POST['id_preco_servico'];
            $servico->horario_entrega = $_POST['horario_entrega'];
            $servico->horario_busca = $_POST['horario_busca'];
            $servico->id_cliente = $_POST['id_cliente'];
            
            $servico->save(); 

            header("Location: /servicos"); 
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function form()
        {
            try
            {
                $model = new ServicoModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Servicos/FormServicos.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

        public static function list() 
    {
        try
        {
            $model = new ServicoModel();
            $model->getAllRows();

            
            include 'View/modules/Servicos/ListServicos.php';
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function delete()
    {
        try
        {
            $dao = new ServicoDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /servicos");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }


}