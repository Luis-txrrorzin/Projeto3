<?php
include_once "../database/DataBase.php";
$database = new DataBase();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tarefa = $_POST['id_tarefa'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data_conclusao = $_POST['data_conclusao'];

    // Instancia a classe CrudTarefas
    $crudTarefas = new CrudTarefas($db);

    // Chama a função para alterar a tarefa
    $crudTarefas->alterarTarefa($id_tarefa, $nome, $descricao, $data_conclusao);
}
?>