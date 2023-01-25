<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    // Pengecekan dan pembuatan idActive dari GET atau SESSION
    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' && !isset($_GET['idActive']) ){
        $idActive = $_SESSION['idActive'];
        $linkBack = '../profile/magazine.php';
    } else if( isset($_GET['id']) && $_GET['id'] != '' ){
        $idActive = $_GET['id'];
        $linkBack = '../profile/magazine.php?idActive='.$_GET['id'];
    }

    // Pengecekan data jalan dan tanggal pada GET
    if( !isset($_GET['jalan']) && !isset($_GET['tgl']) && !isset($_GET['id']) ){
        echo' <script>
                window.location.href = "' . $urlToRoot . '";
            </script>
        ';
    }

    // Pengecekan perintah penghapusan foto magazine
    if( isset($_POST['delete']) ){
        if( deleteImageMagazine($_POST['id_magazine']) > 0 ){
            alert(true, false, 'Berhasil!', 'Foto berhasil dihapus.');
            unlink( $urlToRoot . 'img/magazine/' . $_POST['foto_magazine'] );
        } else{
            alert(true, false, 'Gagal!', 'Terdapat error saat penghapusan.');
        }
        echo' <script>
                setTimeout(() => {
                    window.location.href = "' . $urlToRoot . 'profile/magazine.php";
                }, 2000);
            </script>
        ';
    }

    // Pengecekan penambahan foto ke cart
    if( isset($_POST['addToCart']) ){
        if (isset($_COOKIE["keranjang"])) {
            $cookie_data = stripslashes($_COOKIE['keranjang']);
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
    
        $item_id_list = array_column($cart_data, 'item_id');
    
        if (in_array($_POST["idMagazine"], $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $_POST["idMagazine"]) {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        } else {
            $item_array = array(
                'item_id'			=>	$_POST["idMagazine"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $cart_data[] = $item_array;
        }

        $item_data = json_encode($cart_data);
        setcookie('keranjang', $item_data, time() + (86400 * 30));
        // setcookie('keranjang', $item_data, time() - (86400 * 30));
        var_dump($_COOKIE['keranjang']);
        header("location:client.php?jalan=".$_GET['jalan'].'&tgl='.$_GET['tgl']."&id=".$_GET['id']."&success=1");
    }
    else if( isset($_GET['success']) && $_GET['success'] == '1'){
        alert(true, false, 'Yoss', 'Foto telah ditambahkan ke keranjang');
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "client.php?jalan='.$_GET['jalan'].'&tgl='.$_GET['tgl'].'&id='.$_GET['id'].'";
                }, 1000)
            </script>
        ';
    } else if( isset($_GET['success']) && $_GET['success'] != '1'){
        alert(true, false, 'Gagal', 'Foto gagal ditambahkan ke keranjang');
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "client.php?jalan='.$_GET['jalan'].'&tgl='.$_GET['tgl'].'&id='.$_GET['id'].'";
                }, 3000)
            </script>
        ';
    }

    $jalan = $_GET['jalan'];
    $tgl = $_GET['tgl'];

    $infos = displayImageMagazine($_GET['id'], $jalan, $tgl);
    // var_dump($infos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street</title>
    <link rel="stylesheet" href="../css/client.css">
</head>
<body>
    
    <!-- =============== NAVBAR START =============== -->
    <?php include '../partials/navbar.php' ?>
    <!-- =============== NAVBAR END =============== -->

    <?php
        include '../partials/bookmark.php';

        $random = array_rand($infos);

        setBookmark('url(../img/magazine/' . $infos[$random]['foto_magazine'] . ')', 'Jl. Aja Dulu', false, $tgl = date('l, d M Y '));
    ?>

    <!-- Menyetel link pada tombol kembali -->
    <?php
    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' && !isset($_GET['id']) ){
        echo'
            <div class="secBackBtn" id="secBackBtn">
                <a href="'.$linkBack.'" class="btnArrow"><div class="arrow"></div>Kembali</a>
            </div>
        ';
    } else{
        echo'
            <div class="secBackBtn" id="secBackBtn">
                <a href="../profile/magazine.php?idActive='.$_GET['id'].'" class="btnArrow"><div class="arrow"></div>Kembali</a>
            </div>
        ';
    }
    ?>

    <div class="container" id="container">

        <?php foreach($infos as $data) : ?>

        <div class="card">
            <div class="image" style="background-image: url(../img/magazine/<?= $data['foto_magazine'] ?>);">
                <div class="watermark"></div>
            </div>
            <div class="info">
                <h2><?= substr($data['foto_magazine'], 15) ?></h2>
                <p>Tanggal: <?= $tgl = $data['tgl_upload'] ?></p>
                <p class="harga">Harga: 5000</p>
                <form action="" method="post" class="action">
                    <input type="text" spellcheck="false" name="idMagazine" value="<?= $data['id_magazine'] ?>" hidden>
                    <input type="text" spellcheck="false" name="quantity" value="1" hidden>
                    <?php
                        if( isset($_SESSION['idActive']) && $_GET['id'] == $idActive ){
                            echo'<button type="submit" name="delete" class="circle delete"><div class="icon iconDelete"></div></button>';
                        } else{
                            echo'<button type="submit" name="addToCart" class="circle add"><div class="icon iconAdd"></div></button>';
                        }
                    ?>
                </form>
            </div>
        </div>

        <?php endforeach; ?>

    </div>

    <!-- =============== FOOTER START =============== -->
    <?php include '../partials/footer.php' ?>
    <!-- =============== FOOTER END =============== -->

    <script src="../js/navbar.js"></script>
</body>
</html>