<html>
<head>
    <title>Variabel</title>
</head>
<body>
<H1>Buku Tamu</H1>
<form method='POST' action='variable.php'>
    Nama : <input type="text" name="nama" size="20"><br>
    Email : <input type="text" name="email" size="30"><br>
    Komentar : <textarea name="komentar"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if($submit){
    echo "<br>Nama : $nama";
    echo "<br>Email : $email";
    echo "<br>Komentar : $komentar";
}
?>
</body>
</html>
