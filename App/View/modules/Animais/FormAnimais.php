<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Animais</title>
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
                <a href="/clientes/form"><button >Clientes</button></a>
                <a href="/animais/form"><button style="background-color: #F8DFBA;">Pet</button></a>
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


    
    
</body>
</html>