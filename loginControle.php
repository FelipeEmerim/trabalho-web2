<?php

    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    $email = $_POST['email'];
    $email = trim($email);
    $s_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($s_email, FILTER_VALIDATE_EMAIL)){
        $data= ['sucesso'=>false, 'msg'=>'email invalido'];
        echo json_encode($data);
        exit();
    }
    $senha = $_POST['senha'];
    $senha = trim($senha);
    $s_senha = filter_var($senha, FILTER_SANITIZE_STRING);
    if(!filter_var($s_senha,FILTER_VALIDATE_REGEXP, array(
        "options"=>array("regexp"=>"/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{5,}$/")))){
        $data= ['sucesso'=>false, 'msg'=>'senha invalida'];
        echo json_encode($data);
        exit();
    }

    $comando = $pdo->prepare('SELECT COUNT(*) AS cont FROM cadastros WHERE email = ?');

    $comando->execute(array($s_email));

    $result = $comando->fetch(PDO::FETCH_ASSOC);

    if($result['cont'] <= 0){
            $data = ['sucesso'=>false, 'msg'=>'Usuario nao encontrado'];
            echo json_encode($data);
            exit();
        }

    $comando = $pdo->prepare('SELECT * FROM cadastros WHERE email = ?');

    $comando->execute(array($s_email));

    $result = $comando->fetch(PDO::FETCH_ASSOC);

    if(!(password_verify($_POST['senha'], $result['senha']))){
        $data = ['sucesso'=>false, 'msg'=>'Senha incorreta'];
        echo json_encode($data);
        exit();
    }

    $data = ['sucesso'=>true, 'msg'=>"Seja bem-vindo: $result[nome]"];
    $_SESSION['usuario'] = $result['nome'];
    $_SESSION['email'] = $result['email'];
    echo json_encode($data);
?>