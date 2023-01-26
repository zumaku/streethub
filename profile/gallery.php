<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' && !isset($_GET['idActive']) ){
        $idActive = $_SESSION['idActive'];
    } else if( isset($_GET['idActive']) && $_GET['idActive'] != '' ){
        $idActive = $_GET['idActive'];
    } else{
        echo' <script>
                setTimeout(() => {
                    window.location.href = "' . $urlToRoot . 'profile/gallery.php";
                }, 2000);
            </script>
        ';
    }

    $account = takeAccount($idActive);
    $profile = takeProfile($idActive);
    $medsos = takeMedsos($idActive);

    $images = takeImageGallery($idActive);
    // var_dump($images);

    if( isset($_POST['deleteGallery']) ){
        if( deleteImageGallery($_POST['idImageGallery']) > 0 ){
            alert(true, false, 'Berhasil!', 'Foto berhasil dihapus.');
            unlink( $urlToRoot . 'img/gallery/' . $_POST['imgGalleryName'] );
        } else{
            alert(true, false, 'Gagal!', 'Terdapat error saat penghapusan.');
        }
        echo' <script>
                setTimeout(() => {
                    window.location.href = "' . $urlToRoot . 'profile/gallery.php";
                }, 2000);
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
    <title>Galeri</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <!-- =============== NAVBAR START =============== -->
    <?php include '../partials/navbar.php' ?>
    <!-- =============== NAVBAR END =============== -->

    <!-- =============== HERO START =============== -->
    <?php
        include '../partials/heroProfile.php';
        heroProfile(
            'url(../img/account/cover/' . $profile['foto_sampul'] . ')',
            '../img/account/profile/' . $profile['foto_profile'],
            $account['username'],
            $profile['kalimat_motivasi'],
            $medsos['facebook'],
            $medsos['instagram'],
            $medsos['twiter'],
            $medsos['website']
        );
    ?>
    <!-- =============== HERO END =============== -->

    <!-- =============== NAV PROFILE START =============== -->
    <?php
        include '../partials/navProfile.php';
        navProfile(false, true, false);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== GALERI START =============== -->
    <div class="galeri">
        <?php
        if( isset($_SESSION['idActive']) && !isset($_GET['idActive']) ){
            echo'<div class="tambahFoto">';
                echo'<h4 class="btn"><a href="../pages/uploadImage.php?upload=gallery">Tambah Foto</a></h4>';
            echo'</div>';
        }
        ?>
        <div class="container">
            <?php foreach($images as $img) : ?>
            <div class="gambar">
                <img src="../img/gallery/<?= $img['foto_galery'] ?>" class="imgGallery" data-id="<?= $img['id_galery'] ?>" data-idUser="<?= $img['id_user'] ?>" data-tglUpload="<?= $img['tgl_upload'] ?>" alt="<?= $img['foto_galery'] ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- =============== GALERI END =============== -->

    <div class="preViewImgGallery" style="display: none;">
        <div class="container">
            <img src="" alt="<?= $account['username'] ?> Photos">
            <a href="#" class="uploader">
                <div class="profilePic" style="background-image: url(../img/account/profile/<?= $profile['foto_profile'] ?>);"></div>
                <h2><?= $account['username'] ?></h2>
            </a>
            <p id="tglUpload"></p>
            <form action="" method="post" class="action">
                <?php
                if( isset($_SESSION['idActive']) && !isset($_GET['idActive']) ){
                    echo'
                        <input type="text" spellcheck="false" name="idImageGallery" id="inputId" hidden>
                        <input type="text" spellcheck="false" name="imgGalleryName" id="inputImgName" hidden>
                        <button type="submit" name="deleteGallery" class="btn hapus"><p>Hapus</p> <div class="icon iconHapus"></div></button>
                    ';
                }
                ?>
                <a href="#" class="btn unduh" title="<?= $account['username'] ?> Photos" download><p>Unduh</p> <div class="icon iconUnduh"></div></a>
            </form>
            <div class="close"><div class="icon"></div></div>
        </div>
    </div>

    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <script src="../js/navbar.js"></script>
    <script src="../js/imgPreview.js"></script>


</body>
</html>