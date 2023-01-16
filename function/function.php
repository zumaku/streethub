<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'streethub');
$tblAccount = 'user_account';
$tblProfile = 'user_profile';
$tblTools = 'user_tools';
$tblMedsos = 'user_medsos';




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
function hasilAlert($logout = false){
    if( isset($_POST['alertYes']) ){
        if($logout == true){
            session_destroy();
            alert(true, true, 'Bye..', 'Sign Out Berhasil');
        }
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "http://localhost/streetHub/";
                }, 2000)
            </script>
        ';
    } else if( isset($_POST['alertNo']) ){
        echo'
            <script>
                window.location.href;
            </script>
        ';
    }
}


?>