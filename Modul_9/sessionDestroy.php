<?php
session_start();

$id_session = session_id();

echo "Your session ID is " . $id_session;
echo "<br><br>";

session_destroy();

// The session is destroyed, but session_id() still returns the current session ID.
// To generate a new session ID, you need to start a new session.
session_start();
$id_session2 = session_id();

echo "Your session ID after the session data was destroyed: " . $id_session2;
?>
