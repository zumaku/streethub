<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' ){
        $idActive = $_SESSION['idActive'];
    }

    if( isset($_GET['search']) && $_GET['search'] != '' ){
        $streeters = searchStreeters($_GET['search']);
        $images = searchGallery($_GET['search']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../css/search.css">
</head>
<body>
    
    <!-- =============== NAVBAR START =============== -->
    <?php include '../partials/navbar.php' ?>
    <!-- =============== NAVBAR END =============== -->


    <!-- Streeters -->
    <div class="streeters">
        <div class="container">
            <h1><span>Streeters: </span>'<?= $_GET['search'] ?>'</h1>
            <div class="profiles">
                <?php
                    foreach($streeters as $profile) :
                    $pic = takeProfile($profile['id_user']);
                ?>
                <div class="profile">
                    <div class="image" style="background-image: url(../img/account/profile/<?=$pic['foto_profile']?>);"></div>
                    <h3><?= $profile['username'] ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- PHOTOS -->
    <div class="ygDicari">
        <div class="container">
            <h1><span>Stok: </span>'<?= $_GET['search'] ?>'</h1>
            <div class="galeri">
                <?php
                    foreach($images as $img) :
                    $uname = takeAccount($img['id_user']);
                    $pic = takeProfile($img['id_user']);
                ?>
                <div class="gambar">
                    <img src="../img/gallery/<?= $img['foto_galery'] ?>" alt="" class="imgGallery search" data-idUser="<?= $img['id_user'] ?>" data-name="<?= $uname['username'] ?>" data-picture="<?= $pic['foto_profile'] ?>" data-tglUpload="<?= $img['tgl_upload'] = date('d/m/y') ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="preViewImgGallery" style="display: none;">
        <div class="container">
            <img src="" alt="Photos">
            <a href="#" class="uploader">
                <div class="profilePic" style="background-image: url(../img/account/profile/);"></div>
                <h2></h2>
            </a>
            <p id="tglUpload"></p>
            <form action="" method="post" class="action">
                <input type="text" name="idImageGallery" id="inputId" hidden>
                <input type="text" name="imgGalleryName" id="inputImgName" hidden>
                <a href="#" class="btn unduh" title="Photos" download><p>Unduh</p> <div class="icon iconUnduh"></div></a>
            </form>
            <div class="close"><div class="icon"></div></div>
        </div>
    </div>

    <!-- =============== FOOTER START =============== -->
    <?php //include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->

    <script src="../js/navbar.js"></script>
    <script src="../js/imgPreview.js"></script>
</body>
</html>