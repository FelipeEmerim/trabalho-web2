<?php

if(!(isset($_POST['action']))){
    header('Location:index.php');
}

$pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

switch($_POST['action']) {

    case 'tabela':

        if(!(isset($_POST['pesquisa'])) || strlen($_POST['pesquisa']) <= 0) {

            $comando = $pdo->prepare('SELECT * FROM cadastros');
            $comando->execute();
            $data = $comando->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $pesquisa = strtolower(trim($_POST['pesquisa']));
            $pesquisa = filter_var($pesquisa, FILTER_SANITIZE_STRING);

            $comando = $pdo->prepare('SELECT * FROM cadastros WHERE LOWER(nome) LIKE ? OR LOWER(nome) LIKE ? 
            OR LOWER(nome) LIKE ? OR LOWER(sexo) LIKE  ? OR LOWER(data) LIKE ? OR LOWER(email) LIKE ? OR 
            LOWER(endereco) LIKE ?');

            $comando->execute(array($pesquisa, "$pesquisa%", "% $pesquisa%", $pesquisa, $pesquisa, $pesquisa, $pesquisa));
            $data = $comando->fetchAll(PDO::FETCH_ASSOC);
        }

        ?>

        <head>
            <style>
                @import url('https://fonts.googleapis.com/css?family=MedievalSharp');

                #tabela {
                    margin-top: 40px;
                    color: #a07e04;
                    font-family: 'MedievalSharp', cursive;

                }

            </style>
        </head>

        <!-- Page Features -->
        <div class="row text-center">
            <table border="1" id="tabela">

                <?php
                if (count($data) > 0):
                    ?>
                    <tr>
                        <th width="285"> Nome</th>
                        <th width="285"> Email</th>
                        <th width="285"> Endereco</th>
                        <th width="30">Sexo</th>
                        <th width="285">Data de nascimento</th>
                        <th width="285"> Remover Usuario</th>

                    </tr>
                    <?php
                    foreach ($data as $usuario):?>

                        <tr>
                            <td width="285"><?= htmlspecialchars($usuario['nome']) ?></td>
                            <td width="285"><?= htmlspecialchars($usuario['email']) ?></td>
                            <td width="285"><?= htmlspecialchars($usuario['endereco']) ?></td>
                            <td width="30"><?= htmlspecialchars($usuario['sexo']) ?></td>
                            <td width="285"><?= htmlspecialchars($usuario['data']) ?></td>
                            <td>
                                <button class="btn btn-danger"
                                        onclick="remove('<?= htmlspecialchars($usuario['codigo']) ?>')">X
                                </button>
                            </td>


                        </tr>

                    <?php

                    endforeach;

                else:
                    ?>
                    <tr>Nenhum usuario encontrado</tr>
                <?php endif; ?>
            </table>

        </div>

        <?php break;

    case 'remove':
        $comando = $pdo->prepare('DELETE FROM cadastros WHERE codigo = :codigo');
        $comando->bindValue(':codigo', intval($_POST['codigo']), PDO::PARAM_INT);
        $comando->execute();
        exit();
}


