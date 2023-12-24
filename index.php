<?php

    /*

        Website developed by Andrei Frîntu
        Critical maintenance @ codulluiandrei.ro

        Version:    1.1@main:targujiuurl.ro
        Stage:      dev@localhost
        Contact:    admin@codulluiandrei.ro

    */   
    
    /* database connection variables */
    include("admin/config.php");
          
    /* init connection */
    $conn = mysqli_connect($db['server'], $db['user'], $db['password'], $db['name']);
    /* check connection activity */
    if (!$conn)
        echo "Conexiunea a eșuat!";

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Târgu Jiu - Capitala Tineretului</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="static/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <section class="hero mb-3">
        <nav class="navbar bg-white w-100 d-flex align-items-center justify-content-center pt-5">
            <img alt="" src="static/logo/color.png" height="75px">
        </nav>
        <nav class="py-2 bg-body-tertiary border-top">
            <ul class="nav me-auto d-flex justify-content-center">
                <li class="nav-item"><a href="#misiune" class="nav-link link-body-emphasis px-3">Misiune</a></li>
                <li class="nav-item"><a href="#activitati" class="nav-link link-body-emphasis px-3">Activități</a></li>
                <li class="nav-item"><a href="#implica-te" class="nav-link link-body-emphasis px-3">Implică-te</a></li>
            </ul>
        </nav>
    </section>

    <div class="invisible p-5"></div>

    <div class="diagonal" id="misiune">
        <div class="rev-diagonal px-2 text-center">
            <h1 class="fw-bold text-center fs-1 text-white">Care este misiunea noastră?</h1>
            <p class="fs-3 w-75 m-auto">Prin proiectul nostru dorim să creăm o comunitate liberă și unită<wbr>pentru tinerii din oraș</p>
        </div>
    </div>

    <div class="invisible p-5"></div>

    <section class="footer justify-content-center align-items-center d-flex">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-center align-items-center pb-3 mb-4 mt-5 pt-5">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-white text-decoration-none lh-1"><img src="static/logo/mono white.png" height="80px"></a>
                    <span class="mb-3 mb-md-0 text-white">&copy; 2023 Târgu Jiu URL</span>
                </div>
                
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.facebook.com/youthURL"><img src="static/icons/icons8-facebook-96.png" height="32px"></a></li>
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.instagram.com/targujiu_url"><img src="static/icons/icons8-instagram-96.png" height="32px"></a></li>
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.tiktok.com/@targujiu_url"><img src="static/icons/icons8-tiktok-96.png" height="32px"></a></li>
                </ul>
            </footer>
            <h5 class="text-white text-center">Dezvoltat de <a target="_blank" href="https://codulluiandrei.ro/">@andreifrintu</a></h5>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>