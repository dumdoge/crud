<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" required>
                </div>
                
                <div class="field input">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="field input">
                    <input type="submit" name="submit" value="Login">
                </div>
            </form>

            <div class="links">
                No Account? <a href="registry.php">Sign Up!</a>
            </div>
        </div>
    </div>
</body>
</html>