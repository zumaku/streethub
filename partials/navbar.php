<?php

    // LOGOUT FUNCTION PROCCES
    if( isset($_POST['logout']) ){
        alert(true, false, 'Serius?', 'Yakin ingin keluar?', 'Serius', 'Batal');
    }
    if( !isset($_GET['upload']) ){
        hasilAlert('signout');
    }

    if( isset($_SESSION['idActive']) ){
        $profileNav = takeProfile($idActive);
        $accountNav = takeAccount($idActive);
    }

    if( isset($_POST['search']) ){
        echo'
            <script>
                window.location.href = "' . $urlToRoot . 'pages/?search=' . $_POST['cariapa'] . '"
            </script>
        ';
    }

?>

<div class="secnav">
    <nav class="nav1" id="nav1">
        <div class="container">
            <div class="sec1">
                <a href="<?= $urlToRoot ?>">
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
                    <form action="" method="post" class="pencarian">
                        <input type="text" name="cariapa" id="cariapa" placeholder="Cari di sini" autocomplete="none">
                        <button type="submit" name="search" hidden></button>
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
            <a href="<?= $urlToRoot ?>" class="secTengah">
                <div class="logo"></div>
            </a>
            <div class="sec2">
                <a href="<?= $urlToRoot ?>pages/keranjang.php" class="keranjang"></a>

                <?php
                if( isset($_SESSION['idActive']) ){
                    $profileNav = takeProfile($_SESSION['idActive']);
                    echo '<div class="account" id="accountDd">';
                        echo '<a href="' . $urlToRoot . 'profile/" class="profile" style="background-image: url(' . $urlToRoot . '/img/account/profile/'.$profileNav['foto_profile'].')"></a>';
                        echo '<div class="arrow"></div>';
                    echo '</div>';
                    echo '<div class="dropdown" style="display: none;">';
                        echo '<div class="segitiga"></div>';
                        echo '<a href="' . $urlToRoot . 'profile/gallery.php">Foto baru</a><span></span>';
                        echo '<a href="' . $urlToRoot . 'profile/">Profile</a><span></span>';
                        echo '<a href="#">Pengaturan</a><span></span>';
                        echo '<form action="" method="post"><button type="submit" name="logout"><p>Sign out</p></button></form>';
                    echo '</div>';
                } else{
                    echo '<div class="signinLink">';
                        echo '<a href="' . $urlToRoot . 'auth/">Sign In</a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </nav>

    <nav class="nav2" id="nav2" style="display: none;">
        <div class="navbar">
            <form action="" method="post" class="pencarian">
                <input type="text" name="cariapa" id="cariapa" placeholder="Cari di sini">
                <button type="submit" name="search" hidden></button>
                <span class="underline"></span>
            </form>
            <ul class="navMenu">
                <li>
                    <a href="#">Foto baru</a>
                    <span cWass="underline"></span>
                </li>
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
                    echo '<li>';
                        echo '<a href="' . $urlToRoot . '/profile/" class="profile">';
                            echo'<div class="circleProfile" style="background-image: url(../img/account/profile/' . $profileNav['foto_profile'] . ');"></div>';
                            echo'<p>' . $accountNav['username'] .  '</p>';
                        echo'</a>';
                        echo '<span class="underline"></span>';
                    echo '</li>';
                    echo '<li class="newli">';
                        echo '<form action="" method="post"><div class="iconLogout"></div><button type="submit" name="logout">Sign out</button></form>';
                    echo '</li>';
                } else{
                    echo '<li class="newli">';
                        echo '<a href="' . $urlToRoot . '/auth/">Sign in</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>



