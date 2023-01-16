<?php
function heroProfile($bgLink, $profilePicLink, $nama, $quote ,$fb = false, $ig = false, $tw = false, $web = false){
    echo'<div class="hero" style="background-image: ' . $bgLink . ';">';
        echo'<div class="bGradient"></div>';
        echo'<div class="container">';
            echo'<img src="' . $profilePicLink . '" alt="Profileku">';
            echo'<h1>' . $nama . '</h1>';
            echo'<div class="sosmed">';
                if($fb != false){ echo'<a href="' . $fb . '" class="icon fb"></a>'; }
                if($ig != false){ echo'<a href="' . $ig . '" class="icon ig"></a>'; }
                if($tw != false){ echo'<a href="' . $tw . '" class="icon tw"></a>'; }
                if($web != false){ echo'<a href="' . $web . '" class="icon web"></a>'; }
            echo'</div>';
            // echo'<p class="quote">"Fotografi menyadarkanku bahwa setiap detik itu berarti dan setiap hasil yang bagus ada kerja keras"</p>';
            echo'<p class="quote">"' . $quote . '"</p>';
        echo'</div>';
    echo'</div>';
}
?>

// $account = mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblAccount WHERE id_user = '$idActive'") );
// $profile = mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblProfile WHERE id_user = '$idActive'") );
// $medsos = mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblMedsos WHERE id_user = '$idActive'") );
// $tools = mysqli_fetch_assoc( mysqli_query($koneksi, "SELECT * FROM $tblTools WHERE id_user = '$idActive'") );

<!-- <div class="hero" style="background-image: url(../img/profile/sampul01.jpg);">
    <div class="bGradient"></div>
    <div class="container">
        <img src="../img/profile/profile1.png" alt="Profileku">
        <h1>Ukhtie Kebo</h1>
        <div class="sosmed">
            <a href="" class="icon fb"></a>
            <a href="" class="icon ig"></a>
            <a href="" class="icon tw"></a>
            <a href="" class="icon web"></a>
        </div>
        <p class="quote">"Fotografi menyadarkanku bahwa setiap detik itu berarti dan setiap hasil yang bagus ada kerja keras"</p>
    </div>
</div> -->