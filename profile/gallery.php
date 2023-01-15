<?php
    session_start();
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
        navProfile(false, true, false);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== GALERI START =============== -->
    <div class="galeri">
        <div class="container">
            <div class="gambar">
                <img src="../img/profile/galeri/00.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/01.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/02.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/03.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/04.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/05.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/06.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/07.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/08.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/09.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/10.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/11.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/12.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/13.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/14.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/15.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/16.jpg" alt="">
            </div>
            <div class="gambar">
                <img src="../img/profile/galeri/17.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- =============== GALERI END =============== -->


    <!-- =============== FOOTER START =============== -->
        <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <script src="../js/navbar.js"></script>
</body>
</html>