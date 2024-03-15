<html>
<head>
    <title>Fungsi Tanggal dan Waktu</title>
</head>
<body>
<H1>Buku Tamu</H1>
<form method='POST' action='variable.php'>
    <!-- Input fields should be placed inside the form -->
    Nama: <input type="text" name="nama"><br>
    Email: <input type="text" name="email"><br>
    Komentar: <textarea name="komentar"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
// Fixing syntax error: 'error _ reporting' to 'error_reporting'
error_reporting(E_ALL ^ E_NOTICE);

// Fixing variable names: $ _POST to $_POST
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';

// Checking if form is submitted
if($submit){
    echo "<br>Nama : $nama";
    echo "<br>Email : $email";
    echo "<br>Komentar : $komentar";
}
?>
</body>
</html>

<html>
<head>
<title>Fungsi Tanggal dan Waktu</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date("H:i:s A");
$waktu = date("d-m-Y");
$hari = date("l");
$tanggal = date("d");
$bulan = date("F");
$tahun = date("Y");
echo "Sekarang jam $jam</br>";
echo "Sekarang tanggal $waktu</br>";
echo "Lebih detailnya hari $hari Tanggal $tanggal Bulan $bulan Tahun $tahun";
?>
</body>
</html>
