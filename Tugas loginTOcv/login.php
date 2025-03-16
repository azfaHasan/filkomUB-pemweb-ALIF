<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST">
            <h1>Login Form</h1>
            <div class="form-content">
                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-control" id="email" required><br>
            </div>
            <div class="form-content">
                <label for="password">Password</label><br>
                <input type="password" name="password" class="form-control" id="password" required><br>
            </div>
            <input type="submit" name="login" class="loginBtn" value="login"><br>
        </form>
    </div>
</body>
</html>
<?php 
    $e_mail = "emailcontoh@student.ub.ac.id";
    $pwd = "student.ub.ac.id";

    if(isset($_POST["login"]))
    {
        if($_POST["email"] == $e_mail && $_POST["password"] == $pwd)
        {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];

            header("Location: form.php");
        }
        else
        {
            echo "email of password is incorrect!";
        }
    }
?>