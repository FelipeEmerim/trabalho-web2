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

    <style>
        @import url('https://fonts.googleapis.com/css?family=MedievalSharp');

        #form{
            font-family: 'MedievalSharp', cursive;
            color: #a07e04;
            margin-left: 15px;
            border: 1px solid #856404;
            margin-top: 20px;
            width: 1108px;
            height: 450px;
        }

        #foot{
            height: 80px;
            margin-top: 20px;

        }

        #enviar{

            background: #393939;
            border:none;
            color: #856404;
        }

         #enviar:hover{
            color: red ;
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
                    <a class="nav-link" href="cadastro.html" id="login">Login</a>
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
        <h1 class="display-3"> Fale conosco!!!</h1>
        <p class="lead"> Hey estranho, aqui é nosso canal de contato. </p>

    </header>

    <!-- Page Features -->
    <div class="row text-center">


        <form action="enviarEmail.php" method="POST" id="form">
            <input type="hidden" name="recipient" value="testeiseuemail@gmail.com"> <!-- Pode ser qualquer endereço de email -->
            <input type="hidden" name="redirect" value="http://seudominio"> <!-- Após o envio, o usuário será redirecionado para a página configurada aqui -->
            <input type="hidden" name="subject" value="teste de assunto">  <!-- Assunto da mensagem -->
            <input type="hidden" name="email" value="email@doseudominio">   <!-- Deve ser uma conta de email ativa em seu domínio -->

                <label for="nome">Nome:</label> <br/>
                <input id="nome" type="text" size="30" name="nome"> <br/>


                <label for="email">E-mail:</label> <br/>
                <input id="email" type="text" size="30" name="replyto"> <br/>


                <label for="comentarios">Comentários:</label> <br/>
                <textarea  id="comentarios" name = "comentarios" rows="10" cols="40" maxlength="500"></textarea> <br/>

                <input type="submit" name="BTEnvia" value="Enviar" id="enviar">
        </form>

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

</body>

</html>