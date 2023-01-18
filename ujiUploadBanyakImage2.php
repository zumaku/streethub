<?php
    include 'function/function.php';


if( isset($_POST['upload']) ){

    $fotos = $_FILES['images'];
    var_dump(count($fotos['name']));
    $namaFotos = storeMultiplePhoto($_FILES['images'], 'img');
    var_dump($namaFotos);

    // if( uploadImageMagazine($namaJalan, $namaFoto, $idActive) > 0 ){
    //     alert(true, false, 'Berhasil!', 'Foto telah diunggah ke galeri. Ingin tambah foto lagi?', 'Ya', 'Tidak');
    // }




}








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image Banyak</title>
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple><br>
        <button type="submit" name="upload">Upload</button>
    </form>

</body>
</html>