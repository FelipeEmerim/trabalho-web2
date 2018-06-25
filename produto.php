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

    <link rel="stylesheet" type="text/css" href="estilos.css">

    <style>
    @import url('https://fonts.googleapis.com/css?family=MedievalSharp');


    #prod{
        width: 1100px;
        height: 450px;
        background: #303030;
        margin-top: 2%;
        margin-bottom: 5%;
        margin-left: 2%;
        border-radius: 3%;
        font-family: 'MedievalSharp', cursive;
        color: #a07e04;

    }

    #recomend, #recomendados{
        font-family: 'MedievalSharp', cursive;
        color: #a07e04;


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
    <div id="targetdiv"></div>

<!-- Page Content -->


    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Bem-Vindo!!!</h1>
        <p class="lead"> Eu tenho uma seleção de coisas boas para vender, Estranho. O que você vai comprar?</p>

    </header>
    <div class="container">
    <!-- Page Features -->
    <div class="row text-center">
        <div class="secreto" id="mensagens"></div>
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
                <button type="button" onclick="cadastra()" class="btn btn-primary"> Adicionar ao carrinho </button>

    		</div>

    	</div>

        

    </div>
    <!-- /.row -->
    <span id="recomendados" class="item">Recomendados</span>
    <div class="row text-center" id="recomend">
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
<script>$('#targetdiv').load('staticTop.php');</script>
<script src="pesquisa.js"></script>


</body>
<script>
    "use strict";

    function fecha(element){
        element.setAttribute("class", "secreto");
    }

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

    function cadastra(){

        let url = window.location.href;
        let cod = url.substring(url.indexOf('=')+1);
        $.post('produtoControle.php', {action: "info", codigo: parseInt(cod)}, function(data){

            if(typeof(data.redirect) === "boolean"){
                window.location.replace('login.php');
            }

            if(typeof(data.falha) !== "undefined"){
                $("#mensagens").text(data.msg).prop('class', 'erro').css({width:'700px'});

                setTimeout(function(){
                    fecha(document.getElementById('mensagens'));
                }, 4000);
                return;
            }

            $.post('produtoControle.php', {action: 'cadastra', codigo: cod, nome: data.nome, descricao: data.descricao,
                    preco: data.preco, categoria: data.categoria,
                    quantidade:parseInt(document.getElementById('quantidade').innerHTML)},
                function(data){
                    $("#mensagens").text(data.msg).prop('class', 'sucesso').css({width:'700px'});

                    setTimeout(function(){
                        fecha(document.getElementById('mensagens'));
                    }, 4000);
                }, 'json');

        }, 'json');

    }

</script>

	</html>
