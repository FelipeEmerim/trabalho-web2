<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
?>
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

        #form{
            font-family: 'MedievalSharp', cursive;
            color: #a07e04;
            margin-left: 310px;
            border: 1px solid #856404;
            margin-top: 20px;
            padding: 15px;
        }

        #foot{
            height: 80px;
            margin-top: 100px;

        }

        #enviar{

        	background: #393939;
        	border:none;
        	color: #856404 ;
        }

        #enviar:hover{
        	color: red;

        }

        #fale:hover, #login:hover, #ver:hover, #home:hover, #logo:hover{
        	color: red;
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
                    <a class="nav-link" href="login.php" id="login">Login</a>
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
        <h1 class="display-3"> Login!!!</h1>
        <p class="lead"> Hey estranho, coloque seus dados para o reconhecermos. </p>

    </header>

    <!-- Page Features -->

    <div class = "secreto" id = "erro_email">
        O email informado não é valido
        <span class = "close" onclick = "fecha(document.getElementById('erro_email'))">X</span>
    </div><br>

    <div class = "secreto" id = "erro_senha">
        A senha deve possuir pelo menos 5 caracteres, 1 maiusculo e 1 numero e nenhum especial
        <span class = "close" onclick = "fecha(document.getElementById('erro_senha'))">X</span>
    </div><br>

    <div class="row text-center">

        <form onsubmit="return valida()" method="POST" id="form">

                <label for="email">E-mail:</label> <br/>
                <input id="email" type="text" size="50" name="replyto" required> <br/>

                <label for="senha">Senha:</label> <br/>
                <input id="senha" type="password" size="30" name="senha" required> <br/><br/>

                <button type="submit" id="enviar"  name="enviar" value="1" formmethod="POST" class="btn btn-primary">Enviar</button><br/><br/>
        </form>

        <span class="nav-item">
                    <a class="nav-link" href="cadastro.php" id="fale"> <u>Não possui cadastro conosco?</u></a>
        </span>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" id="foot">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Ocarina 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="startbootstrap-heroic-features-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="startbootstrap-heroic-features-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

    function fecha(element){
        element.setAttribute("class", "secreto");
    }

    function validaEmail(){
        if(!(this.email.value.match(/[^@]+@[^@]+./))){

            document.getElementById('erro_email').setAttribute('class', 'erro');
            setTimeout(function () {
                fecha(document.getElementById('erro_email'));
            }, 4000);
            this.email.focus();
            return false;
        }

        document.getElementById('erro_email').setAttribute('class', 'secreto');
        return true;

    }

    function validaSenha(){
        if(!(this.senha.value.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{5,}$/)) || this.senha.value.length < 5){

            document.getElementById("erro_senha").setAttribute("class", "erro");
            setTimeout(function(){
                fecha(document.getElementById("erro_senha"))
            }, 4000);
            this.senha.focus();
            return false;
        }

        document.getElementById("erro_senha").setAttribute("class", "secreto");
        return true;

    }

    function valida(){
        if(validaEmail() & validaSenha()){
            console.log('to do');
            return true;
        }
        return false;

    }

</script>

</body>

</html>

