<?php
include('conexao.php');

if(isset($_POST['email']) || isset ($_POST['password'])){

    if(strlen($_POST['email']) == 0){
        echo "Fill in this field with your email";
    }else if(strlen($_POST['password']) == 0) {
            echo "Fill in your password";
        }else{

            $email = $mysqli->real_escape_string($_POS['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT  * FROM users WHERE email = '$email' AND 'password' = '$password' ";
            $sql_query = $mysqli->query($sql_query) or die("Failed in the execution the code SQL: " .$mysqli->error);

            // Mudar para inglês
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $user = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['user'] = $user['id'];
                $_SESSION['name'] = $user['name'];

            }else{
                echo("Falha ao logar! E-mail or password is wrong");
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
    <h1>Login</h1>
    <form action="" method="POST">
        <p>
            <label>Email:</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Password:</label>
            <input type="passwod" name="password">
        </p>
        <p>
            <button type="submit">Enter</button>
        </p>
    </form>
</body>
</html>