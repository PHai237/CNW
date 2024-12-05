<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #74b9ff, #a29bfe);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 600px;
            height: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.1);
            box-sizing: border-box;
            background-color: #333;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            color: #fff;
        }

        .login-box h2 {
            text-align: center;
            font-size: 50px;
            margin: 0 0 30px 0;
        }

        .login-box input {
            width: 60%;
            padding: 10px;
            margin: 10px 0 20px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .login-box input::placeholder {
            color: #ddd;
        }

        .login-box input:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .login-box #password {
            margin-left: 50px;
        }

        .login-box button {
            width: 60%;
            padding: 10px;
            background: linear-gradient(120deg, #0984e3, #6c5ce7);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            bottom: 40px;
            left: 20%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .login-box button:hover {
            background: linear-gradient(120deg, #74b9ff, #a29bfe);
        }

        .error {
            color: #ff7675;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <div class="error">
            <?php 
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                }
            ?>
        </div>

        <form method="post" action="">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <br>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
