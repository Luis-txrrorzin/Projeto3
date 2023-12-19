<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alterar.css">
    <title>Alterar Tarefa</title>
</head>
<body>

<h2>Alterar Tarefa</h2>

<?php
    include_once "../Crud/CrudTarefas.php";
    // Verifica se o ID da tarefa foi passado pela URL
    if (isset($_GET['id'])) {
        $id_tarefa = $_GET['id'];

        // Recupera a tarefa pelo ID
        $crudTarefas = new CrudTarefas($db);
        $tarefa = $crudTarefas->getTarefaById($id_tarefa);

        // Exibe o formulário de alteração
        if ($tarefa) {
?>
            <form action="../php/alterar_tarefa.php" method="post">
                <input type="hidden" name="id_tarefa" value="<?php echo $id_tarefa; ?>">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>" required><br>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" required><?php echo $tarefa['descricao']; ?></textarea><br>
                <label for="data_conclusao">Data de Conclusão:</label>
                <input type="text" name="data_conclusao" value="<?php echo $tarefa['data_conclusao']; ?>" required><br>
                <input type="submit" value="Alterar Tarefa">
            </form>
<?php
        } else {
            echo "Tarefa não encontrada.";
        }
    } else {
        echo "ID da tarefa não fornecido.";
    }
?>

</body>
</html>