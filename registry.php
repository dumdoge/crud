    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Register</title>
    </head>
    <body>
        <style>
        * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'comicsans', sans-serif; 
    }

    body {
        background-image: url(thiswan.jpg);
    
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 110vh;
    }

    .box {
        background-color: lightyellow; 
        flex-direction: column;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                    0 32px 64px -48px rgba(0, 0, 0, 0.5);
    }

    .form-box {
        width: 450px;
        margin: 0px 10px;
    }

    .form-box header {
        font-size: 25px;
        font-weight: 700;
        padding-bottom: 10px;
        border-bottom: 1px solid #e6e6e6;
        margin-bottom: 10px;
    }

    .form-box form .field {
        display: flex;
        margin-bottom: 10px;
        flex-direction: column;
    }

    .form-box form .input input {
        height: 40px;
        width: 100%;
        font-size: 16px;
        padding: 0 10px;
        border: 1px solid #ccc;
    }
        
        </style>
        <?php
        include ('connect.php');
        $conn = Connect::getInstance()->getConnection();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username   = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $contact = $_POST['contact'];
        
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
        
            if ($stmt->num_rows > 0) {
                $error_msg = "Username already taken. Please choose another one.";
            } else {
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashed_password);
        
                if ($stmt->execute()) {
                    $success_msg = "Registration successful! <a href='login.php'>Login here</a>.";
                } else {
                    $error_msg = "Error: " . $stmt->error;
                }
            }
        
            $stmt->close();
        }
        
        $conn->close();
        ?>

        <div class="container">
            <div class="box form-box">
                <header>Register</header>

                <?php if (!empty($error_msg)): ?>
                    <p class="error-msg"><?php echo $error_msg; ?></p>
                <?php elseif (!empty($success_msg)): ?>
                    <p class="success-msg"><?php echo $success_msg; ?></p>
                <?php endif; ?>

                <form action="register.php" method="post">
                    <div class="field input">
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username" required>
                    </div>

                    <div class="field input">
                        <label for="first name"> First Name: </label>
                        <input type="text" name="firstname" id="firstname" required>
                    </div>

                    <div class="field input">
                        <label for="last name">Last Name: </label>
                        <input type="text" name="lastname" id="lastname" required>
                    </div>  

                    <div class="field input">
                        <label for="contact_number">Contact Number: </label>
                        <input type="text" name="contact" id="contact" required>
                    </div>


                    <div class="field input">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    
                    <div class="field input">
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>

                <div class="links">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </body>
    </html>
