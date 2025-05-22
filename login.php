<?php
    include 'conexao.php';
    session_start();

    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $enter = isset($_POST['enter']);
    $register = isset($_POST['register']);

    $connect = mysqli_connect($host, $user, $db_password, $database);

    if($enter) {
        $verify = mysqli_query($connect, "SELECT * FROM usuarios WHERE login = '$login' AND password = '$password'") or die("Error when selecting");
        if(mysqli_num_rows($verify) <= 0 ){
            echo "<script language='javascript' type='text/javascript'>
            alert('Login or password incorrect');window.location.href='login.php';</script>";
            die();
        } else {
            setcookie("login", $login);
            header("Location: start.php");
        }   
    }

    if($register) {
        // Verifica se já existe o usuário
        $check = mysqli_query($connect, "SELECT * FROM usuarios WHERE login = '$login'");
        if(mysqli_num_rows($check) > 0){
            echo "<script language='javascript' type='text/javascript'>
            alert('Email já cadastrado!');window.location.href='login.php';</script>";
            die();
        } else {
            // Insere novo usuário
            $insert = mysqli_query($connect, "INSERT INTO usuarios (login, password) VALUES ('$login', '$password')");
            if($insert){
                echo "<script language='javascript' type='text/javascript'>
                alert('Usuário cadastrado com sucesso! Faça login.');window.location.href='login.php';</script>";
                die();
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Erro ao cadastrar usuário!');window.location.href='login.php';</script>";
                die();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <label>Email:</label>
        <input type="text" name="login" id="login" required><br>
        <label>Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="enter" value="login">
        <input type="submit" name="register" value="registrar"><br>
    </form>
</body>
</html>