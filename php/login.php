<?php
session_start();
include '../Crud/CrudUsuario.php';

$crudUsuario = new CrudUsuario($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($crudUsuario->logar($email, $senha)) {
        $userId = $_SESSION['id'];
        $isAdmin = $crudUsuario->isAdministrador($userId);

        if ($isAdmin === true) {
            // Se o usuário for administrador, redireciona para a tela de administrador
            header("Location: ../Front/dash_adm.php");
        } else {
            // Se não for administrador, redireciona para a tela de usuário comum
            header("Location: ../Front/dash_usu.php");
        }
        exit();
    } else {
        echo "Login falhou. Verifique suas credenciais.";
    }
}
?>
