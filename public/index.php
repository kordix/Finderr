<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    // header('location:/views/login.php');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinder dla programistów</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    

</head>

<body>

<p id="login" style="display:none"><?php echo isset($_SESSION['login']) ? $_SESSION['login'] : '' ?></p>

    <div style="max-width:400px;margin:auto">
        <p id="authzone"></p>
        <!-- <a href="/api/logout.php"><button class="btn btn-secondary">Wyloguj</button></a>  -->
        
        <div><img class="img-fluid" style="max-height:300px" src="images/admin.jpg" alt="" id="profileimage"></div>

        <p id="name">Kordian</p>
        <p id="technologies">PHP JS LARAVEL VANILLAJS</p>
        <p id="localisation"><a href="https://www.google.com/maps/place/Wejherowo"> <i class="bi bi-geo-alt"></i>
                <span>Wejherowo</span></a> </p>
        <p id="description">Główny twórca strony</p>
        <button class="btn btn-warning"><i class="bi bi-sign-turn-left"></i></button>
        <button class="btn btn-danger">Nope</button>
        <button class="btn btn-success" id="next">Like</button>
        <br><br>
        <p style="margin-bottom:0px"><b>Kontakt:</b></p>
        <div id="kontakt">
            <a href="https://www.facebook.com/kordian.bober" target="_blank"><i class="bi bi-facebook"
                    style="font-size:50px"></i></a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="script.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>



</body>

</html>