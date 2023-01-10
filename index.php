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
            <a href="#" class="btn">Daftar Kuy</a>
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
        setBookmark('home/bookmark1.png', 'Sang 3 Besar', 'streetHub.png', false);
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
    
    <!-- =============== PORTPOLIO END =============== -->
    
    <BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR><BR></BR>

    <script src="js/script.js"></script>
</body>
</html>