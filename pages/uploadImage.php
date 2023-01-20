<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';
    
    if( !isset($_SESSION['idActive']) ){
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "' . $urlToRoot . '";
                }, 2000)
            </script>
        ';
    }
    if( !isset($_GET['upload']) ){
        if( $_GET['upload'] != 'gallery' || $_GET['upload'] != 'magazine' ){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "' . $urlToRoot . '";
                    }, 2000)
                </script>
            ';
        }
    }

    $leftSect = randomGallery();

    function formUploadGallery(){
        global $leftSect;

        echo'<div class="leftSect" style="background-image: url(../img/gallery/' . $leftSect . ');"></div>';
        echo'<form  action="" method="post" enctype="multipart/form-data" class="rightSect">';
            echo'<h1>Galeri <span>baru</span>..</h1>';
            echo'<div class="previewImg">';
                echo'<div type="button" class="iconImg" id="iconBtn"></div>';
                echo'<img id="preImage" alt="" hidden>';
            echo'</div>';
            echo'<h3 for="upGallery">Foto</h3>';

            echo'<input type="file" name="upGallery" id="upInput">';
            echo'<h3 for="upTag">Tag</h3>';
            echo'<p>*gunakan spasi sebagai pemisah tag</p>';
            echo'<textarea name="upTags" id="upTag" cols="30" rows="10"></textarea>';

            echo'<div class="buttons">';
                echo'<button type="submit" name="submitGallery" class="btn">Unggah</button>';
                echo'<a href="../profile/gallery.php" class="btn danger">Batal</a>';
            echo'</div>';
        echo'</form>';
    }

    function formUploadMagazine(){
        global $leftSect;

        echo'<div class="leftSect" style="background-image: url(../img/gallery/' . $leftSect . ');"></div>';
        echo'<form  action="" method="post" enctype="multipart/form-data" class="rightSect">';
            echo'<h1>Bingkai <span>baru</span>..</h1>';
            echo'<div class="previewImg">';
                echo'<div type="button" class="iconImg" id="iconBtn"></div>';
                echo'<img id="preImage" alt="" hidden>';
            echo'</div>';
            echo'<h3 id="h3UpGallery">Foto</h3>';

            echo'<input type="file" name="upMagazine[]" class="inputMagazine" id="upInput" multiple>';
            echo'<h3 for="upTag">Jalan</h3>';
            echo'<input type="text" name="namaJalan" id="namaJalan">';

            echo'<div class="buttons">';
                echo'<button type="submit" name="submitMagazine" class="btn">Unggah</button>';
                echo'<a href="../profile/magazine.php" class="btn danger">Batal</a>';
            echo'</div>';
        echo'</form>';
    }


    $idActive = $_SESSION['idActive'];

    if( isset($_POST['submitGallery']) ){
        $namaFoto = storePhoto($_FILES['upGallery'], '../img/gallery');
        $tags = $_POST['upTags'];

        if($namaFoto == 'Ekstensi file tidak didukung!' || $namaFoto == 'Terdapat error saat upload!' || $namaFoto == 'Ukuran foto terlalu besar!'){
            $pesan = $namaFoto;
            alert(true, false, 'Gagal!', $pesan);
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "uploadImage.php?upload=gallery";
                    }, 2000)
                </script>
            ';
        } else{
            if( uploadImageGallery($tags, $namaFoto, $idActive) > 0 ){
                alert(true, false, 'Berhasil!', 'Foto telah diunggah ke galeri. Ingin tambah foto lagi?', 'Ya', 'Tidak');
            }
        }
    }

    if( isset($_POST['submitMagazine']) ){
        $namaFotos = storeMultiplePhoto($_FILES['upMagazine'], '../img/magazine');
        $namaJalan = $_POST['namaJalan'];
        $bnykFoto = count($_FILES['upMagazine']['name']);
        // var_dump($namaFotos);

        $berhasil = 0;
        $gagal = false;
        for($i=0; $i<$bnykFoto; $i++){
            if($namaFotos[$i] == 'Ekstensi file tidak didukung pada foto ke-' . $i+1 . '!' || $namaFotos[$i] == 'Terdapat error saat upload pada foto ke-' . $i+1 . '!' || $namaFotos[$i] == 'Ukuran foto terlalu besar pada foto ke-' . $i+1 . '!'){
                $pesan = $namaFotos[$i];
                $gagal = $pesan;
                break;
            } else{
                if( uploadImageMagazine($namaJalan, $namaFotos[$i], $idActive) > 0){
                    $berhasil++;
                }
            }
            if( $berhasil == $bnykFoto ){
                alert(true, false, 'Berhasil!', 'Foto telah diunggah ke Bingkai. Ingin tambah foto lagi?', 'Ya', 'Tidak');
            }
        }
        if( $gagal != false ){
            alert(true, false, 'Gagal!', $gagal);
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "uploadImage.php?upload=magazine";
                    }, 2000);
                </script>
            ';
        }
    }
    


    if( $_GET['upload'] == 'gallery' ){
        hasilAlert('uploadImageGallery');
    } else if( $_GET['upload'] == 'magazine' ){
        hasilAlert('uploadImageMagazine');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri baru</title>
    <link rel="stylesheet" href="../css/uploadImage.css">
</head>
<body>

    <?php
        include'../partials/navbar.php';
    
        if( $_GET['upload'] == 'gallery' ){
            formUploadGallery();
        } else if( $_GET['upload'] == 'magazine' ){
            formUploadMagazine();
        }
        
    ?>


    <script src="../js/uploadImage.js"></script>
    <script src="../js/navbar.js"></script>
</body>
</html>