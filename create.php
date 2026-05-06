<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - User Created</title>
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
            max-width: 500px;
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
        input[type="email"],
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
        input[type="email"]:focus,
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
 
        br {
            display: none;
        }
        .success-message {
            text-align: center;
            padding: 40px;
        }
 
        .success-message h1 {
            color: #000000;
            font-size: 2rem;
            margin-bottom: 20px;
            animation: fadeInUp 0.6s ease;
        }
 
        .success-message p {
            color: #666666;
            font-size: 1.1rem;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease;
        }
 
        .back-link {
            display: inline-block;
            padding: 12px 24px;
            background: #000000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.2s ease;
            animation: fadeInUp 1s ease;
        }
 
        .back-link:hover {
            background: #333333;
            color: #ffffff;
        }
 
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
 
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
 
            .container {
                border-radius: 4px;
            }
 
            form {
                padding: 30px 20px;
            }
 
            legend {
                font-size: 1.5rem;
            }
 
            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 12px;
            }
 
            input[type="submit"] {
                padding: 12px;
                font-size: 1rem;
            }
        }
 
        input.error {
            border-color: #000000;
            background: #f8f8f8;
        }
 
        input.error:focus {
            border-color: #000000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
 
        input[type="submit"].loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
 
        .form-group {
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">
            <h1>✓ User Created Successfully</h1>
            <p>Your account has been created and you can now use the system.</p>
            <a href="signup.php" class="back-link">Back to Signup</a>
        </div>
    </div>
</body>
</html>

<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO users (fname, lname, email, gender, password) VALUES ('$fname', '$lname', '$email', '$gender', '$password')";
    $conn->query($sql);
}
?>

