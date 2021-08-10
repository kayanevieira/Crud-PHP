<?php
session_start();
include_once("database.php");
$connect = connectToDatabase();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$getClientToDelete = "DELETE FROM clientes WHERE id='$id'";
$clienteToDelate = mysqli_query($connect, $getClientToDelete);
header('Location: listar.php');

if(mysqli_affected_rows($connect)){
    $_SESSION['msg'] = "<p class=text-center style='color:red'>Cliente deletado com sucesso</p>";
    header("Location: listar.php");
}else{
    $_SESSION['msg'] = "<p class=text-center style='color:red;'>Falha ao deletar</p>";
    header("Location: listar.php?id=$id");
}

?>