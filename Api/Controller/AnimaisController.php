<?php

namespace Api\Controller;
use Exception,
    Api\Model\AnimaisModel,
    Api\DAO\AnimaisDAO;;

class AnimaisController extends Controller 
{
    public static function save(){
        try
        {
            $animais = new AnimaisModel();

            $animais->id = $_POST['id'];
            $animais->nome = $_POST['nome'];
            $animais->id_dono = $_POST['id_dono'];
            $animais->id_especie = $_POST['id_especie'];
            $animais->sexo = $_POST['sexo'];
            $animais->id_raca = $_POST['id_raca'];
            $animais->id_cor = $_POST['id_cor'];
            $animais->porte = $_POST['porte'];
            $animais->peso = $_POST['peso'];
            $animais->castrado = $_POST['castrado'];
            $animais->idade = $_POST['idade'];

            $animais->save(); 

            header("Location: /animais"); 

        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }

        public static function form()
        {
            try
            {
                $model = new AnimaisModel();

                if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
                    $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
                
                //$model->getAllRowsFabr(); - uxar dados para dropdown
                
                include 'View/modules/Animais/FormAnimais.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }
        
        public static function list() 
        {   
            try
            {
                $model = new AnimaisModel();
                $model->getAllRows();

                
                include 'View/modules/Animais/ListAnimais.php';
            }catch(Exception $e)
            {
                parent::LogError($e);
            }
        }

    public static function delete()
    {
        try
        {
            $dao = new AnimaisDAO();

            $dao->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /animais");
        }catch(Exception $e)
        {
            parent::LogError($e);
        }
    }
}
