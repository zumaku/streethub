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
    } else{
        echo'
            <script>
                window.location.href = "../";
            </script>
        ';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Sales Website and Stock Photos">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Zul Fadli Ahmad">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon/streetHub.png" type="image/x-icon">
    <title>Pencarian</title>
    <link rel="stylesheet" href="../css/search.css">
    <!-- animation scrolling -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    if( empty($streeters) ){
                        echo'<p>Tidak ada streeters ditemukan.</p>';
                    }

                    foreach($streeters as $profile) :
                    $pic = takeProfile($profile['id_user']);
                    if( isset($_SESSION['idActive']) && $pic['id_user'] == $idActive){
                        $href = '../profile/';
                    } else{
                        $href = '../profile/?idActive='.$pic['id_user'];
                    }
                ?>
                <a href="<?= $href ?>" class="profile">
                    <div class="image" style="background-image: url(../img/account/profile/<?=$pic['foto_profile']?>);" data-aos="flip-left"></div>
                    <h3 data-aos="fade-up"><?= $profile['username'] ?></h3>
                </a>
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
                    if( empty($images) ){
                        echo'<p>Tidak ada foto ditemukan.</p>';
                    }

                    foreach($images as $img) :
                    $uname = takeAccount($img['id_user']);
                    $pic = takeProfile($img['id_user']);
                ?>
                <div class="gambar" data-aos="fade-up">
                    <img src="../img/gallery/<?= $img['foto_galery'] ?>" alt="" class="imgGallery search" data-idUser="<?= $img['id_user'] ?>" data-name="<?= $uname['username'] ?>" data-picture="<?= $pic['foto_profile'] ?>" data-tglUpload="<?= $img['tgl_upload'] ?>">
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
                <input type="text" spellcheck="false" name="idImageGallery" id="inputId" hidden>
                <input type="text" spellcheck="false" name="imgGalleryName" id="inputImgName" hidden>
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

    <!-- scroll animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>