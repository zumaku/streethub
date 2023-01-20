<?php
function navProfile($li1 = false, $li2 = false, $li3 = false){
    if($li1 == true){ $li1 = 'ulActive'; }
    else if($li2 == true){ $li2 = 'ulActive'; }
    else if($li3 == true){ $li3 = 'ulActive'; }

    echo'<div class="navProfile" id="navProfile">';
        echo'<div class="container">';
            echo'<ul>';
                echo'<li class="' . $li1 . '">';

                    if( isset($_SESSION['idActive']) && !isset($_GET['idActive']) ){
                        $magazineLink = 'magazine.php#navProfile';
                    } else if( isset($_GET['idActive']) ){
                        $magazineLink = 'magazine.php?idActive=' . $_GET['idActive'] . '#navProfile';
                    }

                    echo'<a href="' . $magazineLink . '">Bingkai</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li2 . '">';
                
                    if( isset($_SESSION['idActive']) && !isset($_GET['idActive']) ){
                        $galleryLink = 'gallery.php#navProfile';
                    } else if( isset($_GET['idActive']) ){
                        $galleryLink = 'gallery.php?idActive=' . $_GET['idActive'] . '#navProfile';
                    }

                    echo'<a href="' . $galleryLink . '">Galeri</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
                echo'<li class="' . $li3 . '">';
                
                    if( isset($_SESSION['idActive']) && !isset($_GET['idActive']) ){
                        $indexLink = '.#navProfile';
                    } else if( isset($_GET['idActive']) ){
                        $indexLink = '.?idActive=' . $_GET['idActive'] . '#navProfile';
                    }

                    echo'<a href="' . $indexLink . '">Tentangku</a>';
                    echo'<span class="underline"></span>';
                echo'</li>';
            echo'</ul>';
        echo'</div>';
    echo'</div>';
}
?>