<div class="row text-center" id = "destaque">

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    if(isset($_POST['pesquisa'])){
        $pesquisa = filter_var($_POST['pesquisa'], FILTER_SANITIZE_STRING);
        $pesquisa = strtolower($pesquisa);
        $comando = $pdo->prepare('SELECT * FROM produtos WHERE LOWER(nome) LIKE ? OR LOWER(nome) LIKE  ? 
OR LOWER(categoria) LIKE ? OR LOWER(nome) LIKE ?');
        $comando->execute(array("$pesquisa%", "% $pesquisa%", $pesquisa, $pesquisa));
        $data = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $comando = $pdo->prepare("SELECT * FROM produtos ORDER BY rand() LIMIT 8");
        $comando->execute();
        $data = $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    if(count($data) == 0){
        echo("<h2>Nenhum elemento corresponde á sua pesquisa</h2>");
    }
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