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
        <button type="submit">INSERIR TAREFA</button>
    </div>

    <?php
    session_start();
    ?>

    <div class="tarefas">
        <?php
        // Verifica se a sessão e o nome do usuário estão definidos
        if (isset($_SESSION['nome'])) {
            try {
                // Substitua 'seu_banco_de_dados', 'seu_usuario', 'sua_senha' e 'sua_tabela_usuarios' pelas configurações reais do seu banco de dados
                $conn = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'seu_usuario', 'sua_senha');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para obter o nome do usuário a partir da tabela 'usuarios'
                $query = "SELECT nome FROM sua_tabela_usuarios WHERE id = :id_usuario";
                $stmt = $conn->prepare($query);
                
                // Substitua 'id_usuario' pelo nome correto da coluna que identifica o usuário na tabela 'usuarios'
                $stmt->bindParam(':id_usuario', $_SESSION['id']); 

                $stmt->execute();

                // Obtém o resultado da consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                // Exibe a saudação com o nome do usuário
                echo "<h1>Seja bem-vindo, " . ($result['nome'] ?? 'Usuário') . "</h1><br>";

            } catch (PDOException $e) {
                echo "Erro ao obter o nome do usuário: " . $e->getMessage();
            } finally {
                // Fecha a conexão com o banco de dados
                $conn = null;
            }
        } else {
            echo "<h1>Seja bem-vindo, Usuário</h1><br>";
        }
        ?>
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
