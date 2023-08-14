<?php

namespace Api\Controller;
use Exception,
    Api\Model\EstoqueModel,
    Api\DAO\EstoqueDAO;;

class EstoqueController extends Controller 
{
    public static function save(){
        try
        {
            $estoque = new EstoqueModel();

            $estoque->id = $_POST['id'];
            $estoque->produto = $_POST['produto'];
            $estoque->id_categoria = $_POST['id_categoria'];
            $estoque->preco = $_POST['preco'];
            $estoque->quantidade = $_POST['quantidade'];
            $estoque->codigo = $_POST['codigo'];
            
            $estoque->save(); 

            header("Location: /estoque"); 
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function form()
        {
            try
            {
                $model = new EstoqueModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Estoque/FormProdutos.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

        public static function list() 
    {
        try
        {
            $model = new EstoqueModel();
            $model->getAllRows();

            
            include 'View/modules/Estoque/ListProdutos.php';
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function delete()
    {
        try
        {
            $dao = new EstoqueDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /estoque");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }


}