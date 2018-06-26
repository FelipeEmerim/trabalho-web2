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
            margin-left: 50px;
            position: relative;
            left:-20px;
            border: 1px solid #856404;
            margin-top: 20px;
            padding: 15px;
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

        #cadLink{

            position: relative;
            left: 450px;
        }


    </style>
</head>

<body>

    <div id="targetdiv"> </div>

<!-- Page Content -->
    <div class="container">

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

    <div class = "secreto" id = "erro_php">
        <span class = "close" onclick = "fecha(document.getElementById('erro_php'))">X</span>
    </div><br>

    <div class="row text-center">

        <form onsubmit="return valida()" method="POST" id="form">

                <label for="email">E-mail:</label> <br/>
                <input id="email" type="text" size="50" name="email" required> <br/>

                <label for="senha">Senha:</label> <br/>
                <input id="senha" type="password" size="30" name="senha" required> <br/><br/>

            <button type="submit" id="enviar" name="enviar" value="1" class="btn btn-primary">Enviar</button>
        </form>

        <span>
            <a href="cadastro.php" id="cadLink"> <u>Não possui cadastro conosco?</u></a>
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
<script>$('#targetdiv').load('staticTop.php');</script>
<script src="pesquisa.js"></script>

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
        if(validaSenha() & validaEmail()) {

            $.post('loginControle.php', {
                email: $("#email").val(),
                senha: $("#senha").val(),
                request: true
            }, function (data) {
                if (data.sucesso) {
                    $("#erro_php").text(data.msg).prop('class', 'sucesso');
                    setTimeout(function () {
                        window.location.replace('index.php');
                    }, 2500);
                    $('#targetdiv').load('staticTop.php');

                } else {
                    $("#erro_php").text(data.msg).prop('class', 'erro');
                }

                setTimeout(function () {
                    fecha(document.getElementById("erro_php"))
                }, 4000);
            }, 'json');
        }

            return false;
    }

</script>

</body>

</html>

