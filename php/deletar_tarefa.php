<?php
include_once "../database/DataBase.php";
include_once "CrudTarefas.php"; // Certifique-se de incluir o arquivo do CRUD de tarefas aqui

$database = new DataBase();
$db = $database->getConnection();

$crudTarefas = new CrudTarefas($db);

// Verifica se o ID da tarefa foi fornecido
if (isset($_GET['id_tarefa'])) {
    $id_tarefa = $_GET['id_tarefa'];

    // Chama a função para excluir a tarefa
    $crudTarefas->excluirTarefa($id_tarefa);
} else {
    echo "ID da tarefa não fornecido.";
}

// Redireciona de volta para a página de tarefas (ou para onde for apropriado)
header("Location: lista_tarefas.php");
exit();
?>