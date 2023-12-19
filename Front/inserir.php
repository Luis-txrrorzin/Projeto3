<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../css/inserir.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inserir</title>
</head>
<body>
  <h2>INSERIR</h2>

  <form action="../php/inserir_tarefa.php" method="POST">
    <label for="tarefa">Tarefa</label>
    <input type="text" name="tarefa" placeholder="Adicione a tarefa." required />

    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" placeholder="Adicione a descrição da tarefa." required />

    <label for="data">Data</label>
    <input type="text" name="data" placeholder="Adicione a data." required />

    <button type="submit">SALVAR</button>
  </form>
</body>
</html>