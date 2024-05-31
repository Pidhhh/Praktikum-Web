<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$servername = 'localhost';
$username_db = 'root';
$password_db = '';
$dbname = 'informatics';

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Username = $_POST['Username'] ?? '';
$password = $_POST['password'] ?? '';
$submit = $_POST['submit'] ?? '';

if ($submit) {
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $Username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            // Logged in successfully
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Status'] = $row['Status'];
            ?>
            <script language="JavaScript">
                alert('You are logged in as <?php echo $row['Username']; ?>');
                document.location='loginresult.php';
            </script>
            <?php
        } else {
            // Login failed
            ?>
            <script language="JavaScript">
                alert('Login Failed');
                document.location='login.php';
            </script>
            <?php
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<form method="post" action="login.php">
    <p align="center">
        Username: <input type="text" name="Username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </p>
</form>
