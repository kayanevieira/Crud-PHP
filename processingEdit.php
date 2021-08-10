<?php
session_start();
include_once("database.php");
$connect = connectToDatabase();

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nascimento = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

if(empty($nome)){
    $_SESSION["ERROR_NOME"] = "Nome não preenchido";
}if(empty($email)){
    $_SESSION["ERROR_EMAIL"] = "Email não preenchido";
}if(empty($nascimento)){
    $_SESSION["ERROR_DATE"] = "Data de nascimento não preenchida";
}
header("Location: index.php");

$result_usuario = "UPDATE clientes SET nome='$nome', email='$email', nascimento='$nascimento' WHERE id='$id'";
$resultado_usuario = mysqli_query($connect,$result_usuario);

if(mysqli_affected_rows($connect)){
    $_SESSION['msg'] = "<p class=text-center style='color:green;'>Cliente editado com sucesso</p>";
    header("Location: listar.php");
}else{
    $_SESSION['msg'] = "<p class=text-center style='color:red;'>Falha ao editar</p>";
    header("Location: editClient.php?id=$id");
}

?>