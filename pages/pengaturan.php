<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    if( isset($_SESSION['idActive']) ){
        $idActive = $_SESSION['idActive'];
    } else{
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "..";
                }, 3000);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="stylesheet" href="../css/pengaturan.css">
</head>
<body>

    <?php include '../partials/navbar.php' ?>

    <form action="" method="post" class="container">
        <div class="sampul" style="background-image: url(../img/account/cover/<?= $profile['foto_sampul'] ?>);"></div>
        <div class="setting">
            <div class="leftSect">
                <div class="profilePic">
                    <img src="../img/account/profile/<?= $profile['foto_profile'] ?>" alt="" id="profilePicture">
                </div>
                <label for="profilePic">Foto profile</label>
                <input type="file" id="profilePic" name="newProfilePicture">
                <label for="profileSampul">Foto sampul</label>
                <input type="file" id="profileSampul" name="newProfileCover">
                <label for="username">Username</label>
                <input type="text" id="username" name="newUSerName" value="<?= $account['username'] ?>">
                <label for="motivationQuote">Kalimat penyemangat</label>
                <textarea type="text" id="motivationQuote" name="newMotivationQuote"><?= $profile['kalimat_motivasi'] ?></textarea>
                <label for="email">Email</label>
                <input type="email" id="email" name="newEmail" value="<?= $account['email'] ?>">
                <label for="password">Password</label>
                <input type="text" id="password" name="newPassword" value="<?= $account['password'] ?>">
                <a href="#" class="hapusAkun">Hapus akun?</a>
            </div>
            <div class="rightSect">
                <div class="upper">
                    <div class="upperLeft">
                        <div class="aboutPic">
                            <img src="../img/account/about/<?= $profile['foto_tentangku'] ?>" alt="" id="aboutPicture">
                        </div>
                        <label for="profileAbout">Foto tentangmu</label>
                        <input type="file" id="profileAbout" name="newAboutPicture">
                    </div>
                    <div class="upperRight">
                        <label for="yourStory">Ceritakan dirimu</label>
                        <textarea type="text" id="yourStory" name="newAboutMe"><?= $profile['tentangku'] ?></textarea>
                        <div class="sosmedAndTool">
                            <div class="inSAT inSAT1">
                                <div class="icon camera"></div>
                                <input type="text" name="newCamera" value="<?= $tools['camera'] ?>">
                            </div>
                            <div class="inSAT inSAT2">
                                <div class="icon lensa"></div>
                                <input type="text" name="newLensa" value="<?= $tools['lensa'] ?>">
                            </div>
                            <div class="inSAT inSAT3">
                                <div class="icon filter"></div>
                                <input type="text" name="newFilter" value="<?= $tools['filter'] ?>">
                            </div>
                            <div class="inSAT inSAT4">
                                <div class="icon tripod"></div>
                                <input type="text" name="newTripod" value="<?= $tools['tripod'] ?>">
                            </div>
                            <div class="inSAT inSAT5">
                                <div class="icon fb"></div>
                                <input type="text" name="newFb" value="<?= $medsos['facebook'] ?>">
                            </div>
                            <div class="inSAT inSAT6">
                                <div class="icon ig"></div>
                                <input type="text" name="newIg" value="<?= $medsos['instagram'] ?>">
                            </div>
                            <div class="inSAT inSAT7">
                                <div class="icon tw"></div>
                                <input type="text" name="newTw" value="<?= $medsos['twiter'] ?>">
                            </div>
                            <div class="inSAT inSAT8">
                                <div class="icon web"></div>
                                <input type="text" name="newWeb" value="<?= $medsos['website'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lower">
                    <div class="morePic morePic1">
                        <img src="../img/account/favorite/<?= $profile['foto_tempat_favorit'] ?>" alt="">
                        <label for="favorit">Favorit</label>
                        <input type="file" id="favorit" name="newFavorit">
                    </div>
                    <div class="morePic morePic2">
                        <img src="../img/account/kece/<?= $profile['foto_kece1'] ?>" alt="">
                        <label for="kece1">Kece 1</label>
                        <input type="file" id="kece1" name="newKece1">
                    </div>
                    <div class="morePic morePic3">
                        <img src="../img/account/kece/<?= $profile['foto_kece2'] ?>" alt="">
                        <label for="kece2">Kece 2</label>
                        <input type="file" id="kece2" name="newKece2">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn">Simpan</button>
                    <a href="#" class="btn">Batal</a>
                </div>
            </div>
        </div>
    </form>

    <?php include '../partials/footer.php' ?>


    <script src="../js/navbar.js"></script>
</body>
</html>