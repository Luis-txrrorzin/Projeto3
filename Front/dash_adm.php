<?php
include_once "../database/DataBase.php";
include_once "../Crud/CrudTarefas.php"; // Certifique-se de incluir o arquivo do CRUD de tarefas aqui

$database = new DataBase();
$db = $database->getConnection();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/dash_adm.css">
    <title>Dash - ADM</title>
  </head>

  
  <body>
    <form class="botoes-adm">
      <a href="../Front/inserir.php">Inserir Tarefa</a>

      <a href="../Front/usuarios.php">Usuarios</a>
    </form>

    <table class="table-adm">
      <thead>
          <tr>
              <th>ID</th>
              <th>Tarefa</th>
              <th>Descrição</th>
              <th>Ação</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $crudTarefas = new CrudTarefas($db);
          $crudTarefas->listarTarefas();
          ?>
      </tbody>
    </table>
  </body>
</html>
