<?php
session_start();
include '../Crud/CrudUsuario.php';

$crudUsuario = new CrudUsuario($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    $crudUsuario->registrar($nome, $email, $senha, $confirmarSenha);
}
?>