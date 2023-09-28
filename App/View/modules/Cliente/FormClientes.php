<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Clientes</title>
    <?php include 'View/includes/css_config.php' ?>
</head>

<body style="background-color: #F8DFBA;">
    <?php include 'View/includes/sidebar.php' ?> 
    <div class="content">
        <div style="display: flex; align-items: center; justify-content: flex-start;">
            <h1 style="text-align: start;margin-left: 5px; margin-bottom: 5px;">Cadastros</h1>

            <input class="search" type="text" for="Search" maxlength="45" id="searchInput" 
            onkeyup="filterTable()"
            name="Search" placeholder="Pesquise Aqui">

            <!--<button style="border-radius: 500px;">
                <svg class="svg-icon" style="height: 40px;" viewBox="0 0 20 20">
                    <path fill="black" d="M12.323,2.398c-0.741-0.312-1.523-0.472-2.319-0.472c-2.394,0-4.544,1.423-5.476,3.625C3.907,7.013,3.896,8.629,4.49,10.102c0.528,1.304,1.494,2.333,2.72,2.99L5.467,17.33c-0.113,0.273,0.018,0.59,0.292,0.703c0.068,0.027,0.137,0.041,0.206,0.041c0.211,0,0.412-0.127,0.498-0.334l1.74-4.23c0.583,0.186,1.18,0.309,1.795,0.309c2.394,0,4.544-1.424,5.478-3.629C16.755,7.173,15.342,3.68,12.323,2.398z M14.488,9.77c-0.769,1.807-2.529,2.975-4.49,2.975c-0.651,0-1.291-0.131-1.897-0.387c-0.002-0.004-0.002-0.004-0.002-0.004c-0.003,0-0.003,0-0.003,0s0,0,0,0c-1.195-0.508-2.121-1.452-2.607-2.656c-0.489-1.205-0.477-2.53,0.03-3.727c0.764-1.805,2.525-2.969,4.487-2.969c0.651,0,1.292,0.129,1.898,0.386C14.374,4.438,15.533,7.3,14.488,9.77z"></path>
                </svg>
            </button>-->

        </div>

        <div class="scrollCadastros">
            <button class="scroll-button prev" style="margin-right: 3px;" onclick="scrollCarousel(-1)">
                <svg class="svg-icon" style="height: 40px;" viewBox="0 0 20 20">
                    <path d="M11.739,13.962c-0.087,0.086-0.199,0.131-0.312,0.131c-0.112,0-0.226-0.045-0.312-0.131l-3.738-3.736c-0.173-0.173-0.173-0.454,0-0.626l3.559-3.562c0.173-0.175,0.454-0.173,0.626,0c0.173,0.172,0.173,0.451,0,0.624l-3.248,3.25l3.425,3.426C11.911,13.511,11.911,13.789,11.739,13.962 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.148,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.148,17.521,10"></path>
                </svg></button>

            <div class="opcoes" id="opcoes">
                <a href="/clientes/form"><button style="background-color: #F8DFBA;">Clientes</button></a>
                <a href="/animais/form"><button>Pet</button></a>
                <a href="/estoque/form"><button>Estoque - Produtos</button></a>
                <a href="/clientes/form"><button style="width: 35%;">Categorias de Produto</button></a>
                <a href="/cores/form"><button style="width: 30%;">Cores de Pets</button></a>
                <a href="/clientes/form"><button style="width: 35%;">Espécies de Pets</button></a>
                <a href="/clientes/form"><button style="width: 30%;">Raças de Pets</button></a>

            </div>

            <button class="scroll-button next" style="margin-left: 3px;" onclick="scrollCarousel(1)">
                <svg class="svg-icon" style="height: 40px;" viewBox="0 0 20 20">
                    <path d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10"></path>
                </svg>
            </button>
        </div>
        <script>
            function scrollCarousel(direction) {
                const carousel = document.querySelector('.opcoes');
                const step = 250; // Quantidade a rolar a cada vez (ajuste conforme necessário)
                carousel.scrollLeft += step * direction;
            }
        </script>


        <!--
    <?php $idSelecionado = isset($_GET['id']) ? (int)$_GET['id'] : 0; ?>
    <?php echo var_dump($idSelecionado) ?><br>
    <?php echo var_dump($model->id) ?><br>
    <button >teste</button>
-->

        <div class="listagem">
            <table id="ListagemClientes">
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


                        <tr style="<?php echo (isset($idSelecionado) && $idSelecionado === $item['id']) ? 'background-color: #F8DFBA;' : '' ?>">
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
            <script>
                // Função para atualizar a tabela com base na pesquisa
                function filterTable() {
                    var input, filter, table, tr, td, i, j, txtValue;
                    input = document.getElementById('searchInput');
                    filter = input.value.toUpperCase();
                    table = document.getElementById('ListagemClientes');
                    tr = table.getElementsByTagName('tr');

                    for (i = 1; i < tr.length; i++) {
                        tr[i].style.display = 'none'; // Oculta todas as linhas
                        td = tr[i].getElementsByTagName('td');
                        for (j = 0; j < td.length; j++) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = ''; // Exibe a linha se a pesquisa for correspondida
                                break; // Sai do loop interno
                            }
                        }
                    }
                }

                // Adicione um ouvinte de eventos para a caixa de pesquisa
                //document.getElementById('searchInput').addEventListener('keyup', filterTable);
            </script>
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
                <input type="hidden" value="<?= $model->id ?>" name="id" id="id" />

                <label for="nome">Nome:</label>
                <input type="text" for="nome" value="<?= $model->nome ?>" id="nome" maxlength="45" name="nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" for="cpf" value="<?= $model->cpf ?>" oninput="formatarCPF()" id="cpf" maxlength="14" minlength="14" name="cpf" required>
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
                </script>

                <label for="telefone">Telefone:</label>
                <input type="tel" for="tel" value="<?= $model->telefone ?>" oninput="formatarTel()" maxlength="13" minlength="11" id="telefone" name="telefone" required>
                <script>
                    function formatarTel() {
                        const TelInput = document.getElementById('telefone');
                        let tel = TelInput.value.replace(/\D/g, '');
                        if (tel.length > 0 )
                        {
                            tel = '('+ tel.substring(0,2) + ')' + tel.substring(2,11)
                        }
                        TelInput.value = tel;
                    }
                </script>



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