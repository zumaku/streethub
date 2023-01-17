<?php
    session_start();
    include '../function/function.php';

    $idActive = $_SESSION['idActive'];

    $account = takeAccount($idActive);
    $profile = takeProfile($idActive);
    $medsos = takeMedsos($idActive);

    $images = takeImageGallery($idActive);
    // var_dump($images);



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
        navProfile(false, true, false);
    ?>
    <!-- =============== NAV PROFILE END =============== -->

    <!-- =============== GALERI START =============== -->
    <div class="galeri">
        <?php
        if( isset($_SESSION['idActive']) ){
            echo'<div class="tambahFoto">';
                echo'<h4 class="btn"><a href="uploadImage.php?upload=gallery">Tambah Foto</a></h4>';
            echo'</div>';
        }
        ?>
        <div class="container">
            <?php foreach($images as $img) : ?>
            <div class="gambar">
                <img src="../img/gallery/<?= $img['foto_galery'] ?>" alt="">
                <div class="aksi">
                    <?php
                    if( isset($_SESSION['idActive']) ){
                        echo'<form action"" method="post" class="tambahFoto">';
                            echo'<button type="submit" name="hapus" class="iconAksi iconDelete" title="Hapus"></button>';
                            echo'<button type="submit" name="edit" class="iconAksi iconEdit" title="Edit"></button>';
                        echo'</form>';
                    } else{
                        echo '<a href="../img/profile/galeri/00.jpg" download title="Unduh"><div class="iconDownload"></div></a>';
                    }
                    ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- =============== GALERI END =============== -->


    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <script src="../js/navbar.js"></script>
</body>
</html>