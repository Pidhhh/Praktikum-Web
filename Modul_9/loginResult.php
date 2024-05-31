<?php
session_start();

echo "You have successfully logged in as " . $_SESSION['Username'] . " and you are registered as " . $_SESSION['Status'];
?>

<br>

Please log out by clicking the link <a href='logout.php'>here</a>.
