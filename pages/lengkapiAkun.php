<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Profilmu</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
    <div class="sectionLeft">
        <form action="" class="signForm coplateAccount">
            <h3>COMPLITE YOUR PROFILE</h3>
            <div class="step">
                <p>step 1/4</p>
                <label for="profilePhoto">FOTO PROFILMU</label>
                <input type="file" name="profilePhoto">
                <label for="motivationQuote">KALIMAT PENYEMANGATMU</label>
                <input type="text" name="motivationQuote">
                <label for="yourPhoto">FOTO TENTANGMU</label>
                <input type="file" name="yourPhoto">
                <br>
            </div>
            <div class="step">
                <p>step 2/4</p>
                <label for="favPlace">FOTO TEMPAT FAFORITMU</label>
                <input type="file" name="favPlace">
                <label for="bestPhoto1">DUA FOTO TERKECEMU</label>
                <input type="file" name="bestPhoto1">
                <input type="file" name="bestPhoto2">
                <br>
            </div>
            
            <div class="step">
                <p>step 3/4</p>
                <label for="fb">FACEBOOK <p>*boleh kosong</p></label>
                <input type="text" name="fb">
                <label for="ig">INSTAGRAM <p>*boleh kosong</p></label>
                <input type="text" name="ig">
                <label for="tw">TWITER <p>*boleh kosong</p></label>
                <input type="text" name="tw">
                <label for="web">WEBSITE <p>*boleh kosong</p></label>
                <input type="text" name="web">
                <br>
            </div>
            
            <div class="step">
                <p>step 4/4</p>
                <label for="camera">KAMERA</label>
                <input type="text" name="camera">
                <label for="lensa">LENSA</label>
                <input type="text" name="lensa">
                <label for="filter">FILTER</label>
                <input type="text" name="filter">
                <label for="tripod">TRIPOD</label>
                <input type="text" name="tripod">
                <button type="submit" name="finishAccount" class="btn">SELESAI</button>
            </div>
        </form>
    </div>
    <div class="sectionRight" style="background-image: url(../img/login/singup.jpg);"></div>

</body>
</html>