<?php

namespace Api\Controller;
use Exception,
    Api\Model\ClienteModel,
    Api\DAO\ClienteDAO;;

class ClienteController extends Controller 
{
    public static function save(){
        try
        {
            $cliente = new ClienteModel();

            $cliente->id = $_POST['id'];
            $cliente->nome = $_POST['nome'];
            $cliente->cpf = $_POST['cpf'];
            $cliente->telefone = $_POST['telefone'];
            $cliente->sexo = $_POST['sexo'];
            $cliente->id_animais = $_POST['id_animais'];
            
            $cliente->save(); 

            header("Location: /clientes"); 

        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

        public static function form()
        {
            try
            {
                $model = new ClienteModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Cliente/FormClientes.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }
        
        public static function list() 
        {   
            try
            {
                $model = new ClienteModel();
                $model->getAllRows();

                
                include 'View/modules/Cliente/ListClientes.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

    public static function delete()
    {
        try
        {
            $dao = new ClienteDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /clientes");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }
}
