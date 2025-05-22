<?php

include_once 'conexao.php';

if (isset($_COOKIE['login'])) {
    $login_cookie = $_COOKIE['login'];
    echo "Welcome $login_cookie <br>";
    echo "These information is <font color='red'>ONLY</font> for you";
} else {
    echo "Welcome guest <br>";
    echo "These information is <font color='red'>NOT</font> for you";
    echo "<br><a href='login.php'>Login</a> To read the content";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
</head>
<body>
    
</body>
</html>