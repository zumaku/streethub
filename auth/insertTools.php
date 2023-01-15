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


if(isset($_POST['finish'])){

    if( insertProfile03($_POST) > 0 ){
        session_destroy();
        session_start();
        $_SESSION['idActive'] = $id;
        echo' <script> alert("Upload data Berhasil!!! Profile Selesai"); window.location.href = "../profile/aboutme.php"; </script> ';
        
    } else{
        echo' <script> alert("Upload data Gagal!!!"); window.location.href = "insertTools.php"; </script> ';
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
                <p>step 4/4</p>
                <p>Beritahu kami alat yang kau gunakan</p>
                <input type="text" name="id_user" value="<?= $id ?>">
                <label for="camera">KAMERA</label>
                <input type="text" name="camera">
                <label for="lensa">LENSA</label>
                <input type="text" name="lensa">
                <label for="filter">FILTER</label>
                <input type="text" name="filter">
                <label for="tripod">TRIPOD</label>
                <input type="text" name="tripod">
                <button type="submit" name="finish" class="btn">Lanjut</button>
            </div>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/login/tools.jpg);"></div>

</body>
</html>