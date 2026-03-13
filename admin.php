<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Modern CSS styling for the database application */
 
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
            max-width: 400px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
 
        form {
            padding: 40px;
        }
 
        fieldset {
            border: none;
            background: transparent;
            padding: 0;
        }
 
        legend {
            font-size: 1.75rem;
            font-weight: 600;
            color: #000000;
            text-align: center;
            margin-bottom: 30px;
            padding: 0;
            width: 100%;
        }
 
        label {
            display: block;
            font-weight: 500;
            color: #333333;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
 
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: #ffffff;
            margin-bottom: 20px;
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
            padding: 14px;
            background: #000000;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    // Simple admin credentials (in production, use proper authentication)
                    if ($username === 'admin' && $password === 'admin123') {
                        $_SESSION['admin_logged_in'] = true;
                        header('Location: dashboard.php');
                        exit();
                    } else {
                        echo '<div class="alert alert-error">Invalid username or password</div>';
                    }
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
</body>
</html>
