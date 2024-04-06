<html>
<head>
    <title>Data Barang</title>
</head>
<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'factory');
?>
<center>
    <h3>Masukkan Data Barang :</h3>
    <table border='0' width='30%'>
        <form method='POST' action='form.php'>
            <tr>
                <td width='25%'>Kode Barang</td>
                <td width='5%'>:</td>
                <td width='65%'><input type='text' name='Kode_Barang' size='10'></td>
            </tr>
            <tr>
                <td width='25%'>Nama Barang</td>
                <td width='5%'>:</td>
                <td width='65%'><input type='text' name='Nama_Barang' size='10'></td>
            </tr>
            <tr>
                <td width='25%'>Kode Gudang</td>
                <td width='5%'>:</td>
                <td width='65%'><input type='text' name='Kode_Gudang' size='10'></td>
            <tr>
                <td width='25%'>Gudang</td>
                <td width='5%'>:</td>
                <td width='65%'>
                    <?php
                    $sql = "SELECT * FROM gudang";
                    $retval = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($retval)) {
                        echo "<option value='{$row['Kode_Gudang']}'>{$row['Nama_Gudang']}</option>";
                    }
                    ?>
                </td>
            </tr>
    </table>
    <input type='submit' value='Masukkan' name='submit'>
    </form>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    if (isset($_POST['submit'])) {
        $Kode_Barang = $_POST['Kode_Barang'];
        $Nama_Barang = $_POST['Nama_Barang'];
        $Kode_Gudang = $_POST['Kode_Gudang'];
        $input = "INSERT INTO barang(Kode_Barang, Nama_Barang, Kode_Gudang) VALUES ('$Kode_Barang', '$Nama_Barang', '$Kode_Gudang')";
        if ($submit) {
            mysqli_query($conn, $input);
            echo '</br>Data berhasil dimasukkan';
        }
    }
    ?>
    <hr>
    <h3>Data Barang</h3>
    <table border='1' width='50%'>
        <tr>
            <td align='center' width='20%'><b>Kode Barang</b></td>
            <td align='center' width='20%'><b>Nama Barang</b></td>
            <td align='center' width='20%'><b>Lokasi Gudang</b></td>
        </tr>
        <?php
        $cari = "SELECT * FROM barang, gudang WHERE barang.Kode_GudangFK = gudang.Kode_Gudang";
        $hasil_cari = mysqli_query($conn, $cari);
        while ($data = mysqli_fetch_row($hasil_cari)) {
            echo "
            <tr>
                <td width='20%'>$data[0]</td>
                <td width='30%'>$data[1]</td>
                <td width='10%'>$data[2]</td>
            </tr>";
        }
        ?>
    </table>
</center>
</body>
</html>
