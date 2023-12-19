<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/alterar.css">
    <title>Alterar</title>
</head>
<body>
    <h2>ALTERAR</h2>
    <form action="../php/alterar_tarefa.php" method="POST">
        <label for="tarefa">Tarefa</label>
        <input type="text" name="tarefa" value="<?php echo isset($nome) ? $nome : ''; ?>" placeholder="Adicione a tarefa" required>
        <br>
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" value="<?php echo isset($descricao) ? $descricao : ''; ?>" placeholder="Adicione a descrição da tarefa." required />
        <br>
        <label for="data">Data:</label>
        <input type="text" name="data" value="<?php echo isset($data) ? $data : ''; ?>" placeholder="Adicione a data." required>
        <br>
        <input type="hidden" name="id_tarefa" value="<?php echo $id_tarefa; ?>">
        <button type="submit">ALTERAR</button>
    </form>
</body>
</html>