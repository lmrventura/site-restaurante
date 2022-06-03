<?php
    require_once 'conexao.php';

    class Venda{
        private $conn;

        public function __construct()
        {
            $dataBase = new dataBase();
            $db = $dataBase->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function insert($id_cliente, $id_func, $id_produto, $data_date, $quantidade){ 
            try{
                $sql = "insert into venda(id_cliente, id_func, id_produto, data, quantidade)
                        values(:id_cliente, :id_func, :id_produto, :data_date, :quantidade)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_func", $id_func); 
                $stmt->bindParam(":id_produto", $id_produto);
                $stmt->bindParam(":data_date", $data_date);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function deletar($id){
            try{
                $sql = "delete from venda where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function editar($id_cliente, $id_func, $id_produto, $data_date, $quantidade, $id){
            //15 minutos
            try{
                $sql = "UPDATE venda SET
                        id_cliente = :id_cliente,
                        id_func = :id_func,
                        id_produto = :id_produto,
                        data = :data_date,
                        quantidade = :quantidade
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_func", $id_func);
                $stmt->bindParam(":id_produto", $id_produto);
                $stmt->bindParam(":data_date", $data_date);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }
    
        public function redirect($url){
            header("Location: $url");
        }

    }
    
?>