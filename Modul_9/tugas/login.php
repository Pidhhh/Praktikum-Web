<?php
session_start();

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'informatics';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'] ?? '';
    $Password = $_POST['Password'] ?? '';

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND Password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $Username, $Password); // Bind parameters
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Status'] = $row['Status'];
            header("Location: profile.php");
            exit();
        } else {
            echo "Invalid Username or Password";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
        <p align="center">
            Username: <input type="text" name="Username"><br>
            Password: <input type="Password" name="Password"><br>
            <input type="submit" value="Login">
        </p>
    </form>
</body>
</html> -->
