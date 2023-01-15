<?php

    if( isset($_POST['logout']) ){

    }

?>

<div class="secnav">
    <nav class="nav1" id="nav1">
        <div class="container">
            <div class="sec1">
                <a href="http://localhost/streetHub/">
                    <div class="logo"></div>
                </a>
                
                <!-- humbMenu -->
                <div class="humb" id="humb">
                    <input type="checkbox" id="check">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="navbar">
                    <form action="" method="" class="pencarian">
                        <input type="text" name="cariapa" id="cariapa" placeholder="Cari di sini" autocomplete="none">
                    </form>
                    <ul class="navMenu">
                        <li>
                            <a href="#">Tentang</a>
                            <span class="underline"></span>
                        </li>
                        <li>
                            <a href="#">Lisensi</a>
                            <span class="underline"></span>
                        </li>
                        <li>
                            <a href="#">Komunitas</a>
                            <span class="underline"></span>
                        </li>
                        <li>
                            <a href="#">Produk</a>
                            <span class="underline"></span>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <span class="underline"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="http://localhost/streetHub/" class="secTengah">
                <div class="logo"></div>
            </a>
            <div class="sec2">
                <div class="keranjang">
                    <a href="#"></a>
                </div>

                <?php
                if( isset($_SESSION['idActive']) ){
                    echo '<div class="account" id="accountDd">';
                        echo '<div class="profile"></div>';
                        echo '<div class="arrow"></div>';
                    echo '</div>';
                    echo '<div class="dropdown" style="display: none;">';
                        echo '<div class="segitiga"></div>';
                        echo '<a href="#">Foto Baru</a><span></span>';
                        echo '<a href="#">Galery Baru</a><span></span>';
                        echo '<a href="http://localhost/streetHub/profile/aboutme_ujicoba.php">Profile</a><span></span>';
                        echo '<a href="#">Pengaturan</a><span></span>';
                        echo '<form action="" method="post"><button type="submit" name="logout">Sign Out</button></form>';
                    echo '</div>';
                } else{
                    echo '<div class="signinLink">';
                        echo '<a href="http://localhost/streetHub/auth/login.php">Sign In</a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </nav>

    <nav class="nav2" id="nav2" style="display: none;">
        <div class="navbar">
            <form action="" method="" class="pencarian">
                <input type="text" name="cariapa" id="cariapa" placeholder="Cari di sini">
                <span class="underline"></span>
            </form>
            <ul class="navMenu">
                <li>
                    <a href="#">Tentang</a>
                    <span cWass="underline"></span>
                </li>
                <li>
                    <a href="#">Lisensi</a>
                    <span class="underline"></span>
                </li>
                <li>
                    <a href="#">Komunitas</a>
                    <span class="underline"></span>
                </li>
                <li>
                    <a href="#">Produk</a>
                    <span class="underline"></span>
                </li>
                <li>
                    <a href="#">Blog</a>
                    <span class="underline"></span>
                </li>

                <?php
                if( isset($_SESSION['idActive']) ){
                    echo '<li>';
                        echo '<a href="#">Pengaturan</a>';
                        echo '<span class="underline"></span>';
                    echo '</li>';
                    echo '<li class="newli">';
                        echo '<form action="" method="post"><button type="submit" name="logout">Sign Out</button></form>';
                    echo '</li>';
                } else{
                    echo '<li class="newli">';
                        echo '<a href="http://localhost/streetHub/auth/login.php">Sign in</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>



