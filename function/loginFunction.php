<?php

// FUNGSI SIGN UP
function signup($data){
    global $koneksi;
    global $tblAccount;

    $uname = $data['username'];
    $mail = $data['email'];
    $pw = password_hash($data['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO $tblAccount VALUES ('', '$uname', '$mail', '$pw')";

    $hasil = mysqli_query($koneksi, $query);

    return $hasil;
}

// FUNGSI LENGKAPI AKUN
function insertProfile01($data, $file){
    global $koneksi;
    global $tblProfile;

    $idNewUser = $data['id_user'];
    $namaFotoProfile = storePhoto($file['profilePhoto'], '../img/account/profile');
    $namaFotoSampul = storePhoto($file['sampulPhoto'], '../img/account/cover');
    $kalimatMotivasi = $data['motivationQuote'];
    $namaFotoTentangku = storePhoto($file['yourPhoto'], '../img/account/about');
    $ceritaku = $data['yourSelf'];

    $namaFotoTempatFavorit = storePhoto($file['favPlace'], '../img/account/favorite');
    $namaFotoKece1 = storePhoto($file['bestPhoto1'], '../img/account/kece');
    $namaFotoKece2 = storePhoto($file['bestPhoto2'], '../img/account/kece');

    $query = "INSERT INTO $tblProfile VALUES(
                '', '$idNewUser', '$namaFotoProfile',
                '$namaFotoSampul', '$kalimatMotivasi',
                '$namaFotoTentangku', '$ceritaku',
                '$namaFotoTempatFavorit', '$namaFotoKece1',
                '$namaFotoKece2'
            )";

    return mysqli_query($koneksi, $query);
}

function insertProfile02($data){
    global $koneksi;
    global $tblMedsos;

    $idNewUser = $data['id_user'];
    $fb = $data['fb'];
    $ig = $data['ig'];
    $tw = $data['tw'];
    $web = $data['web'];

    return mysqli_query($koneksi, "INSERT INTO $tblMedsos VALUES ('', '$idNewUser', '$fb', '$ig', '$tw', '$web')");
}

function insertProfile03($data){
    global $koneksi;
    global $tblTools;

    $idNewUser = $data['id_user'];
    $kamera = $data['camera'];
    $lensa = $data['lensa'];
    $filter = $data['filter'];
    $tripod = $data['tripod'];

    return mysqli_query($koneksi, "INSERT INTO $tblTools VALUES ('$idNewUser', '$kamera', '$lensa', '$filter', '$tripod', '')");
}







// FUNGSI SIGN IN
function signin($data){
    global $koneksi;
    global $tblAccount;

    $email = $data['email'];
    $pw = $data['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM $tblAccount WHERE email = '$email'");
    $hasil = mysqli_fetch_assoc($query);

    if($hasil['email'] === $email){
        if( password_verify($pw, $hasil['password']) == 1 ){
            $_SESSION['idActive'] = $hasil['id_user'];
            echo'
                <script>
                    alert(' . $_SESSION['idActive'] . ');
                    alert("Login berhasil!!!");
                    window.location.href = "../";
                </script>
            ';
        } else{
            echo'
                <script>
                    alert("Password yang anda masukkan salah!!!");
                    window.location.href = "login.php";
                </script>
            ';
        }
    } else{
        echo'
            <script>
                alert("Email yang dimasukkan tidak terdaftar!!!");
                window.location.href = "login.php";
            </script>
        ';
    }
}







// FUNGSI LOGOUT
function signout(){
    session_destroy();
    echo'
    <script>
        alert("Sign Out berhasil!!!");
        window.location.href = "http://localhost/streetHub/";
    </script>
';
}










?>