<?php
    include '../function/function.php';
    $urlToRoot = '../';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjag</title>
    <link rel="stylesheet" href="../css/keranjang.css">
</head>
<body>
    
    <?php
    include '../partials/navbar.php';
    ?>

    <div class="keranjangSect">
        <div class="leftSect">
            <div class="card">
                <div class="image" style="background-image: url(../img/magazine/63c6ddea612996.20979080.jpg);">
                    <div class="watermark"></div>
                </div>
                <div class="info">
                    <div class="upper">
                        <a href="#" class="author">
                            <div class="profile" style="background-image: url(../img/account/profile/63c3e4afc62200.72883152.jpg);"></div>
                            <h3>Nurul Habibie</h3>
                        </a>
                        <p><Span>Tanggal: </Span>31 Desember 2022</p>
                        <p><Span>Jalan: </Span>Jl. Kemana Aja</p>
                    </div>
                    <div class="price">
                        <h3><span>Harga</span>: 50000</h3>
                        <a href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image" style="background-image: url(../img/magazine/63c7e31bbf68f5.51795426.jpg);">
                    <div class="watermark"></div>
                </div>
                <div class="info">
                    <div class="upper">
                        <a href="#" class="author">
                            <div class="profile" style="background-image: url(../img/account/profile/63c93b375ae038.19046329.jpg);"></div>
                            <h3>John Doe</h3>
                        </a>
                        <p><Span>Tanggal: </Span>31 Desember 2022</p>
                        <p><Span>Jalan: </Span>Jl. Kemana Aja</p>
                    </div>
                    <div class="price">
                        <h3><span>Harga</span>: 50000</h3>
                        <a href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image" style="background-image: url(../img/magazine/63c7e742e23600.28294327.jpg);">
                    <div class="watermark"></div>
                </div>
                <div class="info">
                    <div class="upper">
                        <a href="#" class="author">
                            <div class="profile" style="background-image: url(../img/account/profile/63c3e4afc62200.72883152.jpg);"></div>
                            <h3>Nurul Habibie</h3>
                        </a>
                        <p><Span>Tanggal: </Span>30 Desember 2022</p>
                        <p><Span>Jalan: </Span>Jl. Kemana Aja</p>
                    </div>
                    <div class="price">
                        <h3><span>Harga</span>: 50000</h3>
                        <a href="#">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightSect">
            <h1>Keranjangmu</h1>
            <table>
                <tr>
                    <td><p>Sub total</p></td>
                    <td><p>55000</p></td>
                </tr>
                <tr>
                    <td><p>Kode kupon</p></td>
                </tr>
                <tr>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><p>Potongan</p></td>
                    <td><p>10000</p></td>
                </tr>
                <tr>
                    <td><p class="total">Total</p></td>
                    <td><p class="total">45000</p></td>
                </tr>
                <tr><td colspan="2"><button type="submuit" class="btn checkout">Check out</button></td></tr>
                <tr><td colspan="2"><button type="submuit" class="dana btn"><div class="logo"></div></button></td></tr>
            </table>
        </div>
    </div>

    <script src="../js/navbar.js"></script>
</body>
</html>