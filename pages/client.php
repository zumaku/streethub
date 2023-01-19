<?php
    session_start();
    include '../function/function.php';
    $urlToRoot = '../';

    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' ){
        $idActive = $_SESSION['idActive'];
        $linkBack = '../profile/magazine.php';
    } else if( isset($_GET['idActive']) && $_GET['idActive'] != '' ){
        $idActive = $_GET['idActive'];
        $linkBack = '../profile/magazine.php?idActive=' . $idActive;
    }

    if( !isset($_GET['jalan']) && !isset($_GET['tgl']) ){
        echo' <script>
            window.location.href = "' . $urlToRoot . 'profile/magazine.php";
            </script>
        ';
    }

    $jalan = $_GET['jalan'];
    $tgl = $_GET['tgl'];
    // $tgl = date('l, d M Y ');

    $infos = displayImageMagazine($idActive, $jalan, $tgl);
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

    <div class="secBackBtn" id="secBackBtn">
        <a href="<?= $linkBack ?>" class="btnArrow"><div class="arrow"></div>Kembali</a>
    </div>

    <div class="container" id="container">

        <?php foreach($infos as $data) : ?>

        <div class="card">
            <div class="image" style="background-image: url(../img/magazine/<?= $data['foto_magazine'] ?>);">
                <div class="watermark"></div>
            </div>
            <div class="info">
                <h2><?= substr($data['foto_magazine'], 15) ?></h2>
                <p>Tanggal: <?= $tgl = date('d/m/y') ?></p>
                <p class="harga">Harga: 5000</p>
                <form action="" method="post" class="action">
                    <input type="text" name="id_magazine" value="<?= $data['id_magazine'] ?>">
                    <button class="circle"><div class="icon iconAdd"></div></button>
                    <button type="submit" name="delete" class="circle"><div class="icon iconDelete"></div></button>
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