<?php

function alert($color = true, $jenis = true, $h1, $p, $btn1 = false, $btn2 = false){
    if($color == true){ $color = '#18A13D'; }
    else{ $color = '#a02525'; }

    echo '<div class="alertSection noActive" id="alertSection">';
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
    echo '</div>';
}

?>



<!-- <div class="alertSection noActive" id="alertSection">
    <div class="container" style="border: 5px solid #18A13D;">
        <h1>Perhatian!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, labore.</p>
        <div class="buttons">
            <button type="submit" name="alertYes" class="btn">Ok!</button>
            <button type="submit" name="alertNo" class="btn" id="btnNo">No!</button>
        </div>
    </div>
</div> -->