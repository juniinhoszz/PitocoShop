<?php

namespace App\Controller;
use Exception,
    App\Model\CoresModel,
    App\DAO\CoresDAO;;

class CoresController extends Controller 
{
    public static function save(){
        try
        {
            $cor = new CoresModel();

            $cor->id = $_POST['id'];
            $cor->descricao = $_POST['descricao'];
            

            $cor->save(); 

            header("Location: /cores"); 

        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

        public static function form()
        {
            try
            {
                $model = new CoresModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Cores/FormCores.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }
        
        public static function list() 
        {   
            try
            {
                $model = new CoresModel();
                $model->getAllRows();

                
                include 'View/modules/Cores/ListCores.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

    public static function delete()
    {
        try
        {
            $dao = new CoresDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /cores");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }
}
