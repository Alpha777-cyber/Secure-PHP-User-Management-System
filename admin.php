<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === 'admin' && $password === 'admin123') {
        
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['login_time'] = time();
        
        header('Location: dashboard.php');
        exit();
        
    } else {
        
        $login_error = "Invalid username or password";
        error_log("Failed admin login attempt: Username '$username' from IP " . $_SERVER['REMOTE_ADDR']);
    }
}

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    
    session_destroy();
    header('Location: admin.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - User Registration System</title>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
 
        .container {
            width: 100%;
            max-width: 360px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
 
        form {
            padding: 30px;
        }
 
        fieldset {
            border: none;
            background: transparent;
            padding: 0;
        }
 
        legend {
            font-size: 1.4rem;
            font-weight: 600;
            color: #000000;
            text-align: center;
            margin-bottom: 22px;
            padding: 0;
            width: 100%;
        }
 
        label {
            display: block;
            font-weight: 500;
            color: #333333;
            margin-bottom: 6px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
 
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background: #ffffff;
            margin-bottom: 16px;
        }
 
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #000000;
            background: #ffffff;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
 
        input[type="submit"] {
            width: 100%;
            padding: 11px;
            background: #000000;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 6px;
        }
 
        input[type="submit"]:hover {
            background: #333333;
        }
 
        input[type="submit"]:active {
            background: #000000;
        }
 
        .error-message {
            color: #000000;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
 
        .form-group.error .error-message {
            display: block;
        }
 
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666666;
            text-decoration: none;
            font-size: 0.9rem;
        }
 
        .back-link:hover {
            color: #000000;
        }
 
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 0.9rem;
        }
 
        .alert-error {
            background: #f8f8f8;
            border: 1px solid #000000;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <form action="admin.php" method="POST">
            
            <fieldset>
                
                <legend>Admin Login</legend>

                <?php
                if (isset($login_error)) {
                    echo '<div class="alert alert-error">' . htmlspecialchars($login_error) . '</div>';
                }
                ?>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                    <span class="error-message">Please enter username</span>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                    <span class="error-message">Please enter password</span>
                </div>

                <input type="submit" value="Login">
                
            </fieldset>
        </form>
        <a href="signup.php" class="back-link">← Back to Signup</a>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                if (usernameInput.value.trim() === '') {
                    usernameInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    usernameInput.parentElement.classList.remove('error');
                }
                
                if (passwordInput.value.trim() === '') {
                    passwordInput.parentElement.classList.add('error');
                    isValid = false;
                } else {
                    passwordInput.parentElement.classList.remove('error');
                }
                
                if (!isValid) {
                    event.preventDefault();
                }
            });
            
            usernameInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
            
            passwordInput.addEventListener('input', function() {
                this.parentElement.classList.remove('error');
            });
        });
    </script>
    
</body>
</html>
