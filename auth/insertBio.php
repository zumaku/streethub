<?php
    session_start();
    include '../function/function.php';
    include '../function/loginFunction.php';

    if( isset($_SESSION['idActive']) ){
        echo'
            <script>
                window.location.href = "../";
                setTimeout(()=>{
                    alert("Woi.. Anda telah login");
                }, 1000);
            </script>
        ';
    }

    $id = $_SESSION['idNewUser'][0];

    if( !isset($_SESSION['idNewUser']) ){
        echo' <script> window.location.href = "./"; </script> ';
    }

    $socialPhoto = [
        'profile\ \(1\).jpg',
        'profile\ \(2\).jpg',
        'profile\ \(3\).jpg',
        'profile\ \(4\).jpg',
        'profile\ \(5\).jpg',
        'profile\ \(6\).jpg',
        'profile\ \(7\).jpg',
        'profile\ \(8\).jpg',
        'profile\ \(9\).jpg',
        'profile\ \(10\).jpg',
        'profile\ \(11\).jpg'
    ];
    $randIndex = array_rand($socialPhoto);


    if( isset($_POST['lanjut']) ){

        if( insertProfile01($_POST, $_FILES) > 0 ){
            echo' <script> alert("Upload data Berhasil!!! Lanjut ketahap selanjutnya"); window.location.href = "insertSocials.php"; </script> ';
        } else{
            echo' <script> alert("Upload data Gagal!!!"); window.location.href = "insertBio.php"; </script> ';
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Profilmu</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
    <div class="sectionLeft insertBio" onclick="insertBio()">
        <form action="" method="post" class="signForm coplateAccount" enctype="multipart/form-data">
            <h3>LENGKAPI PROFILMU</h3>
            <div class="step">
                <p>step 1/4</p>
                <input type="text" name="id_user" value="<?= $id ?>" hidden>
                
                <label for="profilePhoto">FOTO PROFIL</label>
                <input type="file" name="profilePhoto" class="imgFileInput">
                <div class="previewImg square">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>
                
                <label for="sampulPhoto">FOTO SAMPUL</label>
                <input type="file" name="sampulPhoto" class="imgFileInput">
                <div class="previewImg sampul">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>

                <label for="motivationQuote">KALIMAT PENYEMANGAT</label>
                <input type="text" name="motivationQuote">

                <label for="yourPhoto">FOTO TENTANGMU</label>
                <input type="file" name="yourPhoto" class="imgFileInput">
                <div class="previewImg tentangku">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>

                <label for="yourSelf">CERITAKAN DIRIMU</label>
                <textarea name="yourSelf" id="" cols="30" rows="10"></textarea>
                <br>
            </div>
            <div class="step">
                <p>step 2/4</p>
                <label for="favPlace">FOTO TEMPAT FAVORITMU</label>
                <input type="file" name="favPlace" class="imgFileInput">
                <div class="previewImg favorite">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>

                <label for="bestPhoto1">DUA FOTO TERKECEMU</label>
                <input type="file" name="bestPhoto1" class="imgFileInput">
                <div class="previewImg kece1">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>
                <input type="file" name="bestPhoto2" class="imgFileInput">
                <div class="previewImg kece2">
                    <div type="button" class="iconImg" id="iconBtn"></div>
                    <img id="preImage" alt="" hidden>
                </div>
                <button type="submit" name="lanjut" class="btn">Lanjut</button>
            </div>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/resource/<?= $socialPhoto[$randIndex] ?>);"></div>

    <script src="../js/login.js"></script>
</body>
</html>