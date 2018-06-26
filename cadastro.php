<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['usuario'])){
    header('Location: index.php');
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

        #cad{
            position: relative;
            top: -150px;
            left: -50px;

        }

        #footer{
            height: 80px;
            margin-top: 153px;
        }

        .close{
            float:left;
            color:blue;
            margin-left: 10px;
            margin-top: 10px;
            margin-right:50px;
        }
    </style>


</head>

<body>
    <div id="targetdiv"></div>

    <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Cadastre-se!!!</h1>
        <p class="lead"> Se identifique aqui, estranho. </p>

    </header>
    <!-- Page Features -->
    <!--erros -->
    <div id="erro_container">
        <div class = "secreto" id = "erro_nome">
            O nome informado não é valido
            <span class = "close" onclick = "fecha(document.getElementById('erro_email'))">X</span>
        </div><br>
        <div class = "secreto" id = "erro_endereco">
            O endereco informado não é valido
            <span class = "close" onclick = "fecha(document.getElementById('erro_email'))">X</span>
        </div><br>
        <div class = "secreto" id = "erro_email">
            O email informado não é valido
            <span class = "close" onclick = "fecha(document.getElementById('erro_email'))">X</span>
        </div><br>
        <div class = "secreto" id = "erro_data">
            A data informada não é valida
            <span class = "close" onclick = "fecha(document.getElementById('erro_data'))">X</span>
        </div><br>
        <div class = "secreto" id = "erro_senha">
            A senha deve possuir pelo menos 5 caracteres, 1 maiusculo e 1 numero e nenhum especial
            <span class = "close" onclick = "fecha(document.getElementById('erro_senha'))">X</span>
        </div><br>
        <div class = "secreto" id = "erro_email2">
            Este email já existe
        </div><br>
        <div class = "secreto" id = "erro_php">
        </div><br>
    </div>
    <div class="row text-center">

        <form onsubmit= "return valida()"  id="cad">

            <label for="nome">Nome:</label>
            <input id="nome" type="text" size="30" name="nome" required> <br/>

            <label for="endereco">Endereço:</label>
            <input id="endereco" type="text" size="50" name="endereco" required> <br/>

            <label for="dt">Data de Nascimento:</label>
            <input id="dt" type="text" size="50" name="dt"> <br/>
            Sexo:
            <label for="masc">Masculino</label>
            <input id="masc" type="radio" name="gender" value="masculino" checked>
            <label for="fem">Feminino</label>
            <input id="fem" type="radio" name="gender" value="feminino"><br>

            <label for="email">E-mail:</label>
            <input id="email" type="text" size="30" name="email" required> <br/>

            <label for="senha">Senha:</label>
            <input id="senha" type="password" size="30" name="senha" required> <br/>


            <button type="submit" id="enviar"  name="enviar" value="1" class="btn btn-primary">Enviar</button>
        </form>

    </div>
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
<script>$('#targetdiv').load('staticTop.php');</script>
<script src="pesquisa.js"></script>


</body>
<script>

    function fecha(element){
        element.setAttribute("class", "secreto");
    }

    function validaNome(){
        if(!(this.nome.value.match(/^[a-zA-Z ]{3,}$/)) || this.nome.value.length > 50) {
            document.getElementById('erro_nome').setAttribute('class', 'erro');
            setTimeout(function () {
                fecha(document.getElementById('erro_email'));
            }, 4000);
            this.nome.focus();
            return false;
        }

        document.getElementById('erro_nome').setAttribute('class', 'secreto');
        return true

    }

    function validaEndereco(){
        if(!(this.endereco.value.match(/^[a-zA-Z0-9, ]{10,}$/)) || this.endereco.value.length > 150){
            document.getElementById('erro_endereco').setAttribute('class', 'erro');
            setTimeout(function () {
                fecha(document.getElementById('erro_endereco'));
            }, 4000);
            this.endereco.focus();
            return false;
        }

        document.getElementById('erro_endereco').setAttribute('class', 'secreto');
        return true;

    }

    function validaEmail(){
        if(!(this.email.value.match(/[^@]+@[^@]+./)) || this.email.value.length > 70){

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

    function validaData(){
        if(!(this.dt.value.match(/\d{2}\/\d{2}\/\d{4}/))){
            document.getElementById("erro_data").setAttribute("class", "erro");
            setTimeout(function(){
                fecha(document.getElementById("erro_data"))
            }, 4000);
            this.dt.focus();
            return false;
        }

        document.getElementById("erro_data").setAttribute("class", "secreto");
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

        if (validaData() & validaEmail() & validaNome() & validaEndereco() & validaSenha()){
            $.post('cadastroControle.php', {action:'cadastro', nome:$("#nome").val(), endereco:$("#endereco").val(),
            data:$("#dt").val(), sexo:$('input[name=gender]:checked').val(), email:$("#email").val(),
            senha:$("#senha").val()}, function (data) {

                if(data.sucesso){
                    $("#erro_php").text(data.msg).prop('class', 'sucesso');
                    $('#targetdiv').load('staticTop.php');
                    setTimeout(function(){
                        window.location.replace('index.php');
                    }, 4000);


                }else{
                    $("#erro_php").text(data.msg).prop('class', 'erro');
                }

                setTimeout(function(){
                            fecha(document.getElementById("erro_php"))}, 4000);

            }, 'json');
        }

        return false;
    }
    $('document').ready(function(){

        $("#email").on('focusout keyup', function(){

            $.post('cadastroControle.php', {action:"getUser", email:$("#email").val()}, function(data){
                if(data.cont[0] > 0){

                    $("#erro_email2").text("email ja cadastrado, escolha outro").css({display:"block"}).prop('class','erro');
                    $("#enviar").prop('disabled', true);
                }else{

                    $("#erro_email2").css({display:"none"});
                    $("#enviar").prop('disabled', false);
                }
            }, 'json');
        });
    });
</script>
</html>