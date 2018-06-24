<?php

if(!isset($_POST['action'])){
    exit();
}

session_start();

switch($_POST['action']){

    case 'remove':

        $nome = $_POST['nome'];

        foreach($_SESSION['carrinho'] as $key=>$produto){
            if(in_array($nome, $produto)){
                unset($_SESSION['carrinho'][$key]);

                if(count($_SESSION['carrinho']) === 0){
                    unset($_SESSION['carrinho']);
                }

                $data = ['sucesso'=>true];
                echo json_encode($data);
                exit();

            }
        }
        break;

    case 'limpar':
        unset($_SESSION['carrinho']);
        exit();
}

