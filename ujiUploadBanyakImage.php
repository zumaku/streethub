<?php
    include 'function/function.php';

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

    <?php

        $id_gallery = mysqli_query($koneksi, "SELECT foto_galery FROM $tblGalery WHERE id_user = '34'");
        $bnykBaris = [];
        while ( $baris = mysqli_fetch_assoc($id_gallery) ){
            $bnykBaris[] = $baris;
        }
        var_dump($bnykBaris);
        
        echo'<br><br>';
        
        $randomNo = array_rand($bnykBaris);
        var_dump($randomNo);
        
        echo'<br><br>';
        
        var_dump($bnykBaris[$randomNo]);
        echo'<br><br>';
        echo $bnykBaris[$randomNo]['foto_galery'];
        
        echo'<br><br>';
        echo'<br><br>';



        // SELECT nama_jalan FROM `magazine` WHERE DAY(tangal_upload) >= DAY(CURRENT_DATE);
        // SELECT nama_jalan FROM `magazine` WHERE DAY(tangal_upload) >= DAY(CURRENT_DATE) - 7 AND nama_jalan = 'Jl. Kita Masih Panjang';
        // SELECT DISTINCT nama_jalan, tanggal_upload FROM `magazine` WHERE DAY(tangal_upload) >= DAY(CURRENT_DATE) - 7;        // untuk menghilangkan duplikasi

        // SELECT id_galery, foto_galery FROM galery WHERE id_galery = (SELECT MAX(id_galery) FROM galery WHERE id_user = '34');
    ?>

</body>
</html>