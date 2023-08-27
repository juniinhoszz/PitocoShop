<?php
use App\Controller\{
    ClienteController,
    AnimaisController,
    CoresController,
    EstoqueController,
    ServicoController
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
    case "/estoque/form":
        EstoqueController::form();
    break;

    // http://localhost:8000//estoque/save -- salvar
    case "/estoque/save":
        EstoqueController::save();
    break;

    // http://localhost:8000//estoque -- Listagem de Produtos
    case "/estoque":
        EstoqueController::list();
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

    // SERVIÇOS

    // http://localhost:8000//servicos/form -- Formulário de Serviços
    case "/servicos/form":
        ServicoController::form();
    break;

    // http://localhost:8000//servicos/save -- salvar
    case "/servicos/save":
        ServicoController::save();
    break;

    // http://localhost:8000//servicos -- Listagem de Serviços
    case "/servicos":
        ServicoController::list();
    break;

    default:
    //header("Location: /");
break;
}