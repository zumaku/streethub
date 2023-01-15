<?php
session_start();
include '../function/function.php';
include '../function/loginFunction.php';

$id = $_SESSION['idNewUser'][0];
// var_dump($_SESSION['idNewUser']);

if( !isset($_SESSION['idNewUser']) ){
    echo' <script> window.location.href = "./"; </script> ';
}


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
    
    <div class="sectionLeft">
        <form action="" method="post" class="signForm coplateAccount" enctype="multipart/form-data">
            <h3>LENGKAPI PROFILMU</h3>
            <div class="step">
                <p>step 1/4</p>
                <input type="text" name="id_user" value="<?= $id ?>">
                <label for="profilePhoto">FOTO PROFILMU</label>
                <input type="file" name="profilePhoto">
                <label for="sampulPhoto">FOTO SAMPULMU</label>
                <input type="file" name="sampulPhoto">
                <label for="motivationQuote">KALIMAT PENYEMANGATMU</label>
                <input type="text" name="motivationQuote">
                <label for="yourPhoto">FOTO TENTANGMU</label>
                <input type="file" name="yourPhoto">
                <label for="yourSelf">CERITAKAN DIRIMU</label>
                <textarea name="yourSelf" id="" cols="30" rows="10"></textarea>
                <br>
            </div>
            <div class="step">
                <p>step 2/4</p>
                <label for="favPlace">FOTO TEMPAT FAFORITMU</label>
                <input type="file" name="favPlace">
                <label for="bestPhoto1">DUA FOTO TERKECEMU</label>
                <input type="file" name="bestPhoto1">
                <input type="file" name="bestPhoto2">
                <button type="submit" name="lanjut" class="btn">Lanjut</button>
            </div>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/login/profile.jpg);"></div>

</body>
</html>