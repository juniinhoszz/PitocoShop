<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #F8DFBA;
            padding-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centralize o conteúdo verticalmente */
        }

        .sidebar img {
            width: 210px;
            height: 210px;
            margin-bottom: 20px;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #884A39;
            display: block;
            transition: 0.3s;
            text-align: center; /* Centralize o texto horizontalmente */
        }

        .sidebar a:hover {
            background-color: #FF7F5C;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            height: 40px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-color: white;">
<div class="sidebar" style="align-self: center;">
        <img src="/View/Assets/logo.png" alt="Logo"
        height="120">
        <a href="#">Home</a>
        <a href="#">Vendas</a>
        <a href="#">Estoque</a>
        <a href="#">Cadastros</a>
        <a href="#">Agendamento</a>
        <a href="#">Hotelzinho</a>
    </div>

    <div class="content">
        <h1>Cadastro de Clientes</h1>
        <form action="/clientes/save" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>