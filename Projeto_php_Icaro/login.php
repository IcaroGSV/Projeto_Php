<?php

include "banco.php";
$pdo = Banco::conectar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$validarLogin = $pdo->prepare("SELECT * FROM tb_alunos WHERE email = :email AND pass = :senha");
$validarLogin->bindParam(':email', $email);
$validarLogin->bindParam(':senha', $senha);
$validarLogin->execute();

if ($validarLogin->rowCount() >= 1) {
$usuario = $validarLogin->fetch(PDO::FETCH_ASSOC);

header('Location: index.php');
exit();
} else {
?>
 <script>
    alert("Usuário não encontrado");
 </script>
 <?php   
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="styleheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="styleheet" href="./assets/css/estilo.css">
</head>

<body>
    
</body>

