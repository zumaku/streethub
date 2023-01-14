<?php
function setCardTerbaru($linkto, $imgLink, $jl, $tgl){
    echo'<div class="cardTerbaru">';
        echo'<a href="' . $linkto . '" class="frontPic" style="background-image: ' . $imgLink . ';">';
            echo'<div class="content">';
                echo'<div class="line"></div>';
                echo'<h2>' . $jl . '</h2>';
                echo'<p>' . $tgl . '</p>';
                echo'<div class="line"></div>';
            echo'</div>';
        echo'</a>';
        echo'<div class="backPic" style="background-image: ' . $imgLink . ';"></div>';
    echo'</div>';
}
// <div class="cardTerbaru">
//     <a href="#" class="frontPic" style="background-image: url(../img/profile/03.jpg);">
//         <div class="content">
//             <div class="line"></div>
//             <h2>Jl. Kemana Aja</h2>
//             <p>30 Desember 2022</p>
//             <div class="line"></div>
//         </div>
//     </a>
//     <div class="backPic" style="background-image: url(../img/profile/03.jpg);"></div>
// </div>

?>