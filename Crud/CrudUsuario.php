<?php

    include_once "../database/DataBase.php";
    $database = new DataBase();
    $db = $database->getConnection();
   class CrudUsuario{
    private $conn;
    private $table_name="usuarios";

    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar($nome, $email, $senha, $comfirme_senha)
    {
        if ($senha !== $comfirme_senha) {
            echo "As senhas não coincidem. Tente novamente.";
            return;
        }

        try {
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO " . $this->table_name . " (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $email, $hashed_password]);

            echo "Registro bem-sucedido!";
            header("refresh:4; url=../html/index.html");
        } catch (PDOException $e) {
            echo "Erro no registro: " . $e->getMessage();
        }
    }
    
    public function logar($email, $senha) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $crudUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($crudUsuario && password_verify($senha, $crudUsuario['senha'])) {
                session_start();
                $_SESSION['id'] = $crudUsuario['id'];
                $_SESSION['email'] = $crudUsuario['email'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }
   
}