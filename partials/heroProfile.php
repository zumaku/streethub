<?php
function heroProfile($bgLink, $profilePicLink, $nama, $fb = false, $ig = false, $tw = false, $web = false){
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
            echo'<p class="quote">"Fotografi menyadarkanku bahwa setiap detik itu berarti dan setiap hasil yang bagus ada kerja keras"</p>';
        echo'</div>';
    echo'</div>';
}
?>
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