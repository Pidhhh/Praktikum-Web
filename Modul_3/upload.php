<html>
<head>
    <title>Upload File</title>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$direktori = 'images/';
$nama_foto = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';
$size_foto = isset($_FILES['foto']['size']) ? $_FILES['foto']['size'] : '';
$tipe_foto = isset($_FILES['foto']['type']) ? $_FILES['foto']['type'] : '';
$upload = $direktori . $nama_foto;
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if($submit){
    // Fixing the condition to check if the file is uploaded
    if (!is_dir($direktori)) {
        mkdir($direktori, 0777, true);
    }
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
