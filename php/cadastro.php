<?php
// $conn = new mysqli("seu-host", "seu-usuario", "sua-senha", "seu-banco");
// if ($conn->connect_error) {
//     die("Conexão falhou: " . $conn->connect_error);
// }

// $nome = $_POST['nome'];
// $senha = $_POST['senha'];

// $verificarNome = "SELECT * FROM usuarios WHERE nome='$nome'";
// $resultVerificarNome = $conn->query($verificarNome);

// if ($resultVerificarNome->num_rows > 0) {
//     echo "Nome de usuário já está em uso. Escolha outro.";
// } else {

//     $inserirUsuario = "INSERT INTO usuarios (nome, senha) VALUES ('$nome', '$senha')";

//     if ($conn->query($inserirUsuario) === TRUE) {
//         echo "Cadastro realizado com sucesso!";
//     } else {
//         echo "Erro ao cadastrar: " . $conn->error;
//     }
// }

// $conn->close();
// ?>
