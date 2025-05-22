<?php

$user = 'root';
$password = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->error){
    die("Failed in connetcion: ". $mysqli->error);
}