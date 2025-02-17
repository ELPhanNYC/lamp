<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP Social</title>
</head>
<body>
    <div class="header">
        <h1>LAMP Social</h1>
    </div>
    <hr>
    <div class="profile-row">
    <button onclick="location.href = 'register.html';">Register</button>
    <button onclick="location.href = 'login.html';">Login</button>

    </div>
    <hr>
    <div class="content">
        <?php
            require __DIR__ . '/db.php';
            echo "Your feed is empty!";
        ?>
    </div>
    
</body>
</html>