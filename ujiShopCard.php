<?php
    include 'function/function.php';

    $hasil = mysqli_query($koneksi, "SELECT * FROM magazine");
    $magazines = [];
    while( $hua = mysqli_fetch_assoc($hasil) ){
        $magazines[] = $hua;
    }



    // Pembuatan cokkie
    if (isset($_POST["addToCart"])) {
        if (isset($_COOKIE["keranjang"])) {
            $cookie_data = stripslashes($_COOKIE['keranjang']);
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
    
        $item_id_list = array_column($cart_data, 'item_id');
    
        if (in_array($_POST["hidden_id"], $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $_POST["hidden_id"]) {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        } else {
            $item_array = array(
                'itemId'			=>	$_POST["idMagazine"],
                'itemJalan'			=>	$_POST["namaJalan"]
            );
            $cart_data[] = $item_array;
        }
    
    
        $item_data = json_encode($cart_data);
        setcookie('keranjang', $item_data, time() + (86400 * 30));
        header("location:ujiShopCard.php?success=1");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Shop Cart</title>
</head>
<body>
    
    <?php foreach($magazines as $data): ?>
        <form action="" method="post" class="card">
            <img src="img/magazine/<?= $data['foto_magazine'] ?>" alt="" width="200px"><br>
            <input type="text" spellcheck="false" name="idMagazine" value="<?= $data['id_magazine'] ?>"><br>
            <input type="text" spellcheck="false" name="namaJalan" value="<?= $data['nama_jalan'] ?>"><br>
            <button type="submit" name="addToCart">Add To Cart</button><br><br>
        </form>
    <?php endforeach; ?>

</body>
</html>