<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'streethub');
$tblAccount = 'user_account';
$tblProfile = 'user_profile';
$tblTools = 'user_tools';
$tblMedsos = 'user_medsos';
$tblGalery = 'galery';




// FUNGSI MENGAMBIL DATA
function takeAccount($id){
    global $koneksi;
    global $tblAccount;
    return mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblAccount WHERE id_user = '$id'") );
}
function takeProfile($id){
    global $koneksi;
    global $tblProfile;
    return mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblProfile WHERE id_user = '$id'") );
}
function takeMedsos($id){
    global $koneksi;
    global $tblMedsos;
    return mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblMedsos WHERE id_user = '$id'") );
}
function takeTools($id){
    global $koneksi;
    global $tblTools;
    return mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblTools WHERE id_user = '$id'") );
}



// FUNGSI ALERT
function alert($color = true, $jenis = true, $h1, $p, $btn1 = false, $btn2 = false){
    if($color == true){ $color = '#18A13D'; }
    else{ $color = '#a02525'; }

    echo '<form action="" method="post" class="alertSection noActive" id="alertSection">';
        echo '<div class="container" style="border: 5px solid ' . $color . ';">';
            echo '<h1>' . $h1 . '</h1>';
            echo '<p>' . $p . '</p>';
            echo '<div class="buttons">';
                if($jenis == true && $btn1 != false){
                    echo '<button type="submit" name="alertYes" class="btn"  style="background-color: ' . $color . ';">' . $btn1 . '</button>';
                } else if($jenis == false && $btn2 != false){
                    echo '<button type="submit" name="alertYes" class="btn">' . $btn1 . '</button>';
                    echo '<button type="submit" name="alertNo" class="btn" id="btnNo">' . $btn2 . '</button>';
                }
            echo '</div>';
        echo '</div>';
    echo '</form>';
}

// FUNGSI MENGECEK HASIL ALERT
function hasilAlert($event = false){
    if( isset($_POST['alertYes']) ){
        if($event === 'uploadImageGallery'){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "http://localhost/streetHub/profile/uploadImage.php?upload=gallery";
                    }, 2000)
                </script>
            ';
        } else if($event === 'signout'){
            session_destroy();
            alert(true, true, 'Bye..', 'Sign Out Berhasil');
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "http://localhost/streetHub/";
                    }, 2000)
                </script>
            ';
        }
    } else if( isset($_POST['alertNo']) ){
        if($event === 'uploadImageGallery'){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "http://localhost/streetHub/profile/gallery.php";
                    }, 2000)
                </script>
            ';
        } else if($event === 'signout'){
            echo'
                <script>
                    window.location.href;
                </script>
            ';
        }
    }
}



// FUNGSI STORE FOTO
function storePhoto($foto, $folderTujuan){
    $allowEks = ['jpg', 'jpeg', 'png'];

    $namaFoto = $foto['name'];
    $tmpFoto = $foto['tmp_name'];
    $ukuranFoto = $foto['size'];
    $errorFoto = $foto['error'];
    $tipeFoto = $foto['type'];

    $pecahEkstensiFoto = explode('.', $namaFoto);
    $ekstensiFoto = strtolower(end($pecahEkstensiFoto));

    if( in_array($ekstensiFoto, $allowEks) ){
        if( $errorFoto === 0 ){
            if( $ukuranFoto < 1000000 ){

                $namaFotoBaru = uniqid('', true) . "." . $ekstensiFoto;
                $folderTujuanAkhir = $folderTujuan . '/' . $namaFotoBaru;

                move_uploaded_file($tmpFoto, $folderTujuanAkhir);

                return $namaFotoBaru;
                // echo' <script> alert("File Berhasil Diupload!!!"); window.location.href = "ujiCobaSignup.php" </script> ';
            } else{
                echo' <script> alert("Ukuran foto lebih besar dari 1mb!!!"); </script> ';
            }
        } else{
            echo' <script> alert("Terdapat Error saat upload!!!"); </script> ';
        }
    } else{
        echo' <script> alert("Ekstensi File Salah!!!"); </script> ';
    }
}




// FUNGSI UPLOAD FOTO GALERY
function uploadImageGallery($tags, $namaFoto, $id){
    global $koneksi;
    global $tblGalery;

    $tanggal = new DateTime();
    $tglUpload = $tanggal->format('Y-m-d');
    $query = "INSERT INTO $tblGalery VALUES ('', '$id', '$tglUpload', '$namaFoto', '$tags')";

    $hasil = mysqli_query($koneksi, $query);
    // var_dump($hasil);
    return $hasil;
}



?>