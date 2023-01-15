<?php
    session_start();
    include '../function/function.php';
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
        heroProfile('url(../img/profile/sampul01.jpg)', '../img/profile/profile1.png" alt="Profileku', 'Ukhhtie Kebo', '#', '#', '#', '#')
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
        setBookmark('url(../img/profile/bm01.jpg)', 'Foto Terbaru', 'url(../img/icon/fotoTerbaru.png)', false);
    ?>
    <div class="fotoTerbaru">
        <div class="container">
            <?php include '../partials/cardTerbaru.php' ?>
            <?= setCardTerbaru('#', 'url(../img/profile/00.jpg)', 'Jl. In Aja Dulu', '1 Januari 2023'); ?>
            <?= setCardTerbaru('#', 'url(../img/profile/01.jpg)', 'Jl. Kita Masih Panjang', '31 Desember 2022'); ?>
            <?= setCardTerbaru('#', 'url(../img/profile/02.jpg)', 'Jl. Yuk', '31 Desember 2022'); ?>
            <?= setCardTerbaru('#', 'url(../img/profile/03.jpg)', 'Jl. Kemana Aja', '30 Desember 2022'); ?>
        </div>
    </div>
    <!-- =============== FOTO TERBARU END =============== -->
    
    <!-- =============== FOTO LAWAS START =============== -->
    <?php
        setBookmark('url(../img/profile/bm02.jpg)', 'Foto Lawas', 'url(../img/icon/fotoLawas.png)', false);
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