    <?php

    include ("connect.php");

    $conn = Connect::getInstance()->getConnection();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        
        $result= mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        switch ($row["username"]) {
            case "admin":
                header("location:adminpanel.php");
                break;
            case "user":
                header("location:loading_dock.php");
                break;
            default:
                echo "username or password is incorrect";
                break;
        }

}
    ?>

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