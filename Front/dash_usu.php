<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dash_usu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash - USU</title>
</head>
<body>
    <div class="topo">
    <button type="submit">INSERIR TAREFA</button>
</div>
    <?php
    session_start();
    ?>
    <div class="tarefas">
        <h1>Seja bem-vindo, <?php echo ''.$_SESSION['nome']; ?> </h1><br>
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
            <tr>
                <td>1</td>
                <td>Desenvolver Front</td>
                <th>Descrição</th>
                <td>01/12</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>Criação do Banco</td>
                <th>Descrição</th>
                <td>15/09</td>
                
            </tr>
</body>
</html>