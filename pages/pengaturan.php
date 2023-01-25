<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    if( isset($_SESSION['idActive']) ){
        $idActive = $_SESSION['idActive'];
    } else{
        echo'
            <script>
                window.location.href = "..";
            </script>
        ';
    }

    $account = takeAccount($idActive);
    $profile = takeProfile($idActive);
    $medsos = takeMedsos($idActive);
    $tools = takeTools($idActive);

    if( isset($_POST['update'])){
        // old photos
        $oldProfilePicture = $profile['foto_profile'];
        $oldProfileCover = $profile['foto_sampul'];
        $oldProfileAbout = $profile['foto_tentangku'];
        $oldFavorite = $profile['foto_tempat_favorit'];
        $oldKece1 = $profile['foto_kece1'];
        $oldKece2 = $profile['foto_kece2'];

        // new photos
        if( $_FILES['newProfilePicture']['name'] != "" ){
            $newProfilePicture = storePhoto($_FILES['newProfilePicture'], '../img/account/profile');
            unlink( '../img/account/profile/' . $oldProfilePicture );
        } else{ $newProfilePicture = $oldProfilePicture; }
        if( $_FILES['newProfileCover']['name'] != "" ){
            $newProfileCover = storePhoto($_FILES['newProfileCover'], '../img/account/cover');
            unlink( '../img/account/cover/' . $oldProfileCover );
        } else{ $newProfileCover = $oldProfileCover; }
        if( $_FILES['newAboutPicture']['name'] != "" ){
            $newProfileAbout = storePhoto($_FILES['newAboutPicture'], '../img/account/about');
            unlink( '../img/account/about/' . $oldProfileAbout );
        } else{ $newProfileAbout = $oldProfileAbout; }
        if( $_FILES['newFavorit']['name'] != "" ){
            $newFavorite = storePhoto($_FILES['newFavorit'], '../img/account/favorite');
            unlink( '../img/account/favorite/' . $oldFavorite );
        } else{ $newFavorite = $oldFavorite; }
        if( $_FILES['newKece1']['name'] != "" ){
            $newKece1 = storePhoto($_FILES['newKece1'], '../img/account/kece');
            unlink( '../img/account/kece/' . $oldKece1 );
        } else{ $newKece1 = $oldKece1; }
        if( $_FILES['newKece2']['name'] != "" ){
            $newKece2 = storePhoto($_FILES['newKece2'], '../img/account/kece');
            unlink( '../img/account/kece/' . $oldKece2 );
        } else{ $newKece2 = $oldKece2; }

        $account = updateAccount($idActive, $_POST['newUSerName'], $_POST['newEmail']);
        $profile = updateProfile($idActive, $newProfilePicture, $newProfileCover, $_POST['newMotivationQuote'], $newProfileAbout, $_POST['newAboutMe'], $newFavorite, $newKece1, $newKece2);
        $medsos = updateMedsos($idActive, $_POST['newFb'], $_POST['newIg'], $_POST['newTw'], $_POST['newWeb']);
        $tools = updateTools($idActive, $_POST['newCamera'], $_POST['newLensa'], $_POST['newFilter'], $_POST['newTripod']);

        echo'
            <script>
                window.location.href = "../profile/?setting=1";
            </script>
        ';
    }
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

    <form action="" method="post" enctype="multipart/form-data" class="container form">
        <div class="sampul" style="background-image: url(../img/account/cover/<?= $profile['foto_sampul'] ?>);"></div>
        <div class="setting">
            <div class="leftSect">
                <div class="profilePic imgnya">
                    <img src="../img/account/profile/<?= $profile['foto_profile'] ?>" alt="" id="profilePicture">
                </div>
                <label for="profilePic">Foto profile</label>
                <input type="file" id="profilePic" name="newProfilePicture" class="inpFile" >
                <label for="profileSampul">Foto sampul</label>
                <input type="file" id="profileSampul" name="newProfileCover" class="inpFileSampul">
                <label for="username">Username</label>
                <input type="text" spellcheck="false" id="username" name="newUSerName" value="<?= $account['username'] ?>">
                <label for="email">Email</label>
                <input type="email" id="email" name="newEmail" value="<?= $account['email'] ?>">
                <label for="motivationQuote">Kalimat penyemangat</label>
                <textarea type="text" spellcheck="false" id="motivationQuote" name="newMotivationQuote"><?= $profile['kalimat_motivasi'] ?></textarea>
                <!-- <label for="password">Password</label>
                <input type="text" spellcheck="false" id="password" name="newPassword" value="<?= $account['password'] ?>"> -->
                <a href="#" class="hapusAkun">Hapus akun?</a>
            </div>
            <div class="rightSect">
                <div class="upper">
                    <div class="upperLeft">
                        <div class="aboutPic imgnya">
                            <img src="../img/account/about/<?= $profile['foto_tentangku'] ?>" alt="" id="aboutPicture">
                        </div>
                        <label for="profileAbout">Foto tentangmu</label>
                        <input type="file" id="profileAbout" name="newAboutPicture" class="inpFile">
                    </div>
                    <div class="upperRight">
                        <label for="yourStory">Ceritakan dirimu</label>
                        <textarea type="text" spellcheck="false" id="yourStory" name="newAboutMe"><?= $profile['tentangku'] ?></textarea>
                        <div class="sosmedAndTool">
                            <div class="inSAT inSAT1">
                                <div class="icon camera"></div>
                                <input type="text" spellcheck="false" name="newCamera" value="<?= $tools['camera'] ?>">
                            </div>
                            <div class="inSAT inSAT2">
                                <div class="icon lensa"></div>
                                <input type="text" spellcheck="false" name="newLensa" value="<?= $tools['lensa'] ?>">
                            </div>
                            <div class="inSAT inSAT3">
                                <div class="icon filter"></div>
                                <input type="text" spellcheck="false" name="newFilter" value="<?= $tools['filter'] ?>">
                            </div>
                            <div class="inSAT inSAT4">
                                <div class="icon tripod"></div>
                                <input type="text" spellcheck="false" name="newTripod" value="<?= $tools['tripod'] ?>">
                            </div>
                            <div class="inSAT inSAT5">
                                <div class="icon fb"></div>
                                <input type="text" spellcheck="false" name="newFb" value="<?= $medsos['facebook'] ?>">
                            </div>
                            <div class="inSAT inSAT6">
                                <div class="icon ig"></div>
                                <input type="text" spellcheck="false" name="newIg" value="<?= $medsos['instagram'] ?>">
                            </div>
                            <div class="inSAT inSAT7">
                                <div class="icon tw"></div>
                                <input type="text" spellcheck="false" name="newTw" value="<?= $medsos['twiter'] ?>">
                            </div>
                            <div class="inSAT inSAT8">
                                <div class="icon web"></div>
                                <input type="text" spellcheck="false" name="newWeb" value="<?= $medsos['website'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lower">
                    <div class="morePic morePic1">
                        <div class="imgnya">
                            <img src="../img/account/favorite/<?= $profile['foto_tempat_favorit'] ?>" alt="">
                        </div>
                        <label for="favorit">Favorit</label>
                        <input type="file" id="favorit" name="newFavorit" class="inpFile">
                    </div>
                    <div class="morePic morePic2">
                        <div class="imgnya">
                            <img src="../img/account/kece/<?= $profile['foto_kece1'] ?>" alt="">
                        </div>
                        <label for="kece1">Kece 1</label>
                        <input type="file" id="kece1" name="newKece1" class="inpFile">
                    </div>
                    <div class="morePic morePic3">
                        <div class="imgnya">
                            <img src="../img/account/kece/<?= $profile['foto_kece2'] ?>" alt="">
                        </div>
                        <label for="kece2">Kece 2</label>
                        <input type="file" id="kece2" name="newKece2" class="inpFile">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" name="update" class="btn">Simpan</button>
                    <a href="#" class="btn">Batal</a>
                </div>
            </div>
        </div>
    </form>

    <?php include '../partials/footer.php' ?>


    <script src="../js/navbar.js"></script>
    <script>
        // image preview
        const container = document.querySelector('.container.form');
        container.addEventListener('click', (e)=>{
            if(e.target.classList.contains('inpFile')){
                var imgNya = e.target.previousElementSibling.previousElementSibling.querySelector('img');
                
                e.target.addEventListener('change', (e2)=>{
                    if(e2.target.files.length > 0){
                        var src = URL.createObjectURL(e.target.files[0]);
                        imgNya.src = src;
                    }
                });
            }
            if(e.target.classList.contains('inpFileSampul')){
                var sampul = container.querySelector('.sampul');
                e.target.addEventListener('change', (e2)=>{
                    if(e2.target.files.length > 0){
                        var src = URL.createObjectURL(e.target.files[0]);
                        sampul.style.backgroundImage = 'url(' + src + ')';
                    }
                });
            }
        });

        // default value input file
        const inpFiles = container.querySelectorAll('input[type=file]');
        const photoFiles = '<?= $profile['foto_profile'] ?>';
        // inpFiles[0].files = dataTransfer.files;
        console.log(inpFiles[0].files);
    </script>
</body>
</html>