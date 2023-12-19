<?php
include_once "../database/DataBase.php";
$database = new DataBase();
$db = $database->getConnection();

include_once "CrudTarefas.php";

// Definir variáveis
$id_tarefa = isset($_POST['id_tarefa']) ? $_POST['id_tarefa'] : null;
$nome = isset($_POST['tarefa']) ? $_POST['tarefa'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crudTarefas = new CrudTarefas($db);

    // Obter dados da tarefa do banco de dados
    $tarefa = $crudTarefas->getTarefaById($id_tarefa);

    // Verificar se a tarefa existe
    if ($tarefa) {
        // Atualizar as variáveis apenas se a tarefa existir
        $nome = $tarefa['nome'];
        $descricao = $tarefa['descricao'];
        $data = $tarefa['data_conclusao'];
    } else {
        echo "Tarefa não encontrada.";
        // Você pode redirecionar o usuário para uma página de erro ou tomar outra ação adequada.
        exit;
    }

    // Incluir o arquivo com o formulário HTML
    include_once "alterar.php";
}
?>