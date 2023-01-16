<?php


if( isset($_POST['upload']) ){

    $fotos = $_FILES['image'];
    $teks = $_POST['teks'];
    
    $banyakFoto = count($fotos['name']);
    $banyakTeks = count($fotos['name']);

    $allowEks = ['jpg', 'jpeg', 'png'];
    for($i=0; $i<$banyakFoto; $i++){

        $namaFoto = $fotos['name'][$i];
        $tmpFoto = $fotos['tmp_name'][$i];
        $ukuranFoto = $fotos['size'][$i];
        $errorFoto = $fotos['error'][$i];
        $tipeFoto = $fotos['type'][$i];

        $isiTeks = $teks[$i];

        // echo "$namaFoto   ";
        // echo "$tmpFoto   ";
        // echo "$ukuranFoto   ";
        // echo "$errorFoto   ";
        // echo "$tipeFoto   ";
        echo "$isiTeks   ";
        echo '<br>';

        $pecahEkstensiFoto = explode('.', $namaFoto);
        $ekstensiFoto = strtolower(end($pecahEkstensiFoto));

        if( in_array($ekstensiFoto, $allowEks) ){
            if( $errorFoto === 0 ){
                if( $ukuranFoto < 1000000 ){
    
                    $namaFotoBaru = uniqid('', true) . "." . $ekstensiFoto;
                    $folderTujuanAkhir = 'img/' . $namaFotoBaru;
    
                    move_uploaded_file($tmpFoto, $folderTujuanAkhir);
    
                    // return $namaFotoBaru;
                } else{
                    echo' <script> alert("Ukuran foto lebih besar dari 1mb!!!"); </script> ';
                }
            } else{
                echo' <script> alert("Terdapat Error saat upload!!!"); </script> ';
            }
        } else{
            echo' <script> alert("Ekstensi File Salah!!!"); </script> ';
        }


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
        <input type="text" name="teks[]">
        <input type="file" name="image[]"><br>
        <input type="text" name="teks[]">
        <input type="file" name="image[]"><br>
        <input type="text" name="teks[]">
        <input type="file" name="image[]"><br>
        <button type="submit" name="upload">Upload</button>
    </form>

</body>
</html>