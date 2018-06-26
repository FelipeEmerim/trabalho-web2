<?php
if(!(isset($_POST['request']))){
    header('Location: index.php');
}
session_start();
$acm = 0
?>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=MedievalSharp');

        #tabela{
            color: #a07e04;
            font-family: 'MedievalSharp', cursive;

        }

    </style>
</head>

<!-- Page Features -->
<div class="row text-center">
    <table border ="1" id="tabela">

        <?php
        if(isset($_SESSION['carrinho'])):
            ?>
            <tr>
                <th width="285"> Produto </th>
                <th width="285"> Categoria </th>
                <th width="285"> Descrição </th>
                <th width="30">Quantidade</th>
                <th width="285">Preco</th>
                <th width="285"> Total </th>
                <th width="285"> Remover Item</th>

            </tr>
            <?php
            foreach($_SESSION['carrinho'] as $produto):?>

                <tr>
                    <td width="285"><?=htmlspecialchars($produto['nome'])?></td>
                    <td width="285"><?=htmlspecialchars($produto['categoria'])?></td>
                    <td width="285"><?=htmlspecialchars($produto['descricao'])?></td>
                    <td width="30"><?=htmlspecialchars($produto['quantidade'])?></td>
                    <td width="285"><?=htmlspecialchars($produto['preco'])?></td>
                    <td width="285"><?=htmlspecialchars($produto['valor'])?></td>
                    <td><button class="btn btn-danger" onclick="remove('<?=htmlspecialchars($produto['nome'])?>')">X</button></td>


                </tr>

            <?php
            $acm += $produto['valor'];
            endforeach;
            ?>
            <tr>
                <td width="285"></td>
                <td width="285"></td>
                <td width="285"></td>
                <td width="30"></td>
                <td width="285"></td>
                <td width="570">Total do carrinho: R$: <?=htmlspecialchars($acm)?></td>


            </tr>
        <?php
        else:
            ?>
            <tr>Nenhum produto no seu carrinho</tr>
        <?php endif;?>
    </table>

</div>

<?php if(isset($_SESSION['carrinho'])):?>
    <button class="button" type="button" id="b1" onclick="limpar()"> Limpar Carrinho
        <span class="button"></span>
    </button>
<?php endif; ?>

<button class="button" type="button" id="b2" onclick="window.location.replace('index.php')"> Continuar comprando
    <span class="button caret"></span>
</button>

<?php if(isset($_SESSION['carrinho'])):?>
    <button class="button" type="button" id="b3"> Comprar
        <span class="button"></span>
    </button>
<?php endif; ?>