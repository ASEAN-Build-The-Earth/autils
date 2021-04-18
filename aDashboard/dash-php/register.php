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
        <h2>aAccount Register</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
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
            <label for="username">aAccount Username (Minecraft IGN):</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email">Discord: (ex.iOnly#0273)</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already have aAccount? <a href="login.php">Login</a></p>
    </form>

</body>
</html>