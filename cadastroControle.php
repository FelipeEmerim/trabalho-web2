<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=loja_virtual', 'root', '');

    if(!(isset($_POST['action']))){
        header('Location: login.php');
    }

    switch($_POST['action']){
        case 'getUser':
            $comando = $pdo->prepare("SELECT count(*) AS cont FROM cadastros WHERE email = ?");
            $comando->execute(array($_POST['email']));
            $data = $comando->fetch(PDO::FETCH_ASSOC);
            echo json_encode($data);
            break;

        case 'cadastro':
            $comando = $pdo->prepare("SELECT count(*) AS cont FROM cadastros WHERE email = ?");
            $comando->execute(array($_POST['email']));
            $resultado = $comando->fetch(PDO::FETCH_ASSOC);
            if($resultado['cont'] >= 1){
                $data = ['succeso'=> false, 'msg'=>'O usuário já existe'];
                echo json_encode($data);
                exit();
            }

            $nome = $_POST['nome'];
            $nome = trim($nome);
            $s_nome = filter_var($nome, FILTER_SANITIZE_STRING);
            if(!filter_var($s_nome,FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/^[a-zA-Z ]{3,}$/"))) || strlen($s_nome > 50)){
                $data= ['sucesso'=>false, 'msg'=>'Nome de usuário invalido'];
                echo json_encode($data);
                exit();
            }

            $endereco = $_POST['endereco'];
            $endereco = trim($endereco);
            $s_endereco = filter_var($endereco, FILTER_SANITIZE_STRING);
            if(!filter_var($s_endereco,FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/^[a-zA-Z0-9, ]{10,}$/"))) || strlen($s_endereco) > 150){
                $data= ['sucesso'=>false, 'msg'=>'endereco invalido'];
                echo json_encode($data);
                exit();
            }

            $date = $_POST['data'];
            $s_date = trim($date);
            $ano_atual = date('Y');
            $dia = intval(substr($s_date, 0, 2));
            $mes = intval(substr($s_date, 3, 2));
            $ano = intval(substr($s_date, 6, 4));
            if (!filter_var($s_date, FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/^\d{2}\/\d{2}\/\d{4}$/"))) || !(checkdate($mes, $dia, $ano)) ||
                $ano >= intval(date('Y'))){
                $data= ['sucesso'=>false, 'msg'=>'data de nascimento invalida'];
                echo json_encode($data);
                exit();
            }

            $sexo = $_POST['sexo'];
            $s_sexo = trim($sexo);
            if (!filter_var($s_sexo, FILTER_VALIDATE_REGEXP, array(
                "options"=>array("regexp"=>"/(?:masculino|feminino)/")))){
                $data= ['sucesso'=>false, 'msg'=>'sexo invalido'];
                echo json_encode($data);
                exit();
            }

            $email = $_POST['email'];
            $email = trim($email);
            $s_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($s_email, FILTER_VALIDATE_EMAIL) || strlen($s_email) > 70){
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

            $s_senha = password_hash($s_senha, PASSWORD_DEFAULT);
            $comando = $pdo->prepare("INSERT INTO cadastros(nome, endereco, data, sexo, email, senha)
            VALUES(?, ?, ?, ?, ?, ?)");
            $comando->execute(array($s_nome, $s_endereco, $s_date, $s_sexo, $s_email, $s_senha));
            $data= ['sucesso'=>true, 'msg'=>'cadastro realizado com sucesso'];
            $_SESSION['usuario'] = $s_nome;
            $_SESSION['email'] = $s_email;
            echo json_encode($data);
            exit();
            break;

    }