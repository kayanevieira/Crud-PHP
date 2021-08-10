<?php

function connectToDatabase() {
    return mysqli_connect(
        'localhost',
        'root', 
        'Root1234!', 
        "projeto ihu" 
    );
}

   $result = connectToDatabase()->query('SELECT * FROM clientes');

