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

    <link rel="stylesheet" type="text/css" href="pageStyle.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=MedievalSharp');

        .secreto{
            display:none;
        }

        .erro{
            display:block;
            font-family: 'MedievalSharp', cursive;
            font-size:18px;
            border-radius: 15px;
            margin-left: 200px;
            background: red;
            height: 40px;
            line-height: 40px;
        }

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
            height: 400px;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #ffffff;
        }

        #cad{
            font-family: 'MedievalSharp', cursive;
            color: #a07e04;
            margin-left: 220px;
            border: 1px solid #856404;
            margin-top: 60px;
            width: 800px;
            height: 300px;
            padding-top: 20px;
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
            height: 110%;
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
        <h1 class="display-3"> Cadastre-se!!!</h1>
        <p class="lead"> Se identifique aqui, estranho. </p>

    </header>

    <!-- Page Features -->
    <!--erros -->
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
    <div class="row text-center">

        <form onsubmit= "return valida()" action="sadas" method="POST" id="cad">
            <input type="hidden" name="recipient" value="testeiseuemail@gmail.com"> <!-- Pode ser qualquer endereço de email -->
            <input type="hidden" name="redirect" value="http://seudominio"> <!-- Após o envio, o usuário será redirecionado para a página configurada aqui -->
            <input type="hidden" name="subject" value="teste de assunto">  <!-- Assunto da mensagem -->
            <input type="hidden" name="email" value="email@doseudominio">   <!-- Deve ser uma conta de email ativa em seu domínio -->


            <label for="nome">Nome:</label>
            <input id="nome" type="text" size="30" name="nome" required> <br/>

            <label for="endereco">Endereço:</label>
            <input id="endereco" type="text" size="50" name="endereco" required> <br/>

            <label for="dt">Data de Nascimento:</label>
            <input id="dt" type="text" size="50" name="dt"> <br/>
            Sexo:
            <label for="masc">Masculino</label>
            <input id="masc" type="radio" name="gender" value="male" checked>
            <label for="fem">Feminino</label>
            <input id="fem" type="radio" name="gender" value="female"><br>

            <label for="email">E-mail:</label>
            <input id="email" type="text" size="30" name="email" required> <br/>

            <label for="senha">Senha:</label>
            <input id="senha" type="password" size="30" name="senha" required> <br/>


            <button type="submit" name="BTEnvia" value="Enviar" formmethod="POST" class="btn btn-primary">Enviar</button>
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

</body>
<script>

    function fecha(element){
        element.setAttribute("class", "secreto");
    }

    function valida(){
        let flag = true;
        if(!(this.email.value.match(/[^@]+@[^@]+\./))){
            flag = false;
            document.getElementById("erro_email").setAttribute("class", "erro");
            setTimeout(function () {
                fecha(document.getElementById('erro_email'));
            }, 4000);
            this.email.focus();
        }
        else{
            document.getElementById("erro_email").setAttribute("class", "secreto");
        }

        if(!(this.dt.value.match(/\d{2}\/\d{2}\/\d{4}/))){
            flag = false;
            document.getElementById("erro_data").setAttribute("class", "erro");
            setTimeout(function(){
                fecha(document.getElementById("erro_data"))
            }, 4000);
            this.dt.focus();
        }
        else{
            document.getElementById("erro_data").setAttribute("class", "secreto");
        }
        if(!(this.senha.value.match(/[A-Z]+[a-z]*[0-9]+/)) || this.senha.value.length < 5){

            flag = false;
            document.getElementById("erro_senha").setAttribute("class", "erro");
            setTimeout(function(){
                fecha(document.getElementById("erro_senha"))
            }, 4000);
            this.senha.focus();
        }
        else{
            document.getElementById("erro_senha").setAttribute("class", "secreto");
        }

        return flag;
    }
</script>
</html>