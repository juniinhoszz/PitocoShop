<?php

namespace App\Controller;

use Exception,
    App\Model\ClienteModel,
    App\DAO\ClienteDAO;;

class ClienteController extends Controller
{
    public static function save()
    {
        try {
            $cliente = new ClienteModel();

            $cliente->id = $_POST['id'];
            $cliente->nome = $_POST['nome'];
            $cliente->cpf = parent::TirarnaoNumeros($_POST['cpf']);
            $cliente->telefone = parent::TirarnaoNumeros($_POST['telefone']);
            $cliente->sexo = $_POST['sexo'];
            //$cliente->id_animais = isset($_POST['id_animais']) ? 0 : 1;

            $cliente->save();

            header("Location: /clientes/form");
        } catch (Exception $e) {
            parent::LogError($e);
        }
    }

    public static function form()
    {
        try {
            $model = new ClienteModel();
            $modelList = new ClienteModel();
            $modelList->getAllRows();
            //$idSelecionado = null;

            if (isset($_GET['id'])) { // Verificando se existe uma variável $_GET
                $model = $model->getById((int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            }
            //if (isset($_GET['id'])) {
             //   $idSelecionado = $_GET['id'];
            //} else {
            //    $idSelecionado = 0;
            //}
    
            //$model->getAllRowsFabr(); - uxar dados para dropdown

            include 'View/modules/Cliente/FormClientes.php';
        } catch (Exception $e) {
            parent::LogError($e);
        }
    }

    public static function list()
    {
        try {
            $model = new ClienteModel();
            $model->getAllRows();

            include 'View/modules/Cliente/ListClientes.php';
        } catch (Exception $e) {
            parent::LogError($e);
        }
    }

    public static function delete()
    {
        try {
            $dao = new ClienteDAO();

            $dao->delete((int) $_GET['id']); // Enviando a variável $_GET como inteiro para o método delete

            header("Location: /clientes/form");
        } catch (Exception $e) {
            parent::LogError($e);
        }
    }
}
