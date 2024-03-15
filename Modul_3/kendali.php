<html>
<head>
    <title>Kendali</title>
</head>
<body>
<H1>Nilai</H1>
<form method='POST' action='kendali.php'>
    <!-- Input field untuk nilai -->
    <p>Masukkan Nilai Angka (0-100) : <Input
    type='text' name='nilai' size='3'></p>
    <p><input type='submit' value='Proses'
    name='submit'></p>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if($submit){
    if($nilai == ''){
        $Grade = "Nilai kosong/belum diisi";
    }elseif($nilai <= 20){
        $Grade = "E";
    }elseif($nilai <= 40){
        $Grade = "D";
    }elseif($nilai <= 60){
        $Grade = "C";
    }elseif($nilai <= 80){
        $Grade = "B";
    }elseif($nilai <= 100){
        $Grade = "A";
    }else{
        $Grade = "Nilai yang dimasukkan salah!";
    }
    echo "Nilai angka adalah $nilai<br>";
    echo "Maka nilai Grade adalah $Grade";
}
?>
</body>
</html>
