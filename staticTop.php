<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container" id="container">

        <a class="navbar-brand" href="index.php" id="logo"> Ocarina </a>

        <form id="busca" class="busca" onsubmit="busca(document.getElementById('txtBusca').value); return false">
            <input type="text" id="txtBusca" placeholder="Buscar"/>
            <button class="buscar" type="submit" name="buscar" id="buscar">Go</button>
        </form>

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
                    <a class="nav-link" href="carrinho.php" id="ver"> Ver Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faleConosco.php" id="fale">Fale Conosco</a>
                </li>
                <?php
                if(isset($_SESSION['usuario'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" id="logado"><?=htmlspecialchars($_SESSION['usuario'])?></a>
                    <div id = "escondida">
                        <span><?=htmlspecialchars($_SESSION['email'])?></span><br>
                        <?php if($_SESSION['admin'] == 1):?>
                        <a href="usuarios.php">Ver usuarios</a><br>
                        <?php endif; ?>
                        <a href = "logout.php">logout</a>
                    </div>
                </li>

                <?php
                else:
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="login.php" id="login">Login</a>
                </li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

     <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="button"> Categorias
            <span class="caret"></span></button>
        <ul id="itens">
            <li><a href="#" onclick="busca('potions')">Poções</a></li>
            <li><a href="#" onclick="busca('strength')">Força</a></li>
            <li><a href="#" onclick="busca('defense')">Proteção</a></li>
        </ul>
    </div>
</div>

<script>
    $("#logado").click(function(){
        $("#escondida").fadeToggle();
    });

    $("#button").click(function(){
        $("#itens").fadeToggle();
    })
</script>

