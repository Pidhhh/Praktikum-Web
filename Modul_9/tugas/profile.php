<?php
session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit;
}

$Status = $_SESSION['Status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 { font-weight: 400; }
        .container { padding: 20px; flex: 1; }

        /* Header styles */
        header {
            background-color: #222;
            color: white;
            padding: 15px;
            text-align: center;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        /* Admin styles */
        <?php if ($Status === 'Administrator'): ?>
        body { background-color: #f0f8ff; } 
        header { background-color: #007bff; }
        footer { background-color: #0056b3; }
        h2, p { color: #004085; }
        <?php endif; ?>

        /* Member styles */
        <?php if ($Status === 'Member'): ?>
        body { background-color: #fff8f0; }
        header { background-color: #ffc107; }
        footer { background-color: #e0a800; }
        h2, p { color: #856404; }
        <?php endif; ?>

        /* User info box */
        .user-info {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .user-info i {
            font-size: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Profile Page</h1>
    </header>

    <div class="container">
        <div class="user-info">
            <i class="fas fa-user-circle"></i> <h2>Welcome, <?php echo $_SESSION['Username']; ?>!</h2>
            <p>Your Status: <?php echo $Status; ?></p>
        </div>

        <?php if ($Status === 'Administrator'): ?>
            <p>This is the Administrator view. You have full access to the system.</p>
            <?php elseif ($Status === 'Member'): ?>
            <p>This is the Member view. Welcome!</p>
            <?php endif; ?>
    </div>

    <footer>
        <a href="logout.php" style="color: white; text-decoration: none;">Logout</a>
    </footer>
</body>
</html>
