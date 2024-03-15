<html>
<head>
    <title>Upload File</title>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$direktori = 'images/';
$nama_foto = $_FILES['foto']['name'];
$size_foto = $_FILES['foto']['size'];
$tipe_foto = $_FILES['foto']['type'];
$upload = $direktori . $nama_foto;
$submit = $_POST['submit'];
if($submit){
    move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
    echo "<H3>File Berhasil di Upload</H3></br></br>";
    echo "<img border='0' src='$upload'></br></br>";
    echo "<b>Informasi File :</b></br>";
    echo "Nama File : $nama_foto</br>";
    echo "Ukuran File : $size_foto byte </br>";
    echo "Tipe File : $tipe_foto </br>";
}else{
?>
<form method='POST' enctype='multipart/form-data' action="upload.php">
    Upload file : <input type='file' name='foto' size='20'></br>
    <input type='submit' name='submit' value='UPLOAD'>
</form>
<?php
}
?>
</body>
</html>
