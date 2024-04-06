<html>
<head>
    <title>Perpustakaan</title>
</head>
<body>
    <?php $conn = mysqli_connect('localhost', 'root', '', 'perpustakaan'); ?>
    <center>
        <h3>Jenis Buku</h3>
        <table border='0' width='30%'>
            <form method='POST' action=''>
                <tr>
                    <td width='25%'>Kode Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='kode_jenis' size='10'></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='nama_jenis' size='10'></td>
                </tr>
                <tr>
                    <td width='25%'>Keterangan Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='keterangan_jenis' size='10'></td>
                </tr>
            </table>
            <input type='submit' value='Insert' name='submit_jenis'>
            <input type='submit' value='Update' name='update_jenis'>
            <input type='submit' value='Delete' name='delete_jenis'>
        </form>

        <?php
        if (isset($_POST['submit_jenis'])) {
            $kode_jenis = $_POST['kode_jenis'];
            $nama_jenis = $_POST['nama_jenis'];
            $keterangan_jenis = $_POST['keterangan_jenis'];

            $sql = "INSERT INTO jenis_buku (Kode_Jenis, Nama_Jenis, Keterangan_Jenis) VALUES ('$kode_jenis', '$nama_jenis', '$keterangan_jenis')";
            mysqli_query($conn, $sql);
        }

        if (isset($_POST['update_jenis'])) {
            $kode_jenis = $_POST['kode_jenis'];
            $nama_jenis = $_POST['nama_jenis'];
            $keterangan_jenis = $_POST['keterangan_jenis'];

            $sql = "UPDATE jenis_buku SET Nama_Jenis='$nama_jenis', Keterangan_Jenis='$keterangan_jenis' WHERE Kode_Jenis='$kode_jenis'";
            mysqli_query($conn, $sql);
        }

        if (isset($_POST['delete_jenis'])) {
            $kode_jenis = $_POST['kode_jenis'];

            $sql = "DELETE FROM jenis_buku WHERE Kode_Jenis='$kode_jenis'";
            mysqli_query($conn, $sql);
        }
        ?>

        <hr>
        <h3>Daftar Jenis Buku</h3>
        <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Jenis</b></td>
                <td align='center' width='20%'><b>Nama Jenis</b></td>
                <td align='center' width='20%'><b>Keterangan Jenis</b></td>
            </tr>
            <?php
            $sql = "SELECT * FROM jenis_buku";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td width='20%'>" . $row['Kode_Jenis'] . "</td>
                        <td width='30%'>" . $row['Nama_Jenis'] . "</td>
                        <td width='10%'>" . $row['Keterangan_Jenis'] . "</td>
                      </tr>";
            }
            ?>
        </table>

        <h3>Buku</h3>
        <table border='0' width='30%'>
            <form method='POST' action=''>
                <tr>
                    <td width='25%'>Kode Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='kode_buku' size='10'></td>
                </tr>
                <tr>
                    <td width='25%'>Kode Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <select name='kode_jenis'>
                            <?php
                            $sql = "SELECT Kode_Jenis FROM jenis_buku";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Kode_Jenis'] . "'>" . $row['Kode_Jenis'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='25%'>Nama Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='nama_buku' size='10'></td>
                </tr>
            </table>
            <input type='submit' value='Insert' name='submit_buku'>
            <input type='submit' value='Update' name='update_buku'>
            <input type='submit' value='Delete' name='delete_buku'>
        </form>

        <?php
        if (isset($_POST['submit_buku'])) {
            $kode_buku = $_POST['kode_buku'];
            $kode_jenis = $_POST['kode_jenis'];
            $nama_buku = $_POST['nama_buku'];

            $sql = "INSERT INTO buku (Kode_Buku, Kode_JenisFK, Nama_buku) VALUES ('$kode_buku', '$kode_jenis', '$nama_buku')";
            mysqli_query($conn, $sql);
        }

        if (isset($_POST['update_buku'])) {
            $kode_buku = $_POST['kode_buku'];
            $kode_jenis = $_POST['kode_jenis'];
            $nama_buku = $_POST['nama_buku'];

            $sql = "UPDATE buku SET Kode_JenisFK='$kode_jenis', Nama_buku='$nama_buku' WHERE Kode_Buku='$kode_buku'";
            mysqli_query($conn, $sql);
        }

        if (isset($_POST['delete_buku'])) {
            $kode_buku = $_POST['kode_buku'];

            $sql = "DELETE FROM buku WHERE Kode_Buku='$kode_buku'";
            mysqli_query($conn, $sql);
        }
        ?>

        <hr>
        <h3>Daftar Buku</h3>
        <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Buku</b></td>
                <td align='center' width='20%'><b>Kode Jenis</b></td>
                <td align='center' width='20%'><b>Nama Buku</b></td>
            </tr>
            <?php
            $sql = "SELECT * FROM buku";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td width='20%'>" . $row['Kode_Buku'] . "</td>
                        <td width='30%'>" . $row['Kode_JenisFK'] . "</td>
                        <td width='10%'>" . $row['Nama_buku'] . "</td>
                      </tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>