<?php
session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    $cookie_data = stripslashes($_COOKIE['keranjang']);
    $cart_data = json_decode($cookie_data, true);

    if( isset($_SESSION['idActive']) ){
        $idActive = $_SESSION['idActive'];
    }


    // Pengecekan kode kupon
    if( isset($_POST['checkKupon']) && $_POST['kodeKupon'] == '15Seb03' ){
        $potongan = 10000;
    }
    else{
        $potongan = 0;
    }

    // saat delete
    if( isset($_GET['delete']) && isset($_GET['id']) ){
        if( $_GET['delete'] == 1 ){
            $cookie_data = stripslashes($_COOKIE['keranjang']);
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]['item_id'] == $_GET["id"]) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    setcookie("keranjang", $item_data, time() + (86400 * 30));
                    header("location:keranjang.php?remove=1");
                }
            }
        }
    }

    $alertku = '';
    if( isset($_GET['remove']) && $_GET['remove'] == 1 ){
        $alertku = '
            <div class="alertDelete" id="alertDelete">
                <p>Foto telah dihapus dari keranjang.</p>
                <a href="keranjang.php"><div class="close"></div></a>
            </div>
        ';
    }
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
            <?= $alertku ?>

            <?php
            if( empty($cart_data) ){
                echo'
                <div class="card empty">                
                    <div class="icon"></div>
                    <h3>Keranjang anda kosong</h3>
                </div>
                ';
            }
            $totalKeseluruhan = 0;
            foreach($cart_data as $key => $values):
                $hasil = takeMagazine($values['item_id']);
                $author = takeAccount($hasil['id_user']);
                $imgAuthor = takeProfile($hasil['id_user']);
                $totalFoto = 0;
                $totalFoto += ($values["item_quantity"] * 5000);
            ?>

            <div class="card">
                <div class="image" style="background-image: url(../img/magazine/<?= $hasil['foto_magazine'] ?>);">
                    <div class="watermark"></div>
                </div>
                <div class="info">
                    <div class="upper">
                        <a href="../profile/magazine.php?idActive=<?= $author['id_user'] ?>" class="author">
                            <div class="profile" style="background-image: url(../img/account/profile/<?= $imgAuthor['foto_profile'] ?>);"></div>
                            <h3><?= $author['username'] ?></h3>
                        </a>
                        <p><Span>Tanggal: </Span><?= $hasil['tgl_upload'] ?></p>
                        <p><Span>Jalan: </Span><?= $hasil['nama_jalan'] ?></p>
                        <p><Span>Jumlah: </Span><?= $values['item_quantity'] ?></p>
                    </div>
                    <div class="price">
                        <h3><span>Harga</span>: <?= $totalFoto ?></h3>
                        <a href="?delete=1&id=<?= $values['item_id'] ?>" type="submit" class="btn">Hapus</a>
                    </div>
                </div>
            </div>

            <?php
            $totalKeseluruhan += $totalFoto;
            endforeach;
            ?>

        </div>
        <div class="rightSect">
            <h1>Keranjangmu</h1>
            <table>
                <tr>
                    <td><p>Sub total</p></td>
                    <td><p>Rp. <?= $totalKeseluruhan ?></p></td>
                </tr>
                <tr>
                    <td colspan="2"><p>Kode kupon</p></td>
                </tr>
                <tr class="kupon">
                    <td colspan="2">
                        <form action="" method="post">
                            <input type="text" spellcheck="false" name="kodeKupon">
                            <button type="submit" name="checkKupon">Cek</button>
                        </form>
                    </td>
                </tr>
                
                <tr>
                    <td class="potongan"><p>Potongan</p></td>
                    <td class="potongan"><p>Rp. <?= $potongan ?></p></td>
                </tr>
                <tr>
                    <td><p class="total">Total</p></td>
                    <td><p class="total">Rp. <?= $totalKeseluruhan - $potongan ?></p></td>
                </tr>
                <tr><td colspan="2"><button type="submuit" class="btn checkout">Check out</button></td></tr>
                <tr><td colspan="2"><button type="submuit" class="dana btn"><div class="logo"></div></button></td></tr>
            </table>
        </div>
    </div>

    <script src="../js/navbar.js"></script>
    <script>
        // const alertDelete = document.querySelector(".alertDelete#alertDelete");
        // const btnDelete = alertDelete.querySelector(".close");
        // alertDelete.addEventListener("click", (e)=>{
        //     if( e.target == btnDelete ){
        //         alertDelete.style.display = "none";
        //     }
        // });
    </script>
</body>
</html>