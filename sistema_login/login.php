<?php

    require '../regras_negoc/conexao.php';
    require 'valida_login.php';

    $conexao = new Conexao();
    $logar = new Login($conexao);


    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0 || strlen($_POST['senha']) == 0) {
            header("Location: ../public/index.php?erro=1");
            //Preencha todos os campos!
        } else {
            $email =addslashes($_POST['email']);
            $senha =addslashes($_POST['senha']);

            if($logar->logar($email, $senha)) {
                header("Location: ../public/home.php");
                //logou
            } else {
                header("Location: ../public/index.php?erro=2");
                //Usuário ou senha inválido(s)
            }
        }

        
    }

?>