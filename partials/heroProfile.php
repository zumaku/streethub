<?php
function heroProfile($bgLink, $profilePicLink, $nama, $quote ,$fb = false, $ig = false, $tw = false, $web = false){
    echo'<div class="hero" style="background-image: ' . $bgLink . ';">';
        echo'<div class="bGradient"></div>';
        echo'<div class="container">';
            // echo'<img src="' . $profilePicLink . '" alt="Profileku">';
            echo'<div class="streetersPicture" data-aos="flip-left">';
                echo'<img src="' . $profilePicLink . '" alt="Profileku">';
                echo'<div class="storake"></div>';
            echo'</div>';
            echo'<h1>' . $nama . '</h1>';
            echo'<div class="sosmed" data-aos="fade-up">';
                if($fb != false){ echo'<a href="' . $fb . '" target="_blank" class="icon fb"></a>'; }
                if($ig != false){ echo'<a href="' . $ig . '" target="_blank" class="icon ig"></a>'; }
                if($tw != false){ echo'<a href="' . $tw . '" target="_blank" class="icon tw"></a>'; }
                if($web != false){ echo'<a href="' . $web . '" target="_blank" class="icon web"></a>'; }
            echo'</div>';
            // echo'<p class="quote">"Fotografi menyadarkanku bahwa setiap detik itu berarti dan setiap hasil yang bagus ada kerja keras"</p>';
            echo'<p class="quote" data-aos="zoom-in">"' . $quote . '"</p>';
        echo'</div>';
    echo'</div>';
}
?>