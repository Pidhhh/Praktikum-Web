<!-- HTML Document: This is an HTML document for managing student data. -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'informatika'); // Establishing a connection to the MySQL database.
?>
<body>
<center>
<h3>Masukkan Data Mahasiswa :</h3> <!-- Heading for input form -->
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>NIM</td> <!-- Label for NIM (student ID) input -->
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nim' size='10' maxlength="10"></td></tr> <!-- Input field for NIM -->
<td width='25%'>Nama</td> <!-- Label for Nama (name) input -->
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama' size='30' maxlength="50"></td></tr> <!-- Input field for Nama -->
<td width='25%'>Kelas</td> <!-- Label for Kelas (class) input -->
<td width='5%'>:</td>
<td width='65%'>
  <input type="radio" value='A' name='kelas' checked>A <!-- Radio button for class A -->
  <input type="radio" value='B' name='kelas'>B <!-- Radio button for class B -->
  <input type="radio" value='C' name='kelas'>C <!-- Radio button for class C -->
</td></tr>
<td width='25%'>Alamat</td> <!-- Label for Alamat (address) input -->
<td width='5%'>:</td>
<td width='65%'><input type="text" name='alamat' size='40' maxlength="50"></td></tr> <!-- Input field for Alamat -->
</table>
<input type="submit" value="Masukkan" name="submit">
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST['nim']; // Storing NIM input
  $nama = $_POST['nama']; // Storing Nama input
  $kelas = $_POST['kelas']; // Storing Kelas input
  $alamat = $_POST['alamat']; // Storing Alamat input
  $submit = $_POST['submit'];

  $input = "INSERT INTO mahasiswa(NIM, Nama, Kelas, Alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')"; // SQL query to insert data into the database

  if ($submit) {
    if ($nim == '') {
      echo "</br>NIM tidak boleh kosong, diisi dulu"; // Error message if NIM is empty
    } elseif ($nama == '') {
      echo "</br>Nama tidak boleh kosong, diisi dulu"; // Error message if Nama is empty
    } elseif ($alamat == '') {
      echo "</br>Alamat tidak boleh kosong, diisi dulu"; // Error message if Alamat is empty
    } else {
      mysqli_query($conn, $input); // Executing the SQL query
      echo '</br>Data berhasil dimasukkan'; // Success message
    }
  }
}
?>

<hr>
<H3>Data Mahasiswa</H3> <!-- Heading for displaying student data -->
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>NIM</b></td> <!-- Header for NIM column -->
<td align='center' width='30%'><b>Nama</b></td> <!-- Header for Nama column -->
<td align='center' width='10%'><b>Kelas</b></td> <!-- Header for Kelas column -->
<td align='center' width='30%'><b>Alamat</b></td> <!-- Header for Alamat column -->
<td align='center' width='10%'><b>Action</b></td> <!-- Header for Action column -->
</tr>
<?php
$cari = "SELECT * FROM mahasiswa ORDER BY NIM"; // SQL query to retrieve student data
$hasil_cari = mysqli_query($conn, $cari); // Executing the SQL query
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "
  <tr>
  <td width='20%'>$data[0]</td>
  <td width='30%'>$data[1]</td>
  <td width='10%'>$data[2]</td>
  <td width='30%'>$data[3]</td>
  <td width='10%' align='center'>
    <a href='?edit=$data[0]'>Edit</a>
  </td>
  </tr>"; // Displaying retrieved student data with an edit option
}

// Edit data in the database
if (isset($_GET['edit'])) {
  $nim_edit = $_GET['edit']; // Storing NIM of the student to be edited
  $edit_query = "SELECT * FROM mahasiswa WHERE NIM = '$nim_edit'"; // SQL query to retrieve data of the selected student
  $hasil_edit = mysqli_query($conn, $edit_query); // Executing the SQL query
  $row_edit = mysqli_fetch_assoc($hasil_edit); // Fetching the retrieved data
}

if (isset($_POST['submit_edit'])) {
  $nim_edit = $_POST['nim_edit']; // Storing edited NIM
  $nama_edit = $_POST['nama_edit']; // Storing edited Nama
  $kelas_edit = $_POST['kelas_edit']; // Storing edited Kelas
  $alamat_edit = $_POST['alamat_edit']; // Storing edited Alamat

  $update_query = "UPDATE mahasiswa SET Nama = '$nama_edit', Kelas = '$kelas_edit', Alamat = '$alamat_edit' WHERE NIM = '$nim_edit'"; // SQL query to update student data
  mysqli_query($conn, $update_query); // Executing the SQL query to update data
  header("Location: " . $_SERVER['PHP_SELF']); // Redirecting to the same page after updating
  exit;
}
?>

<?php
if (isset($_GET['edit'])) {
  echo '
  <h3>Edit Data Mahasiswa</h3>
  <form method="POST" action="' . $_SERVER['PHP_SELF'] . '">
    <input type="hidden" name="nim_edit" value="' . $row_edit['NIM'] . '">
    <table border="0" width="30%">
      <tr>
        <td width="25%">NIM</td>
        <td width="5%">:</td>
        <td width="65%">' . $row_edit['NIM'] . '</td>
      </tr>
      <tr>
        <td width="25%">Nama</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="nama_edit" value="' . $row_edit['Nama'] . '" size="30" maxlength="50"></td>
      </tr>
      <tr>
        <td width="25%">Kelas</td>
        <td width="5%">:</td>
        <td width="65%">
          <input type="radio" name="kelas_edit" value="A" ' . ($row_edit['Kelas'] == 'A' ? 'checked' : '') . '>A
          <input type="radio" name="kelas_edit" value="B" ' . ($row_edit['Kelas'] == 'B' ? 'checked' : '') . '>B
          <input type="radio" name="kelas_edit" value="C" ' . ($row_edit['Kelas'] == 'C' ? 'checked' : '') . '>C
        </td>
      </tr>
      <tr>
        <td width="25%">Alamat</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="alamat_edit" value="' . $row_edit['Alamat'] . '" size="40" maxlength="50"></td>
      </tr>
    </table>
    <input type="submit" name="submit_edit" value="Update">
  </form>
  '; // Form for editing student data
}
?>
</table>
</center>
</body>
</html>
