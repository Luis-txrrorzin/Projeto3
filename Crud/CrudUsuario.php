<?php
   class CrudUsuario{
    private $conn;
    private $table_name="usuarios";

    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar($nome, $senha, $comfirme_senha)
    {
        if ($senha !== $comfirme_senha) {
            echo "As senhas não coincidem. Tente novamente.";
            return;
        }

        try {
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO " . $this->table_name . " (nome, senha) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $hashed_password]);

            echo "Registro bem-sucedido!";
        } catch (PDOException $e) {
            echo "Erro no registro: " . $e->getMessage();
        }
    }
    
    public function logar($nome, $senha) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE nome = :nome");
            $stmt->bindParam(':nome', $nome);
            $stmt->execute();
            $crudUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($crudUsuario && password_verify($senha, $crudUsuario['senha'])) {
                session_start();
                $_SESSION['id'] = $crudUsuario['id'];
                $_SESSION['nome'] = $crudUsuario['nome'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }
   
}