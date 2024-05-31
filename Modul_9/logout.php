<?php
session_start();
session_destroy();
?>

<script language="JavaScript">
alert('You have logged out');
document.location='login.php';
</script>
