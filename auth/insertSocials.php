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
        'social\ \(1\).jpg',
        'social\ \(2\).jpg',
        'social\ \(3\).jpg',
        'social\ \(4\).jpg',
        'social\ \(5\).jpg',
        'social\ \(6\).jpg',
        'social\ \(7\).jpg',
        'social\ \(8\).jpg'
    ];

    $randIndex = array_rand($socialPhoto);

    if(isset($_POST['lanjut'])){

        if( insertProfile02($_POST) > 0 ){
            echo' <script> alert("Upload data Berhasil!!! Lanjut ketahap selanjutnya"); window.location.href = "insertTools.php"; </script> ';
        } else{
            echo' <script> alert("Upload data Gagal!!!"); window.location.href = "insertSocials.php"; </script> ';
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
        <form action="" method="post" class="signForm coplateAccount">
            <h3>LENGKAPI PROFILMU</h3>
            
            <div class="step">
                <p>step 3/4</p>
                <p>Mari lebih akrab di sosial media</p>
                <input type="text" name="id_user" value="<?= $id ?>" hidden>
                <label for="fb">FACEBOOK <p>*boleh kosong</p></label>
                <input type="text" name="fb">
                <label for="ig">INSTAGRAM <p>*boleh kosong</p></label>
                <input type="text" name="ig">
                <label for="tw">TWITER <p>*boleh kosong</p></label>
                <input type="text" name="tw">
                <label for="web">WEBSITE <p>*boleh kosong</p></label>
                <input type="text" name="web"><br>
                <button type="submit" name="lanjut" class="btn">Lanjut</button>
            </div>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/resource/<?= $socialPhoto[$randIndex] ?>);"></div>
    <!-- <div class="sectionRight" style="background-image: url(../img/resource/social\ \(1\).jpg);"></div> -->

</body>
</html>