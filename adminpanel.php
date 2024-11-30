<?php

include ('connect.php');
$conn = Connect::getInstance()->getConnection();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST['username'];
$email = $_POST['email'];
$password =($_POST['password']);

$sqlInsert = "INSERT INTO initusers (username, email, password) VALUES ('$username', '$email', '$password')";


if (mysqli_query($conn, $sqlInsert)){
    session_start();
    $_SESSION['create'] = "Account Created Successfully";
} else {
    die("Something went wrong");
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
    <title>Create Account</title>
</head>
<body>
<div class="logout-container" >
            <a href="index.php" class="btn btn-warning">Logout</a>
        </div>
         
<div class="container">
    <div class="box form-box">
        <header>Admin Panel</header>
        <h2>Create User Account</h2>
        <form action="" method="POST">
            <div class="field input">
                <label for="username">Username:</label>
                <div class="input">
                <input type="text" id="username" name="username" required>
            </div>
    

    <div class="field">
        <label for="email">Email:</label>
        <div class="input">
        <input type="email" id="email" name="email" required>
        </div>
    </div>

    <div class="field">
        <label for="password">Password:</label>
        <div class="input">
        <input type="password" id="password" name="password" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create Account</button>
        
    </form>
</div>  

 
</div>

</body>
</html>

