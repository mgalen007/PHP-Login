<?php
    session_start();

    if (isset($_POST["login-btn"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $login_successful = false;

        # Authentication
        if (isset($_SESSION["users"])){
            foreach ($_SESSION["users"] as $user){
                if ($email == $user[0] && $password == $user[1]){
                    $login_successful = true;
                }
            }

            if ($login_successful){
                $_SESSION["user_email"] = $email;
                header("Location: home.php");
                exit;
            }
            else{
                echo "<p id='invalid'>Invalid username or password</p>";
            }
        }
        else {
            echo "<p id='invalid'>You have not registered yet!</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root{
            font-family: "Segoe UI";
        }
        #login-card{
            border: 1.5px solid gray;
            width: fit-content;
            padding: 0 40px 40px 40px;
            margin: 50px auto;

        input{
            padding: 10px 15px;
            width: 250px;
            border: 1px solid gray;
        }
        input:focus{
            outline: none;
        }
        }
        button{
            width: 283px;
            padding: 7.5px 0;
            cursor: pointer;
        }
        h2{
            text-align: center;
        }
        a {
            color: rgba(0, 0, 0, 0.65);
        }
        p#invalid{
            color: red;
            text-align: center;
            transform: translateY(370px);
        }
    </style>
</head>
<body>
    <div id="login-card">
        <form action="login.php" method="POST">
            <h2>Login Page</h2><br>
            <input type="email" name="email" placeholder="Email address" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit" name="login-btn" value="login">Login</button><br>
            <p>No account? Click <a href="register.php">here</a> to register.
        </form>
     </div>
</body>
</html>