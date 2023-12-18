<?php

include_once "../database/DataBase.php";
$database = new DataBase();
$db = $database->getConnection();

class CrudTarefas
{
    private $conn;
    private $table_name = "tarefas";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function adicionarTarefa($nome, $descricao, $data_conclusao, $id_usuario)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (nome, descricao, data_conclusao, id_usuario) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $descricao, $data_conclusao, $id_usuario]);

            echo "Tarefa adicionada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao adicionar tarefa: " . $e->getMessage();
        }
    }

    public function alterarTarefa($id_tarefa, $nome, $descricao, $data_conclusao, $id_usuario)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET nome = ?, descricao = ?, data_conclusao = ?, id_usuario = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $descricao, $data_conclusao, $id_usuario, $id_tarefa]);

            echo "Tarefa alterada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao alterar tarefa: " . $e->getMessage();
        }
    }

    public function excluirTarefa($id_tarefa)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id_tarefa]);

            echo "Tarefa excluída com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir tarefa: " . $e->getMessage();
        }
    }
}