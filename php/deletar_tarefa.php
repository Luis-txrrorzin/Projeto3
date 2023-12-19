<?php
include_once "../database/DataBase.php";
include_once "../Crud/CrudTarefas.php";

$database = new DataBase();
$db = $database->getConnection();

$crudTarefas = new CrudTarefas($db);

// Verifica se o ID da tarefa foi fornecido
if (isset($_GET['id_tarefa'])) {
    $id_tarefa = $_GET['id_tarefa'];

    // Chama a função para excluir a tarefa
    $crudTarefas->excluirTarefa($id_tarefa);

    // Redireciona de volta para a página de tarefas (ou para onde for apropriado)
    header("Location: ../Front/dash_adm.php");
    exit();
} else {
    echo "ID da tarefa não fornecido.";
}
?>
