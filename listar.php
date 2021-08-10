<?php
session_start();
require_once("database.php");
$connect = connectToDatabase();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Listagem</title>
</head>
<body>


<nav class="navbar navbar-light bg-light">
<form class="form-inline">
    <a href="index.php" class="btn btn-outline-dark m-1">Cadastro</a>
    <a href="listar.php" class="btn btn-outline-dark m-1">Clientes Cadastrados</a>
</form>
</nav>


<h1 class="titulo">Clientes Cadastrados</h1>

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

//Receber o número da página
$currentPage = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$page = (!empty($currentPage)) ? $currentPage : 1;

//Quantiadade de itens por página
$resultForPage = 5;

//Calcular inicio da visualização
$beginning = ($resultForPage * $page) - $resultForPage;

$getClients =  "SELECT * FROM clientes LIMIT $beginning, $resultForPage";
$result_getClients = mysqli_query($connect, $getClients);
?>


<div class= "d-flex align-items-center flex-column justify-content-center">
<?php
while($row_clients = mysqli_fetch_assoc($result_getClients)){
?><div><?php
    echo "ID: " . $row_clients['id'] . "<br>";
    echo "Nome: " . $row_clients['nome'] . "<br>";
    echo "Email: " . $row_clients['email'] . "<br>";
    echo "Data de Nascimento: " . $row_clients['nascimento'] . "<br>";
    echo "<button class='btn btn-outline-dark m-1'><a class=EditDelete href='editClient.php?id=" . $row_clients['id'] . "'>Editar</a></button>";
    echo "<button class='btn btn-outline-dark m-1'><a class=EditDelete href='processingDelete.php?id=" . $row_clients['id'] . "'>Apagar</a></button><br><br>";?></div> <?php
    //echo "<a href='processingDelete.php?id=" . $row_clients['id'] . "'>Apagar</a><br><br>";
}
?>
</div>


<?php
//Paginação - Somar a quantidade de clientes
$getNumberIds = "SELECT COUNT(id) AS result_number FROM clientes"; 
$resultNumberIds = mysqli_query($connect, $getNumberIds);
$rowPage = mysqli_fetch_assoc($resultNumberIds);
//echo $rowPage['result_number'];

//Quantidade de página 
$amountOfPage = ceil($rowPage['result_number'] / $resultForPage);

//Página anterior/atual/última
$maxLinks = 2;
echo " <a class=FirstAndLast href = 'listar.php?pagina=1'>Primeira </a> ";
for($previousPage = $page - $maxLinks; $previousPage <= $page - 1; $previousPage++){
    if($previousPage >= 1)
    echo " <a class=FirstAndLast href = 'listar.php?pagina=$previousPage'>$previousPage</a> ";
}
echo " $currentPage ";

for($nextPage = $page + 1; $nextPage <= $page + $maxLinks; $nextPage++){
    if($nextPage <= $amountOfPage){
    echo " <a class=FirstAndLast href = 'listar.php?pagina=$nextPage'>$nextPage</a> ";
    }
}

echo "<a class=FirstAndLast href = 'listar.php?
pagina=$amountOfPage'>Última </a>";

?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>
