<?php
    require_once 'conexao.php';

    class Funcionario{
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

        public function insert($nome, $email, $login, $senha){
            try{
                $sql = "insert into funcionario(nome, email, login, senha) 
                        values(:nome, :email, :login, :senha)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":login", $login);
                $stmt->bindParam(":senha", $senha);
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
                $sql = "delete from funcionario where id = :id";
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

        public function editar($nome, $email, $login, $senha, $id){
            try{ 
                $sql = "UPDATE funcionario SET
                        nome = :nome,
                        email = :email,
                        login = :login,
                        senha = :senha
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":login", $login);
                $stmt->bindParam(":senha", $senha);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function validar($login, $senha, $email){
            try{                              
                $sql = "select * from funcionario where login = :login and senha = :senha and email = :email";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":login", $login);
                $stmt->bindParam(":senha", $senha);
                $stmt->bindParam(":email", $email);  

                $stmt->execute();

                if($stmt->rowCount() > 0){                    
                    return true;
                }else{
                    return false;
                }

            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
            }finally{
                $this->conn = null;
            }
        }

        public function redirect($url){
            header("Location: $url");
        }

    }

?>