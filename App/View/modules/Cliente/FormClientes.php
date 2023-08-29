<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Clientes</title>
    <?php include 'View/includes/css_config.php' ?>
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
        <h1 style="text-align: start;margin-left: 5px; margin-bottom: 5px;">Clientes Cadastrados</h1>
        <div class="listagem">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <!--<th>Pets</th>-->
                        <th>
                            <svg viewBox="0 0 20 20" width="22" height="22">
                                <path fill="white" d="M19.404,6.65l-5.998-5.996c-0.292-0.292-0.765-0.292-1.056,0l-2.22,2.22l-8.311,8.313l-0.003,0.001v0.003l-0.161,0.161c-0.114,0.112-0.187,0.258-0.21,0.417l-1.059,7.051c-0.035,0.233,0.044,0.47,0.21,0.639c0.143,0.14,0.333,0.219,0.528,0.219c0.038,0,0.073-0.003,0.111-0.009l7.054-1.055c0.158-0.025,0.306-0.098,0.417-0.211l8.478-8.476l2.22-2.22C19.695,7.414,19.695,6.941,19.404,6.65z M8.341,16.656l-0.989-0.99l7.258-7.258l0.989,0.99L8.341,16.656z M2.332,15.919l0.411-2.748l4.143,4.143l-2.748,0.41L2.332,15.919z M13.554,7.351L6.296,14.61l-0.849-0.848l7.259-7.258l0.423,0.424L13.554,7.351zM10.658,4.457l0.992,0.99l-7.259,7.258L3.4,11.715L10.658,4.457z M16.656,8.342l-1.517-1.517V6.823h-0.003l-0.951-0.951l-2.471-2.471l1.164-1.164l4.942,4.94L16.656,8.342z"></path>
                            </svg>
                        </th>
                        <th>
                            <svg viewBox="0 0 20 20" width="22" height="22">
                                <path fill="white" d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083z"></path>
                            </svg>
                        </th>

                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($modelList->rows as $item) : ?>
                        <?php $telefone = "(" . substr($item['telefone'], 0, 2) . ")" . substr($item['telefone'], 2, 11) ?>
                        <?php $cpf = substr($item['cpf'], 0, 3) . "." . substr($item['cpf'], 3, 3) . "." . substr($item['cpf'], 6, 3) . "-" . substr($item['cpf'], 9, 2) ?>
                        <?php $sexo;
                        if ($item['sexo'] == 'M') {
                            $sexo = "Masculino";
                        } elseif ($item['sexo'] == 'F') {
                            $sexo = "Feminino";
                        } elseif ($item['sexo'] == 'O') {
                            $sexo = "Não Definido";
                        } ?>

                        <!-- $_SERVER['REQUEST_URI'] -->
                        <!--<?php echo var_dump($idSelecionado) ?>-->
                        <tr <?php if ($idSelecionado == $model->id)
                                echo 'style="backgroud-color: #522E24;"'
                            ?>>
                            <!-- TENTAR FAZER SELECIONADO NA HORA DE EDITAR -->
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['nome'] ?></td>
                            <td><?= $cpf ?></td>
                            <td><?= $telefone ?></td>
                            <td>
                                <?= $sexo ?>
                            </td>
                            <!--<td><?= $item['id_animais'] ?></td>-->
                            <td>
                                <a href="/clientes/form?id=<?= $item['id'] ?>">
                                    <svg class="svg-iconedt" viewBox="0 0 20 20" width="22" height="22">
                                        <path d="M19.404,6.65l-5.998-5.996c-0.292-0.292-0.765-0.292-1.056,0l-2.22,2.22l-8.311,8.313l-0.003,0.001v0.003l-0.161,0.161c-0.114,0.112-0.187,0.258-0.21,0.417l-1.059,7.051c-0.035,0.233,0.044,0.47,0.21,0.639c0.143,0.14,0.333,0.219,0.528,0.219c0.038,0,0.073-0.003,0.111-0.009l7.054-1.055c0.158-0.025,0.306-0.098,0.417-0.211l8.478-8.476l2.22-2.22C19.695,7.414,19.695,6.941,19.404,6.65z M8.341,16.656l-0.989-0.99l7.258-7.258l0.989,0.99L8.341,16.656z M2.332,15.919l0.411-2.748l4.143,4.143l-2.748,0.41L2.332,15.919z M13.554,7.351L6.296,14.61l-0.849-0.848l7.259-7.258l0.423,0.424L13.554,7.351zM10.658,4.457l0.992,0.99l-7.259,7.258L3.4,11.715L10.658,4.457z M16.656,8.342l-1.517-1.517V6.823h-0.003l-0.951-0.951l-2.471-2.471l1.164-1.164l4.942,4.94L16.656,8.342z"></path>
                                    </svg>
                                </a>
                            </td>
                            <td>

                                <a href="/clientes/delete?id=<?= $item['id'] ?>">
                                    <svg class="svg-icondel" viewBox="0 0 20 20" width="22" height="22">
                                        <path d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
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
                <input type="text" for="nome" value="<?= $model->nome ?>" id="nome" maxlength="45" name="nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" for="cpf" value="<?= $model->cpf ?>" id="cpf" maxlength="14" minlength="14" name="cpf" required>
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
                <input type="tel" for="tel" value="<?= $model->telefone ?>" maxlength="11" minlength="11" id="telefone" name="telefone" required>

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

            <?php $button;
            if ($model->id == null) {
                $button = "Cadastrar";
            } else {
                $button = "Editar";
            }
            ?>
            <div class="enviar">
                <?php
                if ($model->id == null) {
                    echo '<button type="submit">Cadastrar</button>';
                } else {
                    echo '<button type="submit">Editar</button>';
                }
                ?>
                <!--<button type="submit" value="Cadastrar"> Cancelar </button>-->
                <!-- FAZER BOTÃO DE CANCELAR -->


            </div>



        </form>
    </div>
</body>

</html>