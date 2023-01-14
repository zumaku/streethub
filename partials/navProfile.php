<?php
function navProfile($li1 = false, $li2 = false, $li3 = false){
    if($li1 == true){ $li1 = 'ulActive'; }
    else if($li2 == true){ $li2 = 'ulActive'; }
    else if($li3 == true){ $li3 = 'ulActive'; }

    echo'<div class="navProfile">';
        echo'<div class="container">';
            echo'<ul>';
                echo'<li class="' . $li1 . '">';
                    echo'<a href="#">Foto Mereka</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li2 . '">';
                    echo'<a href="#">Galeri</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li3 . '">';
                    echo'<a href="#">Tentangku</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
            echo'</ul>';
        echo'</div>';
    echo'</div>';
}
?>

<!-- <div class="navProfile">
    <div class="container">
        <ul>
            <li class="ulActive">
                <a href="#">Foto Mereka</a>
                <span class="underline"></span>
            </li>
            <li>
                <a href="#">Galeri</a>
                <span class="underline"></span>
            </li>
            <li>
                <a href="#">Tentangku</a>
                <span class="underline"></span>
            </li>
        </ul>
    </div>
</div> -->