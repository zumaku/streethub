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
    if( $_GET['upload'] != 'gallery' ){
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "' . $urlToRoot . '/profile/gallery_ujicoba.php";
                }, 2000)
            </script>
        ';
    }

    $idActive = $_SESSION['idActive'];

    if( isset($_POST['submitGallery']) ){
        $namaFoto = storePhoto($_FILES['upGallery'], '../img/gallery');
        $tags = $_POST['upTags'];

        if( uploadImageGallery($tags, $namaFoto, $idActive) > 0 ){
            alert(true, false, 'Berhasil!', 'Foto telah diunggah ke galeri. Ingin tambah foto lagi?', 'Ya', 'Tidak');
        }
    }
    
    if( $_GET['upload'] == 'gallery' ){
        hasilAlert('uploadImageGallery');
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

    <?php include'../partials/navbar.php' ?>

    <div class="leftSect" style="background-image: url(../img/profile/contact2.jpg);"></div>
    <form  action="" method="post" enctype="multipart/form-data" class="rightSect">
        <h1>Galeri <span>baru</span>..</h1>
        <div class="previewImg">
            <div type="button" class="iconImg" id="iconBtn"></div>
            <img id="preImage" alt="" hidden>
        </div>
        <h3 for="upGallery">Foto</h3>

        <input type="file" name="upGallery" id="upGallery">
        <h3 for="upTag">Tag</h3>
        <p>*gunakan spasi sebagai pemisah tag</p>
        <textarea name="upTags" id="upTag" cols="30" rows="10"></textarea>

        <div class="buttons">
            <button type="submit" name="submitGallery" class="btn">Unggah</button>
            <a href="' . $urlToRoot . '/profile/gallery.php" class="btn danger">Batal</a>
        </div>
    </form>

    <script src="../js/uploadImage.js"></script>
    <script src="../js/navbar.js"></script>
</body>
</html>