<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aMenu | ASEANBTE</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <img src="aseanlogo.png" alt="ASEAN BTE">
        <h2>aMenu Login</h2>
    </div>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">aAccount Username:</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p>Not have aAccount? <a href="register.php">Register</a></p>
    </form>

</body>
</html>