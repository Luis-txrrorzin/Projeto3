    <?php

    include_once "../database/DataBase.php";
    $database = new DataBase();
    $db = $database->getConnection();
    class CrudUsuario
    {
        private $conn;
        private $table_name = "usuarios";

        public function __construct($db)
        {
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
                header("refresh:4; url=../Front/index.php");
            } catch (PDOException $e) {
                echo "Erro no registro: " . $e->getMessage();
            }
        }

        public function logar($email, $senha)
{
    try {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE email = :email");
        $stmt->bindParam(':email', $email);
        
        $stmt->execute();
        $crudUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($crudUsuario && password_verify($senha, $crudUsuario['senha'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['id'] = $crudUsuario['id'];
            $_SESSION['nome'] = $crudUsuario['nome'];
            $_SESSION['email'] = $crudUsuario['email'];
            
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erro no login: " . $e->getMessage();
    }
}

    public function isAdministrador($userId)
    {
        try {
            $stmt = $this->conn->prepare("SELECT admin FROM " . $this->table_name . " WHERE id = :id");
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a consulta retornou uma linha
            if ($result !== false && isset($result['admin'])) {
                return ['admin' => $result['admin']];
            } else {
                return ['admin' => 0]; // Retorna 0 se o usuário não for encontrado ou admin não estiver definido
            }
        } catch (PDOException $e) {
            echo "Erro ao verificar se o usuário é administrador: " . $e->getMessage();
            return ['admin' => 0];
        }
    }

    public function getUsuario($userId)
    {
        try {
            $stmt = $this->conn->prepare("SELECT nome, email, admin FROM " . $this->table_name . " WHERE id = :id");
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retorna um array associativo com os dados do usuário
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter dados do usuário: " . $e->getMessage();
            return false;
        }
    }

    public function listarUsuarios()
    {
        try {
            $stmt = $this->conn->query("SELECT id, nome, email, admin FROM " . $this->table_name);
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            echo "Erro ao listar usuários: " . $e->getMessage();
            return [];
        }
    }
}
