<?php
session_start();
include_once("database.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$getClients = "SELECT * FROM clientes WHERE id = '$id'";
$connect = connectToDatabase();
$returnClients = mysqli_query($connect, $getClients);
$rowClients = mysqli_fetch_assoc($returnClients);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edição de Clientes</title>
</head>
<body>


<nav class="navbar navbar-light bg-light">
<form class="form-inline">
<a href="listar.php" class="btn btn-outline-dark m-1">Clientes Cadastrados</a>
<a href="index.php" class="btn btn-outline-dark m-1">Cadastro</a>
</form>
</nav>

<h3>Editar</h3>

    <section class="content">
        <div class="dados">
        <form class="form" method="POST" action="processingEdit.php">
            <input type="hidden" class="field" name="id" value="<?php echo $rowClients['id']?>">    

            <input class="field" name="name" value="<?php echo $rowClients['nome']?>">
            
            <input class="field" type="email" name="email" placeholder="E-mail..." value="<?php echo $rowClients['email']?>">

            <input class="date" type="date" name="date" value="<?php echo $rowClients['nascimento']?>">
            <input class="btn btn-dark d-grid gap-2 col-6 mx-auto" type="submit" value="Editar">
        </form>
        </div>
    </section>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>