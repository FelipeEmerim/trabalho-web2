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
        <style>
        
        @import url('https://fonts.googleapis.com/css?family=MedievalSharp');
        
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
        height: 350px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #ffffff;
      }
      .item{
        font-family: 'MedievalSharp', cursive;
        color: #a07e04;
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
        height: 100%;
        width: 100%;
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

        #prod{
        	width: 1100px;
    		height: 400px;
    		background: white;
    		margin-top: 2%;
    		margin-bottom: 5%;
    		margin-left: 2%;
    		border-radius: 3%;
    		font-family: 'MedievalSharp', cursive;

        }

        

        #imgprod{
        	width: 380px;
    		height: 380px;
    		border-radius: 3%;
    		margin-top: 1%;
    		margin-left: 1%;
    		float: left;
        	
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
                    <a class="nav-link" href="http://localhost:63342/Projeto_Web/startbootstrap-heroic-features-gh-pages/index.html?_ijt=fqj38ecpmtudnc82f8cf6i51sd" id="home"> Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:63342/Projeto_Web/startbootstrap-heroic-features-gh-pages/cadastro.html?_ijt=i6m50c571ockul4vr2k4ulfr5v" id="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="ver"> Ver Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:63342/Projeto_Web/startbootstrap-heroic-features-gh-pages/faleConosco.html?_ijt=hrv1u29275kmj6eojatgt34n62" id="fale">Fale Conosco</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Bem-Vindo!!!</h1>
        <p class="lead"> Eu tenho uma seleção de coisas boas para vender, Estranho. O que você vai comprar?</p>

    </header>

    <!-- Page Features -->
    <div class="row text-center">
    	<div id = "prod">
    		<img id = "imgprod" src = "https://pre00.deviantart.net/b631/th/pre/f/2015/229/8/3/skyrim_potions_2nd_set___tes_5_by_etrelley-d962aqm.png">;

    		<div>
    		
    		</div>

    	</div>

        

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

	</html>
