<?php
session_start();
$acm = 0
?>

<!-- Page Features -->
<div class="row text-center">
    <table border ="1">

        <?php
        if(isset($_SESSION['carrinho'])):
            ?>
            <tr>
                <th width="285"> Produto </th>
                <th width="285"> Categoria </th>
                <th width="285"> Descrição </th>
                <th width="285"> Valor </th>
                <th width="285"> Remover Item</th>

            </tr>
            <?php
            foreach($_SESSION['carrinho'] as $produto):?>

                <tr>
                    <td width="285"><?="$produto[nome]"?></td>
                    <td width="285"><?="$produto[categoria]"?></td>
                    <td width="285"><?="$produto[descricao]"?></td>
                    <td width="285"><?="$produto[valor]"?></td>
                    <td><button class="btn btn-danger" onclick="remove('<?=$produto['nome']?>')">X</button></td>


                </tr>

            <?php
            $acm += $produto['valor'];
            endforeach;
            ?>
            <tr>
                <td width="285"></td>
                <td width="285"></td>
                <td width="285"></td>
                <td width="570">Total do carrinho: R$: <?="$acm"?></td>


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