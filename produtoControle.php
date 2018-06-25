<?php
session_start();

if(!(isset($_SESSION['usuario']))){
    $data = ['redirect'=> true];
    echo json_encode($data);
    exit();
}

switch($_POST['action']){

    case 'info':

        $codigo = $_POST['codigo'];
        $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

        $comando = $pdo->prepare('SELECT COUNT(*) AS cont FROM produtos WHERE codigo = ?');
        $comando->execute(array($codigo));

        $result = $comando->fetch(PDO::FETCH_ASSOC);

        if($result['cont'] <= 0){
            $data = ['falha'=>true, 'msg'=>'Tentou, mas fracassou'];
            echo json_encode($data);
            exit();
        }

        $comando = $pdo->prepare('SELECT nome, descricao, categoria, preco FROM produtos WHERE codigo = ?');
        $comando->execute(array($codigo));

        $data = $comando->fetch(PDO::FETCH_ASSOC);
        echo json_encode($data);

        break;

    case 'cadastra':
        $quantidade = $_POST['quantidade'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];

        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        }

        foreach($_SESSION['carrinho'] as $key=>$produto){
            if(in_array($nome, $produto)){
                unset($_SESSION['carrinho'][$key]);
                break;
            }
        }

        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);

        if($quantidade > 9 || $quantidade < 1){
            $quantidade = 1;
        }

        $valor = $quantidade*$preco;

        $produto = array('nome'=>$nome, 'descricao'=>$descricao, 'categoria'=>$categoria, 'quantidade'=>$quantidade,
            'preco'=>$preco, 'valor'=>$valor);

        array_push($_SESSION['carrinho'], $produto);
        $data = ['sucesso'=>true, 'msg'=>"Produto $nome adicionado ao carrinho"];
        echo json_encode($data);
        break;
}
