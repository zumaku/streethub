<?php
session_start();

if( !isset($_SESSION['lanjutkan']) ){
    echo' <script> window.location.href = "ujiCobaSignup.php"; </script> ';
}

echo' <script> alert( ' . $_SESSION['lanjutkan'] . ' ); </script> ';
session_destroy();

if( isset($_POST['lanjut']) ){
    session_start();
    $_SESSION['lanjutlagi'] = 'lanjutlagi';
    echo' <script> window.location.href = "tujuanAkhir.php"; </script> ';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hlm crate session</title>
</head>
<body>
    
    <form action="" method="post">
        <button type="submit" name="lanjut">LANJUT</button>
    </form>

</body>
</html>