<?php
    require_once '../modelo/venda.php';
    $objVenda = new Venda();

    if(isset($_POST['insert'])){
        $id_cliente = $_POST['txtIdCliente'];
        $id_func = $_POST['txtIdFuncionario'];
        $id_produto = $_POST['txtIdProduto'];
        $data = $_POST['txtDate'];
        $quantidade = $_POST['txtQuantidade'];
        if($objVenda->insert($id_cliente, $id_func, $id_produto, $data, $quantidade)){
            $objVenda->redirect('../venda.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objVenda->deletar($id)){
            $objVenda->redirect('../venda.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $id_cliente = $_POST['txtIdCliente'];
        $id_func = $_POST['txtIdFuncionario'];
        $id_produto = $_POST['txtIdProduto'];
        $data = $_POST['txtDate'];
        $quantidade = $_POST['txtQuantidade'];

        if($objVenda->editar($id_cliente, $id_func, $id_produto, $data, $quantidade, $id)){ //if($objVenda->editar($nome, $cpf, $login, $senha, $id)){
            $objVenda->redirect('../venda.php');
        }
    }

?>