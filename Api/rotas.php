<?php
use Api\Controller\{
    ClienteController,
    AnimaisController,
    EstoqueController,
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // CLIENTES

    // http://localhost:8000//clientes/form -- Formulário de Clientes
    case "/clientes/form":
        ClienteController::form();
    break;

    // http://localhost:8000//clientes/save -- salvar
    case "/clientes/form":
        ClienteController::save();
    break;

    // http://localhost:8000//clientes -- Listagem de Clientes
    case "/clientes":
        ClienteController::list();
    break;

    // ESTOQUE

    // http://localhost:8000//estoque/form -- Formulário de Clientes
    case "/estoque/form":
        EstoqueController::form();
    break;

    // http://localhost:8000//estoque/save -- salvar
    case "/estoque/save":
        EstoqueController::save();
    break;

    // http://localhost:8000//estoque -- Listagem de Clientes
    case "/estoque":
        EstoqueController::list();
    break;

    default:
    //header("Location: /");
break;
}