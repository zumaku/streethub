<?php
include 'function/conection.php';
include 'function/loginFunction.php';

$query = mysqli_query($koneksi, "SELECT * FROM $tblAccount");



if(isset($_POST['submit'])){
    $foto = $_FILES['foto'];
    storePhoto($foto, 'img/account/uji');
    $fotobakka = $_FILES['fotoBakka'];
    $nama = storePhoto($fotobakka, 'img/account/uji/bakka');
    echo' <script> alert("' . $nama . '"); </script> ';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJI COBA SIGNUP</title>
</head>
<body>
    
    <?php foreach ($query as $q): ?>
        <h1>Nama: <?= $q['username'] ?></h1>
        <h2>Email: <?= $q['email'] ?></h2>
        <h2>Password: <?= $q['password'] ?></h2>
    <?php endforeach; ?>

    <a href="pages/login.php">LOGIN BOS</a>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="foto">
        <input type="file" name="fotoBakka">
        <button type="submit" name="submit">Kirim</button>
    </form>

</body>
</html>