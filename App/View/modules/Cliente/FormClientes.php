<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Clientes</title>
    <link rel="stylesheet" type="text/css" href="/View/css/sidebarCSS.css">
    <link href='https://fonts.googleapis.com/css?family=Baloo Thambi' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Boulder&display=swap">
</head>

<body style="background-color: #F8DFBA;">
    <div class="sidebar" style="align-self: center;">
        <div class="centered">
            <img src="/View/Assets/logo.png" alt="Logo" width="150px" ; height="150px" ;>
        </div>

        <!--<a href="#">Home</a>-->

        <div class="centered">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px;" width="25" height="25" fill="#884A39" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 
                    3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
            </svg>
            <b style="font-size: 20px; text-align: center; margin: 05px 0px 0px 0px; 
                    color: #884A39; font-family: Boulder, Sans Serif;"> LOJA FÍSICA</b>
        </div>

        <a href="#">Vendas</a>
        <a href="#">Estoque</a>

        <div class="centered" style="margin-top: 5px;">
            <img src="/View/Assets/home.png" style="margin-right: 5px;" alt="Logo" width="28px" ; height="28px" ;>
            <b style="font-size: 20px; text-align: center; margin: 05px 0px 0px 0px; 
                color: #884A39; font-family: Boulder, Sans Serif;">SERVIÇOS</b>
        </div>

        <a href="#">Cadastros</a>
        <a href="#">Agendamento</a>
        <a href="#">Hotelzinho</a>

        <div class="centered">
            <img src="/View/Assets/doguinho.png" alt="Logo" width="90px" ; height="90px" ; style="margin: 5px; position: absolute; bottom:10px;">
        </div>
    </div>

    <div class="content">
        <h1 style="text-align: start;margin-left: 5px;">Clientes Cadastrados</h1>
        <form action="/clientes/save" method="POST">

            

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>Pets</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($modelList->rows as $item) : ?>
                        <?php $telefone = "(" . substr($item['telefone'], 0, 2) . ")" . substr($item['telefone'], 2, 11) ?>
                        <?php $cpf = substr($item['cpf'], 0, 3) . "." . substr($item['cpf'], 3, 3) . "." . substr($item['cpf'], 6, 3) . "-" . substr($item['cpf'], 9, 2) ?>
                        <?php $sexo;
                         if ($item['sexo'] == 'M') {
                            $sexo = "Masculino";
                        } elseif($item['sexo'] == 'F') {
                            $sexo = "Feminino";
                        } elseif($item['sexo'] == 'O') {
                            $sexo = "Não Definido";
                        } ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['nome'] ?></td>
                            <td><?= $cpf ?></td>
                            <td><?= $telefone ?></td>
                            <td>
                                <!--<?php if ($item['sexo'] == 'M') : ?>Masculino<?php else : ?> Fem <?php endif ?>-->
                                    <?= $sexo ?>
                            </td>
                            <td><?= $item['id_animais'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </form>
    </div>

    <div class="cadastro">
        <div class="centered">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#884A39" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
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
                <input type="tel" for="tel" value="<?= $model->telefone ?>" maxlength="11" id="telefone" name="telefone" required>

                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option selected value="">Selecione o Sexo</option>
                    <option <?= ($model->sexo == 'M') ? 'selected' : '' ?> value="M">Masculino</option>
                    <option <?= ($model->sexo == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                    <option <?= ($model->sexo == 'O') ? 'selected' : '' ?> value="O">Outro</option>
                    <!-- fazer a opção de selecionar automaticamente na hora de editar / -->
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
</body>

</html>