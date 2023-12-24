<?php

    /*

        Website developed by Andrei Frîntu
        Critical maintenance @ codulluiandrei.ro

        Version:    1.3@main:targujiuurl.ro
        Stage:      testing@subdomain
        Contact:    admin@codulluiandrei.ro

    */   
    
    /* database connection variables */
    include("admin/config.php");
          
    /* init connection */
    $conn = mysqli_connect($db['server'], $db['user'], $db['password'], $db['name']);
    /* check connection activity */
    if (!$conn)
        echo "Conexiunea a eșuat!";

    if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = substr($url, 0, -1);
            
            $cover = mysqli_fetch_row(mysqli_query($conn, "SELECT `cover` FROM `activities` WHERE `url` = '$url'"))[0];
            $content = mysqli_fetch_row(mysqli_query($conn, "SELECT `content` FROM `activities` WHERE `url` = '$url'"))[0];
            $title = mysqli_fetch_row(mysqli_query($conn, "SELECT `title` FROM `activities` WHERE `url` = '$url'"))[0];
        }
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Târgu Jiu - Capitala Tineretului</title>
    <link rel="icon" type="image/x-icon" href="/targujiuurl.ro/favicon.ico">

    <link href="/targujiuurl.ro/static/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="middle">

    <div class="loader-container">
        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <section class="mb-3">
        <nav class="navbar bg-white w-100 d-flex align-items-center justify-content-center pt-5">
            <img alt="" src="/targujiuurl.ro/static/logo/color.png" height="75px">
        </nav>
        <nav class="py-2 bg-body-tertiary border-top">
            <ul class="nav me-auto d-flex justify-content-center">
                <li class="nav-item"><a href="/targujiuurl.ro/" class="nav-link link-body-emphasis px-3">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="#253779" xmlns="http://www.w3.org/2000/svg"><path d="M20 11H7.414l4.293-4.293a1 1 0 0 0-1.414-1.414l-6 6a1 1 0 0 0 0 1.414l6 6a1 1 0 0 0 1.414-1.414L7.414 13H20a1 1 0 0 0 0-2z"/></svg>
                </a></li>
            </ul>
        </nav>
    </section>

    <div class="invisible p-5"></div>

    <div class="w-90 m-auto d-flex fl-cont justify-content-center align-items-center gap-2">
        <div class="w-md-50">
            <img alt="" src="<?php echo $cover; ?>" class="img-fluid rounded">    
        </div>
        <div class="w-md-50 text-justify text-white">
            <h1 class="text-center mt-2 fw-bold"><?php echo $title; ?></h1>
            <p class="fs-4"><?php echo $content; ?></p>
        </div>
    </div>
    
    <section class="footer justify-content-center align-items-center d-flex">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-center align-items-center pb-3 mb-4 mt-5 pt-5">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-white text-decoration-none lh-1"><img src="/targujiuurl.ro/static/logo/mono white.png" height="80px"></a>
                    <span class="mb-3 mb-md-0 text-white">&copy; 2023 Târgu Jiu URL</span>
                </div>
                
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.facebook.com/youthURL"><img src="/targujiuurl.ro/static/icons/icons8-facebook-96.png" height="32px"></a></li>
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.instagram.com/targujiu_url"><img src="/targujiuurl.ro/static/icons/icons8-instagram-96.png" height="32px"></a></li>
                    <li class="ms-3"><a target="_blank" class="text-body-secondary" href="https://www.tiktok.com/@targujiu_url"><img src="/targujiuurl.ro/static/icons/icons8-tiktok-96.png" height="32px"></a></li>
                </ul>
            </footer>
            <h5 class="text-white text-center">Dezvoltat de <a target="_blank" href="https://codulluiandrei.ro/">@andreifrintu</a></h5>
        </div>
    </section>
    
    <script>
        const loaderContainer = document.querySelector('.loader-container');
        window.addEventListener('load', () => {
            loaderContainer.style.display = 'none';
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>