<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$host = 'localhost';
$db = 'student_db';
$user = 'root';
$pass = 'mu1ne2ze3ro4';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([
        "success" => false,
        "message" => "Database connection failed"
    ]));
}


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    /*READ (GET)*/
    case 'GET':
        // GET ONE USER
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT id, fname, lname, email, gender, created_at FROM users WHERE id=$id");

            if ($result->num_rows > 0) {
                echo json_encode([
                    "success" => true,
                    "data" => $result->fetch_assoc()
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "User not found"
                ]);
            }

        } 
        // GET ALL USERS
        else {
            $result = $conn->query("SELECT id, fname, lname, email, gender, created_at FROM users");

            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }

            echo json_encode([
                "success" => true,
                "data" => $users
            ]);
        }
        break;


    /*CREATE (POST)*/
    case 'POST':

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['fname'], $data['lname'], $data['email'], $data['gender'], $data['password'])) {
            echo json_encode([
                "success" => false,
                "message" => "Missing required fields"
            ]);
            break;
        }

        $fname = $conn->real_escape_string($data['fname']);
        $lname = $conn->real_escape_string($data['lname']);
        $email = $conn->real_escape_string($data['email']);
        $gender = $conn->real_escape_string($data['gender']);
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (fname, lname, email, gender, password)
                VALUES ('$fname', '$lname', '$email', '$gender', '$password')";

        if ($conn->query($sql)) {
            echo json_encode([
                "success" => true,
                "message" => "User created successfully",
                "id" => $conn->insert_id
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Failed to create user",
                "error" => $conn->error
            ]);
        }

        break;


    /* UPDATE (PUT) */
    case 'PUT':

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['id'])) {
            echo json_encode([
                "success" => false,
                "message" => "User ID is required"
            ]);
            break;
        }

        $id = intval($data['id']);
        $fname = $conn->real_escape_string($data['fname']);
        $lname = $conn->real_escape_string($data['lname']);
        $email = $conn->real_escape_string($data['email']);
        $gender = $conn->real_escape_string($data['gender']);

        $sql = "UPDATE users 
                SET fname='$fname', lname='$lname', email='$email', gender='$gender'
                WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode([
                "success" => true,
                "message" => "User updated successfully"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Failed to update user",
                "error" => $conn->error
            ]);
        }

        break;


    /* DELETE (DELETE)*/
    case 'DELETE':

        if (!isset($_GET['id'])) {
            echo json_encode([
                "success" => false,
                "message" => "User ID is required"
            ]);
            break;
        }

        $id = intval($_GET['id']);

        if ($conn->query("DELETE FROM users WHERE id=$id")) {
            echo json_encode([
                "success" => true,
                "message" => "User deleted successfully"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Failed to delete user",
                "error" => $conn->error
            ]);
        }

        break;


    default:
        echo json_encode([
            "success" => false,
            "message" => "Invalid request method"
        ]);
        break;
}

$conn->close();
?>