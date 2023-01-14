<?php

    function setCardLawas($linkto, $imgLink, $jl){
        echo'<div class="cardLawas">';
            echo'<a href="' . $linkto . '" class="frontPic" style="background-image: ' . $imgLink . ';">';
                echo'<div class="content">';
                    echo'<div class="line"></div>';
                    echo'<h2>' . $jl . '</h2>';
                    echo'<div class="line"></div>';
                echo'</div>';
            echo'</a>';
            echo'<div class="backPic" style="background-image: ' . $imgLink . ';"></div>';
        echo'</div>';
    }

?>

<!-- <div class="cardLawas">
    <a href="#" class="frontPic" style="background-image: url(../img/profile/10.jpg);">
        <div class="content">
            <div class="line"></div>
            <h2>Jl. In Aja Dulu</h2>
            <div class="line"></div>
        </div>
    </a>
    <div class="backPic" style="background-image: url(../img/profile/10.jpg);"></div>
</div> -->