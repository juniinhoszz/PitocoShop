<?php
use App\Controller\{
    ClienteController,
    AnimaisController,
    CoresController,
    ProdutoController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // CLIENTES

    // http://localhost:8000//clientes/form -- Formulário de Clientes
    case "/clientes/form":
        ClienteController::form();
    break;

    // http://localhost:8000//clientes/save -- salvar
    case "/clientes/save":
        ClienteController::save();
    break;

    // http://localhost:8000//clientes -- Listagem de Clientes
    case "/clientes":
        ClienteController::list();
    break;

    // http://localhost:8000//clientes/delete -- Listagem de Clientes
    case "/clientes/delete":
        ClienteController::delete();
    break;

    // ESTOQUE

    // http://localhost:8000//estoque/form -- Formulário de Produtos
    case "/produtos/form":
        ProdutoController::form();
    break;

    // http://localhost:8000//estoque/save -- salvar
    case "/produtos/save":
        ProdutoController::save();
    break;

    // http://localhost:8000//estoque -- Listagem de Produtos
    case "/produtos":
        ProdutoController::list();
    break;

    // ANIMAIS

    // http://localhost:8000//animais/form -- Formulário de Animais
    case "/animais/form":
        AnimaisController::form();
    break;

    // http://localhost:8000//animais/save -- salvar
    case "/animais/save":
        AnimaisController::save();
    break;

    // http://localhost:8000//animais -- Listagem de Animais
    case "/animais":
        AnimaisController::list();
    break;

    // CORES

    // http://localhost:8000//cores/form -- Formulário de Cores
    case "/cores/form":
        CoresController::form();
    break;

    // http://localhost:8000//cores/save -- salvar
    case "/cores/save":
        CoresController::save();
    break;

    // http://localhost:8000//cores -- Listagem de Cores
    case "/cores":
        CoresController::list();
    break;

    
    default:
        header("Location: /clientes/form");
break;
}