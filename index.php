    <?php

include ("connect.php");

$conn = Connect::getInstance()->getConnection();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $sql="SELECT * FROM initusers WHERE username = '$username' AND password = '$password' AND email = '$email'";
    
    $result= mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
    
    if (mysqli_num_rows($result) > 0) {
        if ($row['email'] == $email && $row['username'] == $username && $row['password'] == $password) {
            // Email address matches, proceed with the rest of the code
            $usertype = $row["usertype"];
            switch ($usertype) {
                case "admin":
                    header("location:adminpanel.php");
                    break;
                case "user":
                    header("location:loading_dock.php");
                    break;
                default:
                    $error = "username, email, or password is incorrect";
                    break;
            }
        } else {
            $error = "Email, username, and password does not match the one stored in the database";
        }
        if (isset($error)) {
            echo $error;
        }
    }
}
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Zugon Warehouse Management System</title>
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
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    
                    <div class="field input">
                        <button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
                    </div>
                    </form>
            </div>
        </div>
    </body>
    </html>