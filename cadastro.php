<?php
    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    switch($_GET['action']){
        case 'getUser':
            $comando = $pdo->prepare("SELECT count(*) AS cont FROM cadastros WHERE nome = ?");
            $comando->execute(array($_GET['nome']));
            $data = $comando->fetch(PDO::FETCH_ASSOC);
            echo json_encode($data);
            break;

        case 'cadastro':
            $comando = $pdo->prepare("SELECT count(*) AS cont FROM cadastros WHERE nome = ?");
            $comando->execute(array($_GET['nome']));
            $data = $comando->fetch(PDO::FETCH_ASSOC);
            if($data['cont'] <= 0){
                $data = ['succeso'=> false, 'msg'=>'O usuário já existe'];
                echo json_encode($data);
                exit();
            }

            $nome = $_GET['nome'];
            $nome = trim($nome);
            $s_nome = filter_var($nome, FILTER_SANITIZE_STRING);
            if(strlen($s_nome) <= 0){
                $data= ['sucesso'=>false, 'msg'=>'Nome de usuário invalido'];
                echo json_encode($data);
                exit();
            }

            $endereco = $_GET['endereco'];
            $endereco = trim($endereco);
            $s_endereco = filter_var($endereco, FILTER_SANITIZE_STRING);
            if(strlen($s_nome) <= 0){
                $data= ['sucesso'=>false, 'msg'=>'endereco invalido'];
                echo json_encode($data);
                exit();
            }

            $date = $_GET['data'];
            $date = trim($date);
            $s_date = filter_var($date, FILTER_SANITIZE_STRING);
            if (!filter_var($s_date, FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/\d{2}\/\d{2}\/\d{4}/")))){
                $data= ['sucesso'=>false, 'msg'=>'data de nascimento invalida'];
                echo json_encode($data);
                exit();
            }

            $sexo = $_GET['sexo'];
            $sexo = trim($sexo);
            $s_sexo = filter_var($sexo, FILTER_SANITIZE_STRING);
            if (!filter_var($s_sexo, FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/(?:masculino|feminino)/")))){
                $data= ['sucesso'=>false, 'msg'=>'sexo invalido'];
                echo json_encode($data);
                exit();
            }

            $email = $_GET['email'];
            $email = trim($email);
            $s_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($s_email, FILTER_VALIDATE_EMAIL)){
                $data= ['sucesso'=>false, 'msg'=>'email invalido'];
                echo json_encode($data);
                exit();
            }

            $senha = $_GET['senha'];
            $senha = trim($senha);
            $s_senha = filter_var($senha, FILTER_SANITIZE_STRING);
            if(strlen($s_senha <= 0)){
                $data= ['sucesso'=>false, 'msg'=>'senha invalida'];
                echo json_encode($data);
                exit();
            }
//            $s_senha = password_hash($s_senha, PASSWORD_DEFAULT);
//            $comando = $pdo->prepare("INSERT INTO cadastros(nome, endereco, data, sexo, email, senha)
//            VALUES(?, ?, ?, ?, ?, ?)");
            $comando->execute(array($s_nome, $s_endereco, $s_date, $s_sexo, $s_email, $s_senha));
            $data= ['sucesso'=>true, 'msg'=>'cadastro realizado com sucesso'];
            break;

    }