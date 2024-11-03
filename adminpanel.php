<?php

$conn = Connect::getInstance()->getConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background-image: url('thiswan.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
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
            text-align: center;
        }

        .form-box form .field {
            display: flex;
            margin-bottom: 15px;
            flex-direction: column;
        }

        .form-box form label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-box form .input input, .form-box form .input select {
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-box form button {
            height: 45px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-box form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <div class="form-box">
            <header>Create User Account</header>
            <form action="/create_account" method="POST">
                <div class="field">
                    <label for="username">Username:</label>
                    <div class="input">
                        <input type="text" id="username" name="username" required>
                    </div>
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

                <div class="field">
                    <label for="role">Role:</label>
                    <div class="input">
                        <select id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <button type="submit">Create Account</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

