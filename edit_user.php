<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin.php');
    exit();
}

include 'connection.php';

$user_id = $_GET['id'];
$user = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    $sql = "UPDATE users SET fname='$fname', lname='$lname', email='$email', gender='$gender' WHERE id=$user_id";
    
    if ($conn->query($sql)) {
        header('Location: dashboard.php?updated=true');
        exit();
    } else {
        $error = "Error updating user: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        header('Location: dashboard.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
 
        .header {
            background: #000000;
            color: #ffffff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
 
        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }
 
        .back-link {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 8px 12px;
            border: 1px solid #ffffff;
            border-radius: 4px;
            transition: all 0.2s ease;
        }
 
        .back-link:hover {
            background: #ffffff;
            color: #000000;
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
        input[type="email"] {
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
        input[type="email"]:focus {
            outline: none;
            border-color: #000000;
            background: #ffffff;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
 
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: #ffffff;
            margin-bottom: 20px;
            cursor: pointer;
        }
 
        select:focus {
            outline: none;
            border-color: #000000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
 
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
 
        input[type="submit"] {
            flex: 1;
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
        }
 
        input[type="submit"]:hover {
            background: #333333;
        }
 
        .btn-cancel {
            flex: 1;
            padding: 14px;
            background: #666666;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            text-align: center;
        }
 
        .btn-cancel:hover {
            background: #555555;
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
 
        .user-info {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #666666;
        }
 
        .user-info strong {
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Edit User</h1>
            <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
        </div>
        
        <form action="edit_user.php?id=<?php echo $user_id; ?>" method="POST">
            <fieldset>
                <?php if (isset($error)): ?>
                    <div class="alert alert-error"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if ($user): ?>
                    <div class="user-info">
                        <strong>User ID:</strong> <?php echo $user['id']; ?> | 
                        <strong>Registered:</strong> <?php echo date('M j, Y g:i A', strtotime($user['created_at'])); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" id="fname" required value="<?php echo htmlspecialchars($user['fname']); ?>">
                    <span class="error-message">Please enter first name</span>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" required value="<?php echo htmlspecialchars($user['lname']); ?>">
                    <span class="error-message">Please enter last name</span>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($user['email']); ?>">
                    <span class="error-message">Please enter a valid email address</span>
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                    <span class="error-message">Please select gender</span>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Update User">
                    <a href="dashboard.php" class="btn-cancel">Cancel</a>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
