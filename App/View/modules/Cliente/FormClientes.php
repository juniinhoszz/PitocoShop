<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        body {
            font-family: 'Baloo Thambi';
            background-color: #f4f4f4;
        }

        .sidebar {
            height: 100%;
            width: 18.7%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #F8DFBA;
            padding-top: 0.5%;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            padding: 11px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #884A39;
            display: block;
            transition: 0.3s;
            text-align: center; /* Centralize o texto horizontalmente */
            
        }

        .sidebar a:hover {
            background-color: #FF7F5C;
            border-radius: 10px;
            margin-left: 5px;
            margin-right: 5px;
        }

        .content {
            margin-left: 19.5%;
            margin-top: 0.3%;
            height: 100%;
            position: fixed;
            max-width: 49.5%;
            max-height: 100%;
            width: 49.5%;
            padding: 20px;
            background-color: #fff;
            border-top-right-radius: 50px;
            border-top-left-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        .cadastro {
            margin-left: 72.8%;
            margin-right: 10px;
            margin-top: 0.3%;
            display: flexbox;
            position: fixed;
            height: 100%;
            width: 23.2%;
            max-width: 23.2%;
            max-height: 100%;
            padding: 20px;
            background-color: #fff;
            border-top-right-radius: 50px;
            border-top-left-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 25px;
            color: #884A39;
            margin: 10px 10px 0px 0px;
        }

        form {
            max-width: 400px;
            margin: 0 ;
            padding: 5px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 1%;
            font-weight: bold;
            color: #884A39
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 91.5%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #884A39;
            border-radius: 3px;
            color: #884A39;
        }

        select {
            height: 40px;
            width: 100%;
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

        .sidebar i {
        margin-right: 10px;
        }

        .inputs {
        max-height: 460px;
        overflow-y: auto;
        overflow-x: hidden;
        }

        .enviar{
            display: flexbox;

        }

        .enviar button[type="submit"]{
            margin: 5px;
            position: absolute;
            bottom: 8%;
            width: 80%;
            height: 7.2%;
            font-size: 20px;

            left: 50%; /* Centraliza o botão horizontalmente */
            transform: translateX(-50%); 

            text-align: center;
            border-radius: 50px;
            background-color: transparent;
            color: #884A39;
            
            padding: 10px 20px;
            border: 2px solid #884A39;
            cursor: pointer;
            transition: 0.3s;
        }

        .enviar button[type="submit"]:hover
        {
            background-color: #884A39;
            color: white;
            transition: 0.5s;
        }

    </style>
    <link href='https://fonts.googleapis.com/css?family=Baloo Thambi' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0-beta3/css/all.min.css">

</head>
<body style="background-color: #F8DFBA;">
<div class="all" style="position: fixed;"> 
<div class="sidebar" style="align-self: center;">

        <center><img src="/View/Assets/logo.png" alt="Logo"
        width="150px";
        height="150px";
        ></center>

        <!--<a href="#">Home</a>-->

        <div>
        <center><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#884A39"  class="bi bi-bag-fill" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
        </svg>
        <b style="font-size: 20px; text-align: center; margin: 05px 0px 0px 0px; 
        color: #884A39;">LOJA FÍSICA</b></center>
        </div>
        <a href="#">Vendas</a>
        <a href="#">Estoque</a>
        
        <div>
        <center><img src="/View/Assets/home.png" alt="Logo"
        width="28px";
        height="28px";>
        <b style="font-size: 20px; text-align: center; margin: 05px 0px 0px 0px; 
        color: #884A39;">SERVIÇOS</b></center>
        </div>
        <a href="#">Cadastros</a>
        
        <a href="#">Agendamento</a>
        <a href="#">Hotelzinho</a>

        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <img src="/View/Assets/doguinho.png" alt="Logo" 
        width="90px";
        height="90px";
        style="margin: 5px; position: absolute; bottom:10px;">
        </div>
        
    </div>

    <div class="content">
        <h1 style="text-align: start;margin-left: 5px;">Clientes Cadastrados</h1>
        <form action="/clientes/save" method="POST">
            
            
        </form>
    </div>

    <div class="cadastro">
        <div style="display: flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#884A39" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
            </svg>
            <h1>Cadastro de Clientes</h1>
    </div>
        <form action="/clientes/save" method="POST">

            <div class="inputs">

                <input type="hidden" value="<?= $model->id ?>" name="id" />

                <label for="nome">Nome:</label>
                <input type="text" for="nome" value="<?= $model->nome ?>" id="nome" name="nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" for="cpf" value="<?= $model->cpf ?>" id="cpf" maxlength="14" name="cpf" required>
                <script>
                    // Função para aplicar a máscara de CPF em tempo real
                    function formatarCPF() {
                        const cpfInput = document.getElementById('cpf');
                        let cpf = cpfInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                        
                        if (cpf.length > 3) {
                            cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
                        }
                        if (cpf.length > 7) {
                            cpf = cpf.substring(0, 7) + '.' + cpf.substring(7);
                        }
                        if (cpf.length > 11) {
                            cpf = cpf.substring(0, 11) + '-' + cpf.substring(11);
                        }
                        
                        cpfInput.value = cpf;
                }
        
        // Adiciona o evento de input para chamar a função formatarCPF
        const cpfInput = document.getElementById('cpf');
        cpfInput.addEventListener('input', formatarCPF);
    </script>

                <label for="telefone">Telefone:</label>
                <input type="tel" for="tel" value="<?= $model->telefone ?>" id="telefone" name="telefone" required>

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option selected value="">Selecione o Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                    <!-- fazer a opção de selecionar automaticamente na hora de editar -->
                </select>
                
                <!--
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                <label for="sexo">Sexo:</label>
                -->
                
            </div>

            <div class="enviar">
                <button type="submit" value="Cadastrar">Cadastrar</button>
            </div>
            
            
            
        </form>
    </div>
</div>
</body>
</html>