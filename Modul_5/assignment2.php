<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'factory');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

// View data
function viewData() {
    global $conn;
    $sql = "SELECT * FROM gudang";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Daftar Gudang:</h2>";
        echo "<table border='1'>
        <tr>
        <th>Kode Gudang</th>
        <th>Nama Gudang</th>
        <th>Lokasi</th>
        <th>Action</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['kode_gudang'] . "</td>";
            echo "<td>" . $row['nama_gudang'] . "</td>";
            echo "<td>" . $row['lokasi'] . "</td>";
            echo "<td><a href='?edit=" . $row['kode_gudang'] . "'>Edit</a> | <a href='?delete=" . $row['kode_gudang'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data gudang.";
    }
}

// Insert data
if (isset($_POST['submit'])) {
    $kode_gudang = sanitizeInput($_POST['kode_gudang']);
    $nama_gudang = sanitizeInput($_POST['nama_gudang']);
    $lokasi = sanitizeInput($_POST['lokasi']);
    $sql = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) VALUES ('$kode_gudang', '$nama_gudang', '$lokasi')";
    if (mysqli_query($conn, $sql)) {
        echo "Data gudang berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Update data
if (isset($_POST['submit_edit'])) {
    $kode_gudang = sanitizeInput($_POST['kode_gudang']);
    $nama_gudang = sanitizeInput($_POST['nama_gudang']);
    $lokasi = sanitizeInput($_POST['lokasi']);
    $sql = "UPDATE gudang SET nama_gudang='$nama_gudang', lokasi='$lokasi' WHERE kode_gudang='$kode_gudang'";
    if (mysqli_query($conn, $sql)) {
        echo "Data gudang berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Delete data
if (isset($_GET['delete'])) {
    $kode_gudang = sanitizeInput($_GET['delete']);
    $sql = "DELETE FROM gudang WHERE kode_gudang='$kode_gudang'";
    if (mysqli_query($conn, $sql)) {
        echo "Data gudang berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Edit data
if (isset($_GET['edit'])) {
    $kode_gudang = sanitizeInput($_GET['edit']);
    $sql = "SELECT * FROM gudang WHERE kode_gudang='$kode_gudang'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
</head>

<body>
<center>
    <h1>Data Data Gudang</h1>
    <h2>Tambah Gudang</h2>
    <form method="post">
        <label for="kode_gudang">Kode Gudang:</label><br>
        <input type="text" id="kode_gudang" name="kode_gudang"><br>
        <label for="nama_gudang">Nama Gudang:</label><br>
        <input type="text" id="nama_gudang" name="nama_gudang"><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" id="lokasi" name="lokasi"><br><br>
        <input type="submit" name="submit" value="Tambah">
    </form>

    <?php viewData(); ?>

    <?php if (isset($_GET['edit'])) : ?>
        <h2>Edit Gudang</h2>
        <form method="post">
            <input type="hidden" name="kode_gudang" value="<?php echo $row['kode_gudang']; ?>">
            <label for="nama_gudang">Nama Gudang:</label><br>
            <input type="text" id="nama_gudang" name="nama_gudang" value="<?php echo $row['nama_gudang']; ?>"><br>
            <label for="lokasi">Lokasi:</label><br>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>"><br><br>
            <input type="submit" name="submit_edit" value="Simpan Perubahan">
        </form>
    <?php endif; ?>

</center>
</body>

</html>

<?php
// Close connection
mysqli_close($conn);
?>
