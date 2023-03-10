<?php
    // Cara menggunakan fungsi ini
    // Parameter pertama di isi dengan alamat gambar untuk background
    // Parameter ke dua apabila di isi nilai false, maka akan icon tidak akan ditampilkan
    // Parameter ketiga berisi titlenya
    // Parameter ke empat apabila false maka tag p tidak akan ditampilkan

    function setBookmark($imgAddres, $h1, $iconAddres, $p){

        // menampilkan html
        echo '<div class="bookmark" id="bookmark" style="background-image: ' . $imgAddres . ';">';
        echo'<div class="overlay"></div>';
        echo'<div class="content">';
        if($iconAddres != false){
            echo '
                    <div class="logo" data-aos="flip-left">
                        <div class="mainLogo" style="background-image: ' . $iconAddres . ';" data-aos="fade-up"></div>
                    </div>
            ';
        }
        echo '<h1 data-aos="zoom-out">' . $h1 . '</h1>';
        if($p != false){
            echo '<p>' . $p . '</p>';
        }
        echo '</div>';
        echo '</div>';
    }
?>