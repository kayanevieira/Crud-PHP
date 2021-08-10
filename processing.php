<?php
session_start();
include_once("database.php");


$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nascimento = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

if (empty($nome)) {
    $_SESSION["ERROR_NOME"] = "<p class=text-left style='color:red'>Nome não preenchido </p>";
}
if (empty($email)) {
    $_SESSION["ERROR_EMAIL"] = "<p class=text-left style='color:red'>Email não preenchido </p>";
}
if (empty($nascimento)) {
    $_SESSION["ERROR_DATE"] = "<p class=text-left style='color:red'>Data de nascimento não preenchida </p>";
}
header("Location: index.php");
$result_usuario = "INSERT INTO clientes (nome, email, nascimento) VALUES ('$nome', '$email', '$nascimento')";
$resultado_usuario = mysqli_query(connectToDatabase(), $result_usuario);
