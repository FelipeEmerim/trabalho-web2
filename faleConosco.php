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


    </style>
</head>

<body>
    <div id="targetdiv">
    </div>

<!-- Navigation -->


    <div class="container">

<!-- Page Content -->

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Fale conosco!!!</h1>
        <p class="lead"> Hey estranho, aqui é nosso canal de contato. </p>

    </header>
    <!-- Page Features -->
    <div class="row text-center">


        <form action="enviarEmail.php" method="POST" id="form">

                <label for="nome">Nome:</label> <br/>
                <input id="nome" type="text" size="30" name="nome"> <br/>

                <label for="email">E-mail:</label> <br/>
                <input id="email" type="text" size="30" name="email"> <br/>

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
<script>$('#targetdiv').load('staticTop.php');</script>
<script src="pesquisa.js"></script>

</body>

</html>