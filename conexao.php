<?php

$host = 'localhost';
$user = 'root';
$db_password = '';
$database = 'interview';

$connection = mysqli_connect($host, $user, $db_password, $database);

if (!$connection) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

?>