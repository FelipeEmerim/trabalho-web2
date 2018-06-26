<?php
    session_start();
    if(!(isset($_SESSION['usuario']))|| $_SESSION['admin'] == 0){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>



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


</head>

<body>
<div id="targetdiv"></div>

<!-- Page Content -->
<div class="container">


    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Bem-Vindo!!!</h1>
        <p class="lead">Gerencie seus usuarios aqui</p>

    </header>
    <div id="mensagens"></div>
    <form class = 'busca' onsubmit="buscaUsuario(document.getElementById('user-busca').value); return false"
          style="left:400px; margin-top:40px;">
        <input type="text" id="user-busca" placeholder="Buscar"/>
        <button type="submit" name="buscar" class="buscar">Go</button>
    </form>
    <div id="usuarios"></div>
    <!-- Page Features -->

    <!-- /.row -->


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
<script>
    $('#targetdiv').load('staticTop.php');
    $('#usuarios').load('usuariosControle.php', {action:'tabela'});
</script>
<script src="pesquisa.js"></script>

<script>

    function fecha(element){
        element.setAttribute("class", "secreto");
    }

    function remove(cod){

        $.post('usuariosControle.php', {action: 'remove', codigo: cod}, function(){
            $('#mensagens').text('Usuario excluido com sucesso').prop('class', 'sucesso');
            setTimeout(function(){
                fecha(document.getElementById('mensagens'));
            }, 4000);
            $('#usuarios').load('usuariosControle.php', {action: 'tabela'});
        });
    }

    function buscaUsuario(pesq){
        console.log(pesq);
        $('#usuarios').load('usuariosControle.php', {action: 'tabela', pesquisa: pesq});
    }
</script>


</body>
