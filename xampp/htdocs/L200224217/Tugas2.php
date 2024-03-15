<!DOCTYPE html>
<html>
<head>
    <title>Program Ganjil Genap</title>
</head>
<body>
    <form method="post">
        Masukkan sebuah bilangan: <input type="text" name="bilangan">
        <input type="submit" name="submit" value="Cek">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        // Mengambil nilai bilangan dari form
        $bilangan = $_POST['bilangan'];

        // Memeriksa apakah bilangan tersebut ganjil atau genap
        if($bilangan % 2 == 0) {
            echo "$bilangan adalah bilangan genap.";
        } else {
            echo "$bilangan adalah bilangan ganjil.";
        }
    }
    ?>
</body>
</html>
