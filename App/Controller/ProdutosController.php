<?php

namespace App\Controller;
use Exception,
    App\Model\ProdutoModel,
    App\DAO\ProdutoDAO;;

class ProdutoController extends Controller 
{
    public static function save(){
        try
        {
            $estoque = new ProdutoModel();

            $estoque->id = $_POST['id'];
            $estoque->descricao = $_POST['descricao'];
            $estoque->preco = $_POST['preco'];
            $estoque->quantidade = $_POST['quantidade'];
            $estoque->codigo = $_POST['codigo'];
            $estoque->id_categoria = $_POST['id_categoria'];
            
            $estoque->save(); 

            header("Location: /produto"); 
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function form()
        {
            try
            {
                $model = new ProdutoModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Produto/FormProdutos.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

        public static function list() 
    {
        try
        {
            $model = new ProdutoModel();
            $model->getAllRows();

            
            include 'View/modules/Produto/ListProdutos.php';
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

    public static function delete()
    {
        try
        {
            $dao = new ProdutoDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /produto");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }


}