<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/usuarios.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuários</title>
</head>
<body>
    <h2>USUÁRIOS</h2>

    <div class="table-usu">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../database/DataBase.php";
                include_once "../Crud/CrudUsuario.php";

                $database = new DataBase();
                $db = $database->getConnection();
                $crudUsuario = new CrudUsuario($db);

                // Obtém todos os usuários
                $usuarios = $crudUsuario->listarUsuarios();

                // Exibe os resultados na tabela
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . $usuario['id'] . "</td>";
                    echo "<td>" . $usuario['nome'] . "</td>";
                    echo "<td>" . $usuario['email'] . "</td>";
                    echo "<td>" . ($usuario['admin'] == 1 ? 'Sim' : 'Não') . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="botao-voltar">
        <a href="../Front/dash_adm.php">Voltar</a>
    </div>
</body>
</html>
