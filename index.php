<?php 
session_start();
include_once("database.php");
$connect = connectToDatabase();
function SessionIf($field){
    if(isset($_SESSION[$field])){
        echo $_SESSION[$field];
        unset($_SESSION[$field]);  
        
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>


<nav class="navbar navbar-light bg-light">
<form class="form-inline">
    <a href="index.php" class="btn btn-outline-dark m-1">Cadastro<a>
    <a href="listar.php" class="btn btn-outline-dark m-1 y-2">Clientes Cadastrados</a>
</form>
</nav>


<section class="content">
    <div class="dados">
        <h3>Dados do Cliente</h3>
        <form class="form" method="POST" action="processing.php">
            <input class="field" name="name" placeholder="Nome...">
            <?php 
                SessionIf("ERROR_NOME");
            ?>

            <input class="field" type="email" name="email" placeholder="E-mail...">
            <?php 
            SessionIf("ERROR_EMAIL");
            ?>

            <input class="date" type="date" name="date">
            <?php 
            SessionIf("ERROR_DATE");
            ?>
            <input class="btn btn-dark d-grid gap-2 col-6 mx-auto" type="submit" value="Enviar">
          
        </form>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>