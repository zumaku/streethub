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
} else if( isset($_POST['delete']) ){
    unlink('img/63c7dc015c2716.86336175.jpg');
}

    if( isset($_POST['uji']) ){
        if( $_FILES['foto']['name'] != "" ){
            echo'adaji';
            // var_dump($_FILES['foto']);
        }else{
            echo'ndak ada';
        }
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
        <button type="submit" name="delete">Delete</button>
    </form>

    <img src="www.pexels.com/photo/photo-of-man-holding-a-camera-1567730/" alt="asidbas">

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="foto">
        <button type="submit" name="uji">uji</button>
    </form>
</body>
</html>