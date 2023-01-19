<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'streethub');
$tblAccount = 'user_account';
$tblProfile = 'user_profile';
$tblTools = 'user_tools';
$tblMedsos = 'user_medsos';
$tblGalery = 'galery';
$tblMagazine = 'magazine';




// FUNGSI MENGAMBIL DATA USER
function takeAccount($id){
    global $koneksi;
    global $tblAccount;
    $hasil = mysqli_query($koneksi, "SELECT * FROM $tblAccount WHERE id_user = '$id'");
    return mysqli_fetch_assoc($hasil);
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

// FUNGSI AMBIL GAMBAR GALLERY SECARA ACAK UNTUK BOOKMARK
function randomBookmarCover($idUser){
    global $koneksi;
    global $tblGalery;

    $id_gallery = mysqli_query($koneksi, "SELECT foto_galery FROM $tblGalery WHERE id_user = '$idUser'");
    $barisKe = [];
    while ( $baris = mysqli_fetch_assoc($id_gallery) ){
        $barisKe[] = $baris;
    }
    
    $randomNo = array_rand($barisKe);
    
    return $barisKe[$randomNo]['foto_galery'];
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
    global $urlToRoot;

    if( isset($_POST['alertYes']) ){
        if($event === 'uploadImageGallery' || $event === 'uploadImageMagazine'){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href;
                    }, 2000)
                </script>
            ';
        } else if($event === 'signout'){
            session_destroy();
            alert(true, true, 'Bye..', 'Sign Out Berhasil');
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "' . $urlToRoot . '";
                    }, 2000)
                </script>
            ';
        }
    } else if( isset($_POST['alertNo']) ){
        if($event === 'uploadImageGallery'){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "../profile/gallery.php";
                    }, 2000)
                </script>
            ';
        } else if($event === 'uploadImageMagazine'){
            echo'
                <script>
                    setTimeout(()=>{
                        window.location.href = "../profile/magazine.php";
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



// SEARCHING FUNCTION
function searchGallery($key){
    global $koneksi;
    global $tblGalery;

    $query = mysqli_query($koneksi, "SELECT * FROM $tblGalery WHERE tag_foto LIKE '%$key%'");

    $hasil = [];
    while ( $baris = mysqli_fetch_assoc($query) ){
        $hasil[] = $baris;
    }
    return $hasil;
}
// SEARCH STREETERS
function searchStreeters($key){
    global $koneksi;
    global $tblAccount;

    $query = mysqli_query($koneksi, "SELECT * FROM $tblAccount WHERE username LIKE '%$key%'");

    $hasil = [];
    while ( $baris = mysqli_fetch_assoc($query) ){
        $hasil[] = $baris;
    }
    return $hasil;
}









// FUNGSI STORE FOTO
function storePhoto($foto, $folderTujuan){
    $allowEks = ['jpg', 'jpeg', 'png'];

    $namaFoto = $foto['name'];
    $tmpFoto = $foto['tmp_name'];
    $ukuranFoto = $foto['size'];
    $errorFoto = $foto['error'];

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

// FUNGSI STORE BANYAK FOTO
function storeMultiplePhoto($fotos, $folderTujuan){
    $allowEks = ['jpg', 'jpeg', 'png'];

    $bnykFoto = count($fotos['name']);
    $kumpulanNamaFotoBaru = [];

    for($i=0; $i<$bnykFoto; $i++){
        $namaFoto = $fotos['name'][$i];
        $tmpFoto = $fotos['tmp_name'][$i];
        $ukuranFoto = $fotos['size'][$i];
        $errorFoto = $fotos['error'][$i];

        $pecahEkstensiFoto = explode('.', $namaFoto);
        $ekstensiFoto = strtolower(end($pecahEkstensiFoto));

        if( in_array($ekstensiFoto, $allowEks) ){
            if( $errorFoto === 0 ){
                if( $ukuranFoto < 1000000 ){

                    $namaFotoBaru = uniqid('', true) . "." . $ekstensiFoto;
                    $folderTujuanAkhir = $folderTujuan . '/' . $namaFotoBaru;

                    move_uploaded_file($tmpFoto, $folderTujuanAkhir);
                    
                    $kumpulanNamaFotoBaru[$i] = $namaFotoBaru;
                } else{
                    echo' <script> alert("Ukuran foto lebih besar dari 1mb pada foto ke-' . $i+1 . '!!!"); </script> ';
                }
            } else{
                echo' <script> alert("Terdapat Error Saat Upload pada foto ke-' . $i+1 . '!!!"); </script> ';
            }
        } else{
            echo' <script> alert("Ekstensi File Salah pada foto ke-' . $i+1 . '!!!"); </script> ';
        }
    }

    return $kumpulanNamaFotoBaru;
}








// FUNGSI UPLOAD FOTO GALERY
function uploadImageGallery($tags, $namaFoto, $idUser){
    global $koneksi;
    global $tblGalery;

    $tanggal = new DateTime();
    $tglUpload = $tanggal->format('Y-m-d');
    $query = "INSERT INTO $tblGalery VALUES ('', '$idUser', '$tglUpload', '$namaFoto', '$tags')";

    $hasil = mysqli_query($koneksi, $query);
    return $hasil;
}
// FUNGSI MENGAMBIL FOTO GALLERY
function takeImageGallery($idUser){
    global $koneksi;
    global $tblGalery;

    $query = mysqli_query($koneksi, "SELECT * FROM $tblGalery WHERE id_user = '$idUser'");
    $hasil = [];
    while ( $baris = mysqli_fetch_assoc($query) ){
        $hasil[] = $baris;
    }
    return $hasil;
}
// FUNGSI HAPUS IMAGE GALLERY
function deleteImageGallery($idImageGallery){
    global $koneksi;
    global $tblGalery;
    
    $query = "DELETE FROM $tblGalery WHERE id_galery = $idImageGallery";
    return mysqli_query($koneksi, $query);
}




// FUNGSI UPLOAD FOTO MAGAZINE
function uploadImageMagazine($namaJalan, $namaFoto, $idUser){
    global $koneksi;
    global $tblMagazine;

    $tanggal = new DateTime();
    $tglUpload = $tanggal->format('Y-m-d');
    $query = "INSERT INTO $tblMagazine VALUES ('', '$idUser', '$namaFoto', '$namaJalan', '$tglUpload')";

    $hasil = mysqli_query($koneksi, $query);
    return $hasil;
}
// FUNGSI MENGAMBIL INFO FOTO MAGAZINE TERBARU
function takeInfoMagazine($kondisiFoto, $idUser){
    global $koneksi;
    global $tblMagazine;

    if($kondisiFoto == 'terbaru'){
        $operasi = '>=';
    } else if($kondisiFoto == 'lawas'){
        $operasi = '<=';
    }

    $query = mysqli_query($koneksi, "SELECT DISTINCT nama_jalan, tgl_upload FROM $tblMagazine WHERE DAY(tgl_upload)" . $operasi . " DAY(CURRENT_DATE) - 7 AND id_user = '$idUser'");

    $infos = [];
    while ( $data = mysqli_fetch_assoc($query) ){
        $infos[] = $data;
    }

    return $infos;
}
// FUNGSI MENGAMBIL FOTO MAGAZINE TERBARU
function takeImageMagazine($kondisiFoto, $idUser, $namaJalan, $tglFoto){
    global $koneksi;
    global $tblMagazine;

    if($kondisiFoto == 'terbaru'){
        $operasi = '>=';
    } else if($kondisiFoto == 'lawas'){
        $operasi = '<=';
    }

    // Query untuk mengambil gambar pada jalan dan tanggal tersebut secara acak
    $query = mysqli_query($koneksi, "SELECT * FROM $tblMagazine WHERE nama_jalan = '$namaJalan' AND tgl_upload = '$tglFoto' AND DAY(tgl_upload) " . $operasi . " DAY(CURRENT_DATE) - 7 AND id_user = '$idUser'");
    $image = [];
    while ( $baris = mysqli_fetch_assoc($query) ){
        $image[] = $baris;
    }
    
    $randomNo = array_rand($image);
    
    return $image[$randomNo]['foto_magazine'];
}
// FUNGSI MENAMPILKAN FOTO MAGAZINE SESUAI JALAN DAN TANGGAL
function displayImageMagazine($idUser, $namaJalan, $tglFoto){
    global $koneksi;
    global $tblMagazine;

    $query = mysqli_query($koneksi, "SELECT * FROM $tblMagazine WHERE id_user = '$idUser' AND nama_jalan = '$namaJalan' AND tgl_upload = '$tglFoto'");

    $infos = [];
    while ( $baris = mysqli_fetch_assoc($query) ){
        $infos[] = $baris;
    }
    
    return $infos;
}




?>