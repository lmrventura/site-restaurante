<?php
    require_once '../modelo/funcionario.php';
    $objFunc = new Funcionario();

    if(isset($_POST['validar'])){
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        $email = $_POST['txtEmail'];

        if($objFunc->validar($login, $senha, $email)){
            $objFunc->redirect('../funcionario.php');
        }else{
            $objFunc->redirect('../adm.html');
        }
    }

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        if($objFunc->insert($nome, $email, $login, $senha)){
            $objFunc->redirect('../funcionario.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objFunc->deletar($id)){
            $objFunc->redirect('../funcionario.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        if($objFunc->editar($nome, $email, $login, $senha, $id)){
            $objFunc->redirect('../funcionario.php');
        }
    }

?>