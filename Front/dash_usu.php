<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dash_usu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash - USU</title>
</head>
<body>
    <div class="topo">
        <a href="../Front/usuarios.php">Buscar Endereços</a>
    </div>

    <?php
    session_start();
    ?>

    <div class="tarefas">
        <h1>Seja bem-vindo</h1><br>
    </div>


    <table class="table-usu">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Inclua os arquivos necessários e crie uma instância da classe CrudTarefas
            include_once "../database/DataBase.php";
            $database = new DataBase();
            $db = $database->getConnection();
            include_once "../Crud/CrudTarefas.php"; // Verifique o caminho do arquivo

            $crudTarefas = new CrudTarefas($db);

            // Chame o método listarTarefas para buscar e exibir as tarefas
            $crudTarefas->listarTarefasUsu();
            ?>
        </tbody>
    </table>
</body>
</html>
