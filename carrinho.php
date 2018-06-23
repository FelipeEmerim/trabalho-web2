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
            margin-left: 310px;
            border: 1px solid #856404;
            margin-top: 20px;
            width: 500px;
            height: 300px;
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
    <div id="targetdiv">
    </div>

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Carrinho!!!</h1>
        <p class="lead"> Aqui estão seus itens. </p>

    </header>

    <!-- Page Features -->
    <div class="row text-center">


        <form action="#" method="POST" id="form">

                <label for="email">E-mail:</label> <br/>
                <input id="email" type="text" size="50" name="replyto" required> <br/>

                <label for="senha">Senha:</label> <br/>
                <input id="senha" type="password" size="30" name="senha" required> <br/><br/>

                <button type="submit" id="enviar"  name="enviar" value="1" formmethod="POST" class="btn btn-primary">Enviar</button><br/><br/>

                <span class="nav-item">
                    <a class="nav-link" href="cadastroControle.php" id="fale"> <u>Não possui cadastro conosco?</u></a>
                </span>
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
    <script>$('#targetdiv').load('staticTop.php');</script>


</body>

</html>