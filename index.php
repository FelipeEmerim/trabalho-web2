<!DOCTYPE html>
<?php
    header("Content-type:text/html;charset='utf-8'",true);
    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    $comando = $pdo->prepare("SELECT * FROM produtos ORDER BY rand() LIMIT 8");
    $comando->execute();
    $data = $comando->fetchAll(PDO::FETCH_ASSOC);
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
        #fale:hover, #login:hover, #ver:hover, #home:hover, #logo:hover{
            color: red;
        }

    </style>


</head>

<body>
    <div id="targetdiv"></div>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" id="retangulo">
        <h1 class="display-3"> Bem-Vindo!!!</h1>
        <p class="lead"> Eu tenho uma seleção de coisas boas para vender, Estranho. O que você vai comprar?</p>

    </header>

    <!-- Page Features -->
    <div class="row text-center" id = "destaque">

        <?php
        foreach($data as $row):
            ?>
            <div class="col-lg-3 col-md-6 mb-4" id="<?=htmlspecialchars($row['nome'])?>">
                <div class="card">
                    <img class="card-img-top" src="<?=htmlspecialchars($row['imagem'])?>" height="270" alt="">
                    <div class="card-body item">
                        <h4 class="card-title"> <?=htmlspecialchars($row['nome'])?> </h4>
                        <p class="card-text"> <?=htmlspecialchars($row['descricao'])?></p>
                        <p class="card-text"> R$ <?=htmlspecialchars($row['preco'])?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?="produto.php?produto=$row[codigo]"?>" class="btn btn-primary"> Ver detalhes </a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
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

