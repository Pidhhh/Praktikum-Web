<!DOCTYPE html>
<html>
<head>
    <title>Program Penjumlahan</title>
</head>
<body>
    <form method="post">
        Nilai A adalah <input type="text" name="nilai_a"><br>
        Nilai B adalah <input type="text" name="nilai_b"><br>
        <input type="submit" name="submit" value="Jumlahkan">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        // Mengambil nilai dari form
        $nilai_a = $_POST['nilai_a'];
        $nilai_b = $_POST['nilai_b'];

        // Melakukan penjumlahan
        $jumlah = $nilai_a + $nilai_b;

        // Menampilkan hasil penjumlahan
        echo "<h3>Hasil:</h3>";
        echo "Nilai A adalah $nilai_a <br>";
        echo "Nilai B adalah $nilai_b <br>";
        echo "Jadi Nilai A ditambah dengan Nilai B adalah $jumlah";
    }
    ?>
</body>
</html>
