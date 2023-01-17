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
        if( $_GET['upload'] != 'gallery' || $_GET['upload'] != 'megazine' ){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "' . $urlToRoot . '";
                    }, 2000)
                </script>
            ';
        }
    }


    function formUploadGallery(){
        echo'<div class="leftSect" style="background-image: url(../img/upload/upGallery.jpg);"></div>';
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

    function formUploadMegazine(){
        echo'<div class="leftSect" style="background-image: url(../img/upload/upMegazine.jpg);"></div>';
        echo'<form  action="" method="post" enctype="multipart/form-data" class="rightSect">';
            echo'<h1>Bingkai <span>baru</span>..</h1>';
            echo'<div class="previewImg">';
                echo'<div type="button" class="iconImg" id="iconBtn"></div>';
                echo'<img id="preImage" alt="" hidden>';
            echo'</div>';
            echo'<h3 for="upGallery">Foto</h3>';

            echo'<input type="file" name="upMegazine" id="upInput">';
            echo'<h3 for="upTag">Jalan</h3>';
            echo'<input type="text" name="namaJalan" id="namaJalan">';

            echo'<div class="buttons">';
                echo'<button type="submit" name="submitMegazine" class="btn">Unggah</button>';
                echo'<a href="megazine.php" class="btn danger">Batal</a>';
            echo'</div>';
        echo'</form>';
    }


    $idActive = $_SESSION['idActive'];

    if( isset($_POST['submitGallery']) ){
        $namaFoto = storePhoto($_FILES['upGallery'], '../img/gallery');
        $tags = $_POST['upTags'];

        if( uploadImageGallery($tags, $namaFoto, $idActive) > 0 ){
            alert(true, false, 'Berhasil!', 'Foto telah diunggah ke galeri. Ingin tambah foto lagi?', 'Ya', 'Tidak');
        }
    }

    if( isset($_POST['submitMegazine']) ){
        $namaFoto = storePhoto($_FILES['upMegazine'], '../img/megazine');
        $namaJalan = $_POST['namaJalan'];

        if( uploadImageMegazine($namaJalan, $namaFoto, $idActive) > 0 ){
            alert(true, false, 'Berhasil!', 'Foto telah diunggah ke galeri. Ingin tambah foto lagi?', 'Ya', 'Tidak');
        }
    }
    


    if( $_GET['upload'] == 'gallery' ){
        hasilAlert('uploadImageGallery');
    } else if( $_GET['upload'] == 'megazine' ){
        hasilAlert('uploadImageMegazine');
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
        } else if( $_GET['upload'] == 'megazine' ){
            formUploadMegazine();
        }
        
    ?>


    <script src="../js/uploadImage.js"></script>
    <script src="../js/navbar.js"></script>
</body>
</html>