<?php
session_start();

if( !isset($_SESSION['lanjutlagi']) ){
    echo' <script> window.location.href = "index.php"; </script> ';
}

echo $_SESSION['lanjutlagi'];
session_destroy();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>caidsbc</title>
</head>
<body>
    
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores a consequatur culpa molestias rerum distinctio facilis vero id. Atque aliquid enim at mollitia iste eum dolorum modi quisquam, et tempore.</p>

</body>
</html>