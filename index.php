<?php
    session_start();
    include 'function/function.php';
    $urlToRoot = './';

    if( isset($_SESSION['idActive']) ){
        $idActive = $_SESSION['idActive'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Stock Photos Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Zul Fadli Ahmad">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetHub</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- =============== NAVBAR START =============== -->
    <?php include 'partials/navbar.php' ?>
    <!-- =============== NAVBAR END =============== -->

    <!-- =============== HOME START =============== -->
    <div class="hero">
        <div class="container">
            <h1>TEMUKAN</h1>
            <h2>Semua yang ada di jalanan selalu memberikan sebuah pelajaran.</h2>
            <p>Dapatkan inspirasi dan bagikan jepretanmu serta cerita yang kau dapat  di jalan dan tunjukkan pada dunia.</p>
            <a href="auth/" class="btn">Daftar Kuy</a>
        </div>
    </div>
    <!-- =============== HOME END =============== -->
    
    <!-- =============== ABOUT START =============== -->
    <div class="about">
        <div class="container">
            <h1>Apa yang membuat kami <span>berbeda</span>?</h1>
            <div class="cards">
                <div class="card">
                    <div class="icon ic1"></div>
                    <h2>Bangun <span>portpoliomu</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem tempore explicabo delectus vitae. Neque, amet aut modi itaque facilis esse incidunt saepe, commodi dicta, impedit dolorum sint assumenda rem doloremque provident optio.</p>
                </div>
                <div class="card">
                    <div class="icon ic2"></div>
                    <h2>Tingkatkan <span>levelmu</span></h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut nisi ut qui corporis necessitatibus cumque deserunt nihil facere, voluptatem consequatur harum non aliquam, laboriosam vel vero voluptas eius quasi voluptates! Cumque quidem quaerat, esse voluptatibus debitis accusantium quis veritatis corporis.</p>
                </div>
                <div class="card">
                    <div class="icon ic3"></div>
                    <h2>Ukur <span>kemampuanmu</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptas deserunt, ipsam non nisi totam ipsa iusto officiis magni repellendus rerum hic libero consequuntur adipisci ut pariatur itaque?</p>
                </div>
                <div class="card">
                    <div class="icon ic4"></div>
                    <h2>Jual <span>jepretanmu</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptas deserunt, ipsam non nisi totam ipsa iusto officiis magni repellendus rerum hic libero consequuntur adipisci ut pariatur itaque?</p>
                </div>
            </div>
            <div class="unduhApp"> 
                <div class="corner">
                    <h1 class="unduh">Unduh <span>aplikasinya</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui nesciunt reprehenderit repudiandae culpa debitis possimus praesentium facere error, minus hic.</p>
                    <div class="app">
                        <a href="#"><div class="appIcon appStore"></div></a>
                        <a href="#"><div class="appIcon googlePlay"></div></a>
                    </div>
                </div>
                <div class="mockupApp">
                    <img src="img/home/app.png" alt="Street Hub App">
                </div>
            </div>
        </div>
    </div>
    <!-- =============== ABOUT END =============== -->

    <!-- =============== BIG 3 START =============== -->
    <?php
        include 'partials/bookmark.php';
        setBookmark('url(img/home/bookmark1.png)', 'Sang 3 Besar', 'url(img/icon/streetHub.png)', false);
    ?>
    <div class="big3">
        <div class="container">
            <h1><span>Terbaik</span> dari yang terbaik.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, exercitationem.</p>
            <a href="#" class="btn">Top 10</a>
            <!-- BIG  3 HARUS DIBUATKAN HALAMAN TERTENTU NANTINYA -->
            <div class="cards" id="big3Cards">
                <div class="card">
                    <div class="img" style="background-image: url(img/home/big1.jpg);">
                        <h1>Baso Gege</h1>
                        <a href="#" class="btnArrow">
                            <p>Profile</p>
                            <div class="arrow"></div>
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="circleProfile dnone"><div class="icon"></div></a>
                        <h1>Baso Gege</h1>
                        <p><span>Selayar</span> | <a href="#">@bos_gege</a></p>
                        <div class="line"></div>
                        <div class="recor">
                            <div class="unduhan">
                                <h1>1300</h1>
                                <p>Unduhan</p>
                            </div>
                            <div class="kontribusi">
                                <h1>3,5k</h1>
                                <p>Kontribusi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="img" style="background-image: url(img/home/big2.jpg)">
                        <h1>Cikali Kun</h1>
                        <a href="#" class="btnArrow">
                            <p>Profile</p>
                            <div class="arrow"></div>
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="circleProfile dnone"><div class="icon"></div></a>    
                        <h1>Cikali Kun</h1>
                        <p><span>Makassar</span> | <a href="#">@cikalikun</a></p>
                        <div class="line"></div>
                        <div class="recor">
                            <div class="unduhan">
                                <h1>820</h1>
                                <p>Unduhan</p>
                            </div>
                            <div class="kontribusi">
                                <h1>2k</h1>
                                <p>Kontribusi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="img" style="background-image: url(img/home/big3.jpg)">
                        <h1>Baso Latto</h1>
                        <a href="#" class="btnArrow">
                            <p>Profile</p>
                            <div class="arrow"></div>
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="circleProfile dnone"><div class="icon"></div></a>    
                        <h1>Baso Latto</h1>
                        <p><span>Gowa</span> | <a href="#">@legentlatto2</a></p>
                        <div class="line"></div>
                        <div class="recor">
                            <div class="unduhan">
                                <h1>780</h1>
                                <p>Unduhan</p>
                            </div>
                            <div class="kontribusi">
                                <h1>1,7k</h1>
                                <p>Kontribusi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- =============== BIG 3 END =============== -->
    
    <!-- =============== PORTPOLIO START =============== -->
    <?php
        setBookmark('url(img/home/bookmark2.png)', 'Portpolio', 'url(img/icon/portpolio.png)', false);
    ?>
    <div class="portpolio">
        <div class="container">
            <h1>Desain dan bangun <span>portpoliomu</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis non incidunt tempore inventore ipsam labore?</p>
            <a href="#" class="btn">Mulai Sekarang</a>
            <img src="img/home/portpolio.png" alt="Bangun Portpoliomu">
        </div>
    </div>
    <!-- =============== PORTPOLIO END =============== -->

    <!-- =============== LISENSI START =============== -->
    <?php
        setBookmark('url(img/home/bookmark3.png)', 'Lisensi', 'url(img/icon/lisensi.png)', false);
    ?>
    <div class="lisensi">
        <div class="container">
            <img src="img/home/lisensi.png" alt="Lisensi">
            <div class="sidebox">
                <h2>Dapatkan bayaran dari</h2>
                <h1>Hasil Jepretanmu</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta neque blanditiis illum animi eveniet cupiditate alias eos corrupti exercitationem consequatur a iure autem culpa aut et asperiores assumenda, quis quas sit odit! Eum illo ut exercitationem aliquam explicabo voluptate ratione!</p>
                <a href="#" class="btnArrow">
                    <p>Info Lengkap</p>
                    <div class="arrow"></div>
                </a>
            </div>
        </div>
    </div>
    <!-- =============== LISENSI END =============== -->

    <!-- =============== PRODUK START =============== -->
    <div class="produk" id="produkSec">
        <div class="container">
            <!-- Sidebox untuk notebook, tablet dan mobile -->
            <div class="sidebox" id="sb1">
                <h2>Perhatikan dan lengkapi</h2>
                <h1>Alat Tempurmu</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, magnam! Fugiat, reiciendis. Ipsum, dolorum aliquam itaque minima earum rerum sed amet quidem doloribus perferendis mollitia quis quisquam accusantium tempore voluptatem, corrupti non doloremque fugiat.</p>
                <a href="#" class="btnArrow">
                    <p>Lihat Lainnya</p>
                    <div class="arrow"></div>
                </a>
            </div>
            <div class="slider">
                <!-- Sidebox untuk leptop dan diatasnya -->
                <div class="sidebox" id="sb2">
                    <h2>Perhatikan dan lengkapi</h2>
                    <h1>Alat Tempurmu</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, magnam! Fugiat, reiciendis. Ipsum, dolorum aliquam itaque minima earum rerum sed amet quidem doloribus perferendis mollitia quis quisquam accusantium tempore voluptatem, corrupti non doloremque fugiat.</p>
                    <a href="#" class="btnArrow">
                        <p>Lihat Lainnya</p>
                        <div class="arrow"></div>
                    </a>
                </div>
                <div class="cards">
                    <a href="#produkSec" class="card" style="background-image: url(img/home/camera.png)">
                        <div class="icon" style="background-image: url(img/icon/cameraCard.png)"></div>
                        <h1>Camera</h1>
                    </a>
                    <a href="#produkSec" class="card" style="background-image: url(img/home/lensa.png)">
                        <div class="icon" style="background-image: url(img/icon/lensCard.png)"></div>
                        <h1>Lensa</h1>
                    </a>
                    <a href="#produkSec" class="card" style="background-image: url(img/home/filter.png)">
                        <div class="icon" style="background-image: url(img/icon/filterCard.png)"></div>
                        <h1>Filter</h1>
                    </a>
                    <a href="#produkSec" class="card" style="background-image: url(img/home/tripod.png)">
                        <div class="icon" style="background-image: url(img/icon/monopodCard.png)"></div>
                        <h1>Treepod</h1>
                    </a>
                    <a href="#produkSec" class="card" style="background-image: url(img/home/tas.png)">
                        <div class="icon" style="background-image: url(img/icon/bagCard.png)"></div>
                        <h1>Tas</h1>
                    </a>
                    <a href="#produkSec" class="card" style="background-image: url(img/home/baju.png)">
                        <div class="icon" style="background-image: url(img/icon/kaosCard.png)"></div>
                        <h1>Shirt</h1>
                    </a>
                </div>
            </div>
            <div class="btnMove next"></div>
            <div class="btnMove previous dnone"></div>
        </div>
    </div>
    <!-- =============== PRODUK END =============== -->

    <!-- =============== KOMUNITAS START =============== -->
    <div class="komunitas">
        <div class="container">
            <h1>Gabung komunitas kami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum delectus iusto dolor quisquam, architecto maxime unde eaque amet illum ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio tempora ducimus deleniti possimus!</p>
            <a href="auth/" class="btn" id="btn">Daftar Kuy</a>
        </div>
    </div>
    <!-- =============== KOMUNITAS END =============== -->

    <!-- =============== FOOTER START =============== -->
    <?php include 'partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->
    
    <!-- <BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR> -->

    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>
</body>
</html>