<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}
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

        #foot{
            height: 80px;
            margin-top: 100px;
        }

    </style>
</head>

<body>

<!-- Navigation -->


<div id = "targetdiv"></div>
<!-- Page Content -->
<div class="container">

<!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Carrinho!!!</h1>
        <p class="lead"> Aqui estão seus itens. </p>

    </header>
    <div id="php_msg" class="secreto" style="margin-bottom: 40px"></div>
    <div id="carrinho"></div>

<!-- /.container -->

<!-- Footer -->
</div>
<footer class="py-5 bg-dark" id="foot">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ocarina 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="startbootstrap-heroic-features-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="startbootstrap-heroic-features-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="pesquisa.js"></script>
<script>

    $('#targetdiv').load('staticTop.php');
    $('#carrinho').load('itens.php', {request:true});

    function remove(produto){

        $.post('carrinhoControle.php', {action: 'remove', nome: produto}, function(data){
            if(typeof(data.sucesso) !== "undefined"){
                $('#carrinho').load('itens.php', {request:true});
                $('#php_msg').text(produto+" removido do carrinho").prop('class', 'sucesso');
            }
        }, 'json');
    }

    function limpar(){
        $.post('carrinhoControle.php', {action: 'limpar'}, function(){
            $('#carrinho').load('itens.php', {request:true});
            $('#php_msg').text("Todos os itens removidos do carrinho").prop('class', 'sucesso');
        });
    }

</script>

</body>

</html>