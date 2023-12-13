<?php
    class DataBase{
        private $host="Localhost";
        private $db_name="projetotres";
        private $username="root";
        private $password="";
        public $conn;

        public function getConnection(){
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception){
                echo "Erro de conexão: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>  