<!DOCTYPE html>

<?php
    if(!(isset($_GET['produto']))){
        header('Location: index.php');
    }

    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    $comando = $pdo->prepare("SELECT * FROM produtos WHERE codigo = ?");
    $comando->execute(array($_GET['produto']));
    $produto = $comando->fetch(PDO::FETCH_ASSOC);

    $comando = $pdo->prepare("SELECT * FROM produtos WHERE categoria = ? AND codigo != ? ORDER BY rand() LIMIT 4");
    $comando->execute(array($produto['categoria'], $produto['codigo']));
    $data = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Ocarina - The Store of Your Journey </title>

    <!-- Bootstrap core CSS -->
    <link href="startbootstrap-heroic-features-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="startbootstrap-heroic-features-gh-pages/css/heroic-features.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="pageStyle.css">

    <style>
    @import url('https://fonts.googleapis.com/css?family=MedievalSharp');

    #container{
        font-family: 'MedievalSharp', cursive;
        font-size: 20px;
        height: 40px;
        margin-left: 5px;
    }

    #logo{
        color: #a07e04;
        font-size: 30px;
    }

    #home, #login, #ver, #fale{
        color: #a07e04;
    }

    #retangulo{
        background-image: url("https://pre00.deviantart.net/b631/th/pre/f/2015/229/8/3/skyrim_potions_2nd_set___tes_5_by_etrelley-d962aqm.png");
        font-family: 'MedievalSharp', cursive;
        color: #a07e04;
        height: 350px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #ffffff;
    }

    .item{
        font-family: 'MedievalSharp', cursive;
        font-size:18px;
        color: #a07e04;
    }

    #busca{
        background-color:white;
        border:solid 1px;
        border-radius:15px;
        width:260px;
        height: 35px;
        position: relative;
        left: 1000px;
    }

    #txtBusca{
        float:left;
        background-color:transparent;
        padding-left:5px;
        font-size:18px;
        height:35px;
        width:260px;
        border-radius:15px;
    }

    #buscar{
        position: relative;
        left: 210px;
        top: -32px;
        height:30px;
        border-radius:12px;
        width:45px;
        background: #a07e04;
    }

    html, body{
        background: black;
    }

    .dropdown{
        position: relative;
        left: -13.6%;
        top: 68px;
    }

    #button{
        background: #4e555b;
        color: #a07e04;
        font-family: 'MedievalSharp', cursive;
        font-size: 20px;
        border: none;
    }

    #itens{
        background: transparent;
        color: #a07e04;
        font-family: 'MedievalSharp', cursive;
        font-size: 18px;
        width: 40px;
        position:absolute;
        margin-left:3%;
    }

    a{
        color: #a07e04;
    }

    #prod{
        width: 1100px;
        height: 450px;
        background: white;
        margin-top: 2%;
        margin-bottom: 5%;
        margin-left: 2%;
        border-radius: 3%;
        font-family: 'MedievalSharp', cursive;

    }

    #imgprod{
        width: 380px;
        height: 380px;
        border-radius: 3%;
        margin-top: 1%;
        margin-left: 1%;
        float: left;

    }

    #titulo, #preco, #quantidade, #soma, #diminui, #recomendados, #container_quant{
        font-size: 40px;
    }

    .botao{
        position:relative;
    }
    #soma{
        left:20px;
        top:-10px;
        cursor:pointer;
    }

    #diminui{
        top:15px;
        left:-14px;
        cursor:pointer;
    }

    </style>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container" id="container">

        <a class="navbar-brand" href="#" id="logo"> Ocarina </a>

        <div id="busca">
            <input type="text" id="txtBusca" placeholder="Buscar"/>
            <input type="submit" name="buscar" value="Go" id="buscar">
        </div>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" id="home"> Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php" id="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="ver"> Ver Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faleConosco.php" id="fale">Fale Conosco</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

	<div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="button"> Categorias
            <span class="caret"></span></button>
        <ul class="dropdown-menu" id="itens">
            <li><a href="#">Poções</a></li>
            <li><a href="#">Força</a></li>
            <li><a href="#">Proteção</a></li>
        </ul>
    </div>

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Bem-Vindo!!!</h1>
        <p class="lead"> Eu tenho uma seleção de coisas boas para vender, Estranho. O que você vai comprar?</p>

    </header>

    <!-- Page Features -->
    <div class="row text-center">
    	<div id = "prod">
    		<img id = "imgprod" src = "<?=htmlspecialchars($produto['imagem'])?>">

    		<div>
                <span id="titulo" class="item"><?=htmlspecialchars($produto['nome'])?></span><br>
                <span id = "descricao" class="item"><?=htmlspecialchars($produto['descricao'])?></span><br><br>
                <span id="preco" class="item">Preço: <?=htmlspecialchars($produto['preco'])?></span><br><br>
                <span class="item" id="container_quant">
                    Quantidade: <br>
                    <span id="soma" class="botao" onclick="soma()">+</span>
                    <span id="diminui" onclick="diminui()" class="botao">-</span>
                    <span id="quantidade">1</span><br>
                </span>
                <a href="#" class="btn btn-primary"> Adicionar ao carrinho </a>

    		</div>

    	</div>

        

    </div>
    <!-- /.row -->
    <span id="recomendados" class="item">Recomendados</span>
    <div class="row text-center">
        <?php
        foreach($data as $row):
            ?>
            <div class="col-lg-3 col-md-6 mb-4" id="<?=htmlspecialchars($row['nome'])?>">
                <div class="card">
                    <img class="card-img-top" src="<?=htmlspecialchars($row['imagem'])?>" height="270" alt="">
                    <div class="card-body item">
                        <h4 class="card-title"> <?=htmlspecialchars($row['nome'])?> </h4>
                        <p class="card-text"> <?=htmlspecialchars($row['descricao'])?></p>
                        <p class="card-text"> R$ <?=htmlspecialchars($row['preco'])?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?="produto.php?produto=$row[codigo]"?>" class="btn btn-primary"> Ver detalhes </a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" id="footer">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ocarina 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="startbootstrap-heroic-features-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="startbootstrap-heroic-features-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    "use strict";
    function soma(){

        let element = document.getElementById("quantidade");
        let num = parseInt(element.innerHTML);
        if(num < 9){
            num++;
            element.innerHTML = num.toString();
        }


    }

    function diminui(){

        let element = document.getElementById("quantidade");
        let num = parseInt(element.innerHTML);
        if(num > 1){
            num--;
            element.innerHTML = num.toString();
        }

    }
</script>

	</html>
