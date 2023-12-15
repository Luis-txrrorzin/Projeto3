<?php
session_start();
include '../Crud/CrudUsuario.php';

$crudUsuario = new CrudUsuario($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($crudUsuario->logar($email, $senha)) {
       
        echo "Login bem-sucedido!";
        header("Location: dash_adm.html");
    } else {
        echo "Login falhou. Verifique suas credenciais.";
    }
}
