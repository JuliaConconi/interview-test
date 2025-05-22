<?php
include 'conexao.php';

// Inicie a sessão no início do arquivo
if (!isset($_SESSION)) {
    session_start();
}

// Verifique se os campos foram enviados
if (isset($_POST['email']) && isset($_POST['password'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Fill in this field with your email";
    } else if (strlen($_POST['password']) == 0) {
        echo "Fill in your password";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        // ATENÇÃO: Troque 'password' pelo nome correto da coluna de senha no seu banco, por exemplo 'senha'
        $sql_code = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $sql_query = $mysqli->query($sql_code) or die("Code execution failed SQL: " . $mysqli->error);

        $amount = $sql_query->num_rows;

        if ($amount == 1) {
            $user = $sql_query->fetch_assoc();

            $_SESSION['user'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: painel.php");
            exit(); 

        } else {
            echo ("Login failed! E-mail or password is wrong");
        }
    }
}
?>


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
            <input type="password" name="password">
        </p>
        <p>
            <button type="submit">Enter</button>
        </p>
    </form>
</body>

</html>