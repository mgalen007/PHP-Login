<?php
    session_start();

    if (!isset($_SESSION["user_email"])){
        header("Location: login.php");
        exit;
    }

    if (isset($_POST["logout-btn"])){
        session_destroy();
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <main>
        <h1>Welcome back!</h1>
        <?php
            $current_user = $_SESSION["user_email"];
            echo "Logged in as $current_user";
        ?>
        <form action="home.php" method="POST">
            <br>
            <button type="submit" name="logout-btn" value="logout">Log out</button>
        </form>
    </main>
</body>
</html>