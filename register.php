<?php
    session_start();

    if (isset($_POST["register-btn"])){
        # Store data in variables
        $fname = $_POST["first-name"];
        $lname = $_POST["last-name"];
        $email = $_POST["email"];
        $pwd_one = $_POST["password-one"];
        $pwd_two = $_POST["password-two"];

        # Check if pwd_one matches pwd_two
        if ($pwd_one != $pwd_two){
            echo "<p id='mismatch'>Make sure the first password matches the second!</p>";
        }
        else{
            if (!isset($_SESSION["users"])){
                $_SESSION["users"] = []; # Array to store user credentials
            }
            # Check if email is already registered
            $email_exists = false;
            foreach($_SESSION["users"] as $user){
                if ($email == $user[0]) {
                    $email_exists = true;
                }
            }

            if ($email_exists){
                echo "<p id='mismatch'>Email already registered!</p>";
            }

            else{
                array_push($_SESSION["users"], [$email, $pwd_two]); # Or alternatively $pwd_one
                header("Location: login.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        :root{
            font-family: "Segoe UI";
        }
        #registration-card{
            border: 1.5px solid gray;
            width: fit-content;
            padding: 10px 40px 40px 40px;
            margin: 50px auto;
        }
        button{
            width: 460px;
            cursor: pointer;
            padding: 10px 0;
        }
        input{
            border: 1.5px solid gray;
            padding: 10px 15px;
            width: 200px;
        }
        input:focus{
            outline: none;
        }
        h2{
            text-align: center;
        }
        p#mismatch{
            color: red;
            text-align: center;
            transform: translateY(470px);
        }
    </style>
</head>
<body>
    <div id="registration-card">
        <form action="register.php" method="POST">
            <h2>Registration Form</h2><br>
            <input type="text" name="first-name" placeholder="First name" required>
            <input type="text" name="last-name" placeholder="Last name" required><br><br>
            <input type="email" name="email" placeholder="Email address" required><br><br>
            <label>Create password: </label>
            <input type="password" name="password-one" required><br><br>
            <label>Confirm password: </label>
            <input type="password" name="password-two" required><br><br>
            <button type="submit" name="register-btn" value="register">Register</button>
        </form>
    </div>
</body>
</html>