<?php
function navProfile($li1 = false, $li2 = false, $li3 = false){
    if($li1 == true){ $li1 = 'ulActive'; }
    else if($li2 == true){ $li2 = 'ulActive'; }
    else if($li3 == true){ $li3 = 'ulActive'; }

    echo'<div class="navProfile" id="navProfile">';
        echo'<div class="container">';
            echo'<ul>';
                echo'<li class="' . $li1 . '">';
                    // echo'<a href="magazine.php#navProfile">Bingkai</a>';
                    echo'<a href="magazine.php#navProfile">Bingkai</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li2 . '">';
                    // echo'<a href="gallery.php#navProfile">Galeri</a>';
                    echo'<a href="gallery.php#navProfile">Galeri</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li3 . '">';
                    // echo'<a href="aboutme.php#navProfile">Tentangku</a>';
                    echo'<a href="index.php#navProfile">Tentangku</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
            echo'</ul>';
        echo'</div>';
        // echo'<p>Foto Baru</p>';
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