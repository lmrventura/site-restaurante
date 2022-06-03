<?php
    require_once '../modelo/produto.php';
    $objProduto = new Produto();
    
    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $quantidade = $_POST['txtQuantidade'];
        $valor = $_POST['txtValor'];
        if($objProduto->insert($nome, $quantidade, $valor)){
            $objProduto->redirect('../produto.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objProduto->deletar($id)){
            $objProduto->redirect('../produto.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $quantidade = $_POST['txtQuantidade'];
        $valor = $_POST['txtValor'];
        if($objProduto->editar($nome, $quantidade, $valor, $id)){
            $objProduto->redirect('../produto.php');
        }
    }

?>