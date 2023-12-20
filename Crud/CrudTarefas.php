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

    public function adicionarTarefa($nome, $descricao, $data_conclusao, $endereco)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (nome, descricao, data_conclusao, endereco) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $descricao, $data_conclusao, $endereco]);

            echo "Tarefa adicionada com sucesso!";
            header("refresh:4; url=../Front/dash_adm.php");
        } catch (PDOException $e) {
            echo "Erro ao adicionar tarefa: " . $e->getMessage();
        }
    }

    public function excluirTarefa($id_tarefa)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id_tarefa";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_tarefa', $id_tarefa);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir tarefa: " . $e->getMessage();
        }
    }

    public function adicionarUsuarioNaTarefa($id_tarefa, $id_usuario)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET id_usuario = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id_usuario, $id_tarefa]);

            echo "Usuário adicionado à tarefa com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao adicionar usuário à tarefa: " . $e->getMessage();
        }
    }
    
    public function listarTarefas()
    {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            // Obtém os resultados da consulta
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Exibe os resultados na tabela
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['endereco'] . "</td>";
                echo "<td>";
                echo "<a href='../php/deletar_tarefa.php?id_tarefa=" . $row['id'] . "'><img src='../img/lata-de-lixo.png' alt='lixo'></a>";
                echo "<a href='../Front/alterar.php?id=" . $row['id'] . "'><img src='../img/ferramenta-lapis.png' alt='lapis'></a>";
                echo "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erro ao listar tarefas: " . $e->getMessage();
        }
    }


    public function listarTarefasUsu()
    {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            // Obtém os resultados da consulta
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Exibe os resultados na tabela
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['data_conclusao'] . "</td>";
                echo "<td>" . $row['endereco'] . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erro ao listar tarefas: " . $e->getMessage();
        }
    }

     public function listarUsuarios()
    {
        try {
            $query = "SELECT * FROM usuarios";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            // Obtém os resultados da consulta
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao listar usuários: " . $e->getMessage();
        }
    }
    
    public function getTarefaById($id_tarefa) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id_tarefa]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter tarefa por ID: " . $e->getMessage();
            return null;
        }
    }
    public function alterarTarefa($id_tarefa, $nome, $descricao, $data_conclusao)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET nome = ?, descricao = ?, data_conclusao = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nome, $descricao, $data_conclusao, $id_tarefa]);
    
            echo "Tarefa alterada com sucesso!";
            header("refresh:4; url=../Front/dash_adm.php");
        } catch (PDOException $e) {
            echo "Erro ao alterar tarefa: " . $e->getMessage();
        }
    }
}