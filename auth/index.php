<?php
    session_start();
    include '../function/function.php';
    include '../function/loginFunction.php';

    if( isset($_SESSION['idActive']) && $_SESSION['idActive'] != '' ){
        echo'
            <script>
                setTimeout(()=>{
                    window.location.href = "..";
                }, 3000);
            </script>
        ';
        alert(false, true, 'Perhatian!', 'Anda Telah Login');
    }

    $signPhoto = [
        'sign\ \(1\).jpg',
        'sign\ \(2\).jpg',
        'sign\ \(3\).jpg',
        'sign\ \(4\).jpg',
        'sign\ \(5\).jpg',
        'sign\ \(6\).jpg',
        'sign\ \(7\).jpg',
        'sign\ \(8\).jpg',
        'sign\ \(9\).jpg',
        'sign\ \(10\).jpg'
    ];
    $randIndex = array_rand($signPhoto);

    if(isset($_POST['signup'])){
        if(signup($_POST) > 0){
            // Mengambil id akun yang baru dibuat dan membuatkannya session
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $id = mysqli_query($koneksi, "SELECT `id_user` FROM $tblAccount WHERE username = '$username'");

            $_SESSION['idNewUser'] = mysqli_fetch_row($id);
            // var_dump(mysqli_fetch_row($id));

            echo'
                <script>
                    alert("Daftar Akun Berhasil");
                    window.location.href = "insertBio.php";
                </script>
            ';
        } else{
            echo'
            <script>
                alert("Daftar Akun GAGAL!!!");
                window.location.href = "login.php";
            </script>
        ';
        }
    } else if(isset($_POST['sigin'])){
        signin($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sales Website and Stock Photos">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Zul Fadli Ahmad">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon/streetHub.png" type="image/x-icon">
    <title>Akun</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body onclick="indexFunction()">

    <div class="sectionLeft">
        <div class="option">
            <div class="sign">
                <h3>SIGN <span>IN</span></h3>
                <h3>SIGN <span>UP</span></h3>
            </div>
            <div class="underline"></div>
        </div>
        <form action="" class="signForm" method="post">
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password">
            <a href="#">Lupa Password?</a>
            <button type="submit" name="sigin" class="btn">SIGN IN</button>
        </form>
        <form action="" class="signForm dnone" method="post">
            <label for="username">USER NAME</label>
            <input type="text" spellcheck="false" name="username" id="username">
            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password">
            <button name="signup" class="btn" id="signup">SIGN UP</button>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/resource/<?= $signPhoto[$randIndex] ?>);"></div>

    <script src="../js/login.js"></script>
</body>
</html>