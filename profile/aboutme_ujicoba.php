<?php
session_start();
include '../function/function.php';


echo $_SESSION['idActive'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Aku</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <!-- =============== NAVBAR START =============== -->
    <?php include '../partials/navbar.php' ?>8
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
        navProfile(false, false, true);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== SIAPA AKU START =============== -->
    <div class="siapaAku">
        <div class="container">
            <div class="fotoku">
                <img src="../img/profile/fotoku.jpg" alt="">
            </div>
            <div class="tentangku">
                <h1>Siapa <span>Aku</span>?</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem corporis, facilis neque culpa ducimus vel laborum sunt beatae provident temporibus totam quibusdam laboriosam delectus ipsam eius debitis harum quas modi?</p>
                <div class="btnArrow">
                    <p>Traktir aku</p>
                    <div class="arrow"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- =============== SIAPA AKU END =============== -->

    <!-- =============== ALAT START =============== -->
    <div class="alat" style="background-image: url(../img/profile/alat.jpg);">
        <div class="container">
            <h1>Dengan apa aku <span>Memotret</span>?</h1>
            <div class="alatku">
                <div class="card">
                    <div class="icon kamera"></div>
                    <h2>Kamera</h2>
                    <p>Canon EOS 6D II</p>
                    <!-- <ol type="1">
                        <li>Canon EOS 6D II</li>
                        <li>Canon EOS 90D</li>
                        <li>Canon EOS 2000D</li>
                        <li>Canon EOS A Plu++</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon lensa"></div>
                    <h2>Lensa</h2>
                    <p>Canon EF 100-400mm f/4.5-6.5L IS II USM</p>
                    <!-- <ol type="1">
                        <li>Canon EF 100-400mm f/4.5-6.5L IS II USM</li>
                        <li>Canon EF 100mm f/2.8L IS USM Macro</li>
                        <li>Canon EF 50mm f/1.8 STM</li>
                        <li>Nikon NIKON AF-P DX 70-200mm f/4.5-6.3G ED VR</li>
                        <li>Nikon NIKON AF-P DX 70-200mm f/4.5-6.3G ED VD</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon filter"></div>
                    <h2>Filter</h2>
                    <p>Ultra Violet</p>
                    <!-- <ol type="1">
                        <li>Ultra Violet</li>
                        <li>Ultra Viola</li>
                        <li>Ultra Vanila</li>
                        <li>Ultra Men</li>
                        <li>Ultra Women</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon tripod"></div>
                    <h2>Tripod</h2>
                    <p>Befree 3-Way Live Advanced</p>
                    <!-- <ol type="1">
                        <li>Befree 3-Way Live Advanced</li>
                        <li>Vesta FB 204AB</li>
                        <li>GorillaPod 1K Kit</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </div>
    <!-- =============== ALAT END =============== -->

    <!-- =============== CONTACT START =============== -->
    <div class="contact">
        <div class="container">
            <div class="favImage">
                <div class="img" style="background-image: url(../img/profile/contact1.jpg);"></div>
                <div class="img" style="background-image: url(../img/profile/contact2.jpg);"></div>
            </div>
            <form action="">
                <h1>Hubungi <span>aku</span>?</h1>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="telp">Telp</label>
                <input type="number" name="telp" id="telp">
                <label for="pesan">Pesan</label>
                <textarea name="pesan" id="pesan"></textarea>
                <button type="submit" class="btn">Kirim</button>
            </form>
        </div>
    </div>
    <!-- =============== CONTACT END =============== -->

    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <script src="../js/navbar.js"></script>
</body>
</html>