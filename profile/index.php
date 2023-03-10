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

    if( isset($_GET['setting']) && $_GET['setting'] == 1 ){
        alert(true, true, 'Selesai.', 'Pengaturan telah disimpan');
        echo' <script>
                setTimeout(() => {
                    window.location.href = "' . $urlToRoot . 'profile/";
                }, 2000);
            </script>
        ';
    }

    $account = takeAccount($idActive);
    $profile = takeProfile($idActive);
    $medsos = takeMedsos($idActive);
    $tools = takeTools($idActive);

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
    <title>Tentang Aku</title>
    <link rel="stylesheet" href="../css/profile.css">
    <!-- animation scrolling -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
        navProfile(false, false, true);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== SIAPA AKU START =============== -->
    <div class="siapaAku">
        <div class="container">
            <div class="fotoku">
                <img src="../img/account/about/<?= $profile['foto_tentangku'] ?>" alt="">
            </div>
            <div class="tentangku">
                <h1>Siapa <span>Aku</span>?</h1>
                <p data-aos="fade-right"><?= $profile['tentangku'] ?></p>
                <a href="#" class="btnArrow" data-aos="fade-up">
                    <p>Traktir aku</p>
                    <div class="arrow"></div>
                </a>
            </div>
        </div>
    </div>
    <!-- =============== SIAPA AKU END =============== -->

    <!-- =============== ALAT START =============== -->
    <div class="alat" style="background-image: url(../img/account/favorite/<?= $profile['foto_tempat_favorit'] ?>);">
        <div class="container">
            <h1>Dengan apa aku <span>Memotret</span>?</h1>
            <div class="alatku">
                <div class="card">
                    <div class="icon kamera" data-aos="zoom-out-down"></div>
                    <h2 data-aos="fade-right">Kamera</h2>
                    <p data-aos="fade-up"><?= $tools['camera'] ?></p>
                    <!-- <ol type="1">
                        <li>Canon EOS 6D II</li>
                        <li>Canon EOS 90D</li>
                        <li>Canon EOS 2000D</li>
                        <li>Canon EOS A Plu++</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon lensa" data-aos="zoom-out-down"></div>
                    <h2 data-aos="fade-right">Lensa</h2>
                    <p data-aos="fade-up"><?= $tools['lensa'] ?></p>
                    <!-- <ol type="1">
                        <li>Canon EF 100-400mm f/4.5-6.5L IS II USM</li>
                        <li>Canon EF 100mm f/2.8L IS USM Macro</li>
                        <li>Canon EF 50mm f/1.8 STM</li>
                        <li>Nikon NIKON AF-P DX 70-200mm f/4.5-6.3G ED VR</li>
                        <li>Nikon NIKON AF-P DX 70-200mm f/4.5-6.3G ED VD</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon filter" data-aos="zoom-out-down"></div>
                    <h2 data-aos="fade-right">Filter</h2>
                    <p data-aos="fade-up"><?= $tools['filter'] ?></p>
                    <!-- <ol type="1">
                        <li>Ultra Violet</li>
                        <li>Ultra Viola</li>
                        <li>Ultra Vanila</li>
                        <li>Ultra Men</li>
                        <li>Ultra Women</li>
                    </ol> -->
                </div>
                <div class="card">
                    <div class="icon tripod" data-aos="zoom-out-down"></div>
                    <h2 data-aos="fade-right">Tripod</h2>
                    <p data-aos="fade-up"><?= $tools['tripod'] ?></p>
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
                <div data-aos="fade-up" class="img" style="background-image: url(../img/account/kece/<?= $profile['foto_kece1'] ?>);"></div>
                <div data-aos="fade-up" class="img" style="background-image: url(../img/account/kece/<?= $profile['foto_kece2'] ?>);"></div>
            </div>
            <form action="">
                <h1>Hubungi <span>aku</span>?</h1>
                <label data-aos="fade-right" for="nama">Nama</label>
                <input data-aos="fade-up" type="text" spellcheck="false" name="nama" id="nama">
                <label data-aos="fade-right" for="email">Email</label>
                <input data-aos="fade-up" type="email" name="email" id="email">
                <label data-aos="fade-right" for="telp">Telp</label>
                <input data-aos="fade-up" type="number" name="telp" id="telp">
                <label data-aos="fade-right" for="pesan">Pesan</label>
                <textarea data-aos="fade-up" spellcheck="false" name="pesan" id="pesan"></textarea>
                <button data-aos="fade-up" type="submit" class="btn">Kirim</button>
            </form>
        </div>
    </div>
    <!-- =============== CONTACT END =============== -->

    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <script src="../js/navbar.js"></script>

    <!-- scroll animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>