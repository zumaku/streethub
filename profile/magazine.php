<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    $idActive = $_SESSION['idActive'];

    $account = takeAccount($idActive);
    $profile = takeProfile($idActive);
    $medsos = takeMedsos($idActive);

    $bookmarImage1 = randomBookmarCover($idActive);
    $bookmarImage2 = randomBookmarCover($idActive);

    $infos = takeInfoMagazineTerbaru($idActive);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        navProfile(true, false, false);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== FOTO TERBARU START =============== -->
    <?php
        include '../partials/bookmark.php';
        setBookmark('url(../img/gallery/' . $bookmarImage1 . ')', 'Foto Terbaru', 'url(../img/icon/fotoTerbaru.png)', false);
    ?>
    <div class="fotoTerbaru">
        <?php
        if( isset($_SESSION['idActive']) ){
            echo'<div class="tambahFoto">';
                echo'<h4 class="btn"><a href="../pages/uploadImage.php?upload=magazine">Tambah Bingkai</a></h4>';
            echo'</div>';
        }
        ?>
        <div class="container">
            <?php
            include '../partials/cardTerbaru.php';

            foreach($infos as $data){
                $img = takeImageMagazineTerbaru($idActive, $data['nama_jalan']);
                // var_dump($img);
                setCardTerbaru('#', 'url(../img/magazine/' . $img . ')', $data['nama_jalan'], $data['tangal_upload']);
            }
            
            ?>
        </div>
    </div>
    <!-- =============== FOTO TERBARU END =============== -->
    
    <!-- =============== FOTO LAWAS START =============== -->
    <?php
        setBookmark('url(../img/gallery/' . $bookmarImage2 . ')', 'Foto Lawas', 'url(../img/icon/fotoLawas.png)', false);
    ?>
    <div class="fotoLawas">
        <div class="container">
            <?php include '../partials/cardLawas.php' ?>
            <?= setCardLawas('#', 'url(../img/profile/10.jpg)', 'Jl. In Aja Dulu') ?>
            <?= setCardLawas('#', 'url(../img/profile/11.jpg)', 'Jl. Yuk') ?>
            <?= setCardLawas('#', 'url(../img/profile/12.jpg)', 'Jl. Entah Dimana') ?>
            <?= setCardLawas('#', 'url(../img/profile/13.jpg)', 'Jl. Kemana Aja') ?>
            <?= setCardLawas('#', 'url(../img/profile/14.jpg)', 'Jl. Kaki') ?>
            <?= setCardLawas('#', 'url(../img/profile/15.jpg)', 'Jl. Kita Masih Panjang') ?>
        </div>
    </div>
    <!-- =============== FOTO LAWAS END =============== -->

    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->

    <script src="../js/navbar.js"></script>
</body>
</html>