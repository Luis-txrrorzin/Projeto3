<?php
include_once "../database/DataBase.php";
$database = new DataBase();
$db = $database->getConnection();

include_once "../Crud/CrudTarefas.php"; // Certifique-se de incluir corretamente o arquivo que contém a classe CrudTarefas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crudTarefas = new CrudTarefas($db);

    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $endereco = $_POST['endereco'];

    // Adiciona a tarefa ao banco de dados
    $crudTarefas->adicionarTarefa($tarefa, $descricao, $data, $endereco);
}
?>