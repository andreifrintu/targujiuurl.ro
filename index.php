<?php

    /*

        Website developed by Andrei Frîntu
        Critical maintenance @ codulluiandrei.ro

        Version:    1.3@main:targujiuurl.ro
        Stage:      testing@subdomain
        Contact:    admin@codulluiandrei.ro

    */   
    
    /* disable errors */
    error_reporting(E_ERROR | E_PARSE);
    
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
<body class="middle">
    
    <div class="loader-container">
        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <section class="hero mb-3">
        <nav class="navbar bg-white w-100 d-flex align-items-center justify-content-center pt-5">
            <img alt="" src="static/logo/color.png" height="75px">
        </nav>
        <nav class="py-2 bg-body-tertiary border-top">
            <ul class="nav me-auto d-flex justify-content-center">
                <li class="nav-item"><a href="#despre-url" class="nav-link link-body-emphasis px-3">Despre URL</a></li>
                <li class="nav-item"><a href="#activitati" class="nav-link link-body-emphasis px-3">Activități</a></li>
                <li class="nav-item"><a href="#implica-te" class="nav-link link-body-emphasis px-3">Implică-te</a></li>
            </ul>
        </nav>
    </section>

    <div class="invisible p-5"></div>

    <div class="diagonal" id="despre-url">
        <div class="rev-diagonal px-2 text-center">
            <h1 class="fw-bold text-center fs-1 text-white">Care este scopul nostru?</h1>
            <p class="fs-3 w-md-50 m-auto">Conceptul programului se numește <span class="fw-bold">YOUth URL</span> pentru că va pune pe hartă, atât fizic, cât și digital orașul Târgu-Jiu ca referință pentru tineri în 2023!</p>
            <a href="despre-url/" class="m-auto"><button class="btn btn-lg m-auto btn-outline-light fw-bold mt-2">Află mai mult!</button></a>
        </div>
    </div>

    <div class="invisible p-5"></div>

    <section class="" id="activitati">

        <div class="invisible p-5"></div>
        
        <div class="text-center mt-3">
            <h1 class="fw-bold" style="color: #fff;">ACTIVITĂȚILE NOASTRE</h1>
            <p class="fs-3 d-flex fl-cont text-center justify-content-center align-items-center gap-2 text-white fw-bold">vizualizezi luna 
                <select class="form-select form-select-lg text-center fs-3 text-white fw-bold" style="background: none; border: none; width: auto !important; padding: 0;">
                    <option value="12" <?php echo ((isset($_GET['m']) && $_GET['m'] == 12) || (!isset($_GET['m']))) ? "selected" : ""; ?>>decembrie</option></a>
                    <option value="11" <?php echo (isset($_GET['m']) && $_GET['m'] == 11) ? "selected" : ""; ?>>noiembrie</option>
                    <option value="10" <?php echo (isset($_GET['m']) && $_GET['m'] == 10) ? "selected" : ""; ?>>octombrie</option>
                    <option value="9" <?php echo (isset($_GET['m']) && $_GET['m'] == 9) ? "selected" : ""; ?>>septembrie</option>
                    <option value="8" <?php echo (isset($_GET['m']) && $_GET['m'] == 8) ? "selected" : ""; ?>>august</option>
                    <option value="7" <?php echo (isset($_GET['m']) && $_GET['m'] == 7) ? "selected" : ""; ?>>iulie</option>
                    <option value="6" <?php echo (isset($_GET['m']) && $_GET['m'] == 6) ? "selected" : ""; ?>>iunie</option>
                    <option value="5" <?php echo (isset($_GET['m']) && $_GET['m'] == 5) ? "selected" : ""; ?>>mai</option>
                    <option value="4" <?php echo (isset($_GET['m']) && $_GET['m'] == 4) ? "selected" : ""; ?>>aprilie</option>
                    <option value="3" <?php echo (isset($_GET['m']) && $_GET['m'] == 3) ? "selected" : ""; ?>>martie</option>
                    <option value="2" <?php echo (isset($_GET['m']) && $_GET['m'] == 2) ? "selected" : ""; ?>>februarie</option>
                    <option value="1" <?php echo (isset($_GET['m']) && $_GET['m'] == 1) ? "selected" : ""; ?>>ianuarie</option>
                </select> 
                a anului 
                <select class="form-select form-select-lg text-center fs-3 text-white fw-bold" style="background: none; border: none; width: auto !important; padding: 0;">
                    <option value="2023" <?php echo ((isset($_GET['y']) && $_GET['y'] == 2023) || (!isset($_GET['m']))) ? "selected" : ""; ?>>2023</option>
                    <option value="2022" <?php echo (isset($_GET['y']) && $_GET['y'] == 2022) ? "selected" : ""; ?>>2022</option>
                </select>
            </p>
        </div>

        <div class="d-flex flex-column fl-cont fs-3 p-2">
<?php
            
                $year = (isset($_GET['y'])) ? $_GET['y'] : 2023;
                $month = (isset($_GET['m'])) ? $_GET['m'] : 12;
                $date = 1;
                
                $day = date('w', strtotime($year . "-" . $month . "-" . $date));
                switch($day) {
                    case 0 : $day = 7; break;
                    case 1 : $day = 1; break;
                    case 2 : $day = 2; break;
                    case 3 : $day = 3; break;
                    case 4 : $day = 4; break;
                    case 5 : $day = 5; break;
                    case 6 : $day = 6;
                }
                $last = 1;
                $lastday = date('t', strtotime($year . "-" . $month . "-01")) + $day;
?>
            <div class="fl-cont flex-sm-row text-center text-white d-sm-none">
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">LUNI</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">MARȚI</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">MIERCURI</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">JOI</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">VINERI</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">SÂMBĂTĂ</div>
                <div class="w-100 rounded" style="text-shadow: 0 0 3px var(--galben), 0 0 5px var(--albastru);">DUMINICĂ</div>
            </div><div class="d-flex fl-cont flex-sm-row">
<?php
        
                $activities_array = array();
                class Activity {
                    public $title, $cover, $content, $duration, $url;
                };

                $query = mysqli_query($conn, "SELECT `url`, `cover`, `duration`, `date` FROM `activities` WHERE `month` = $month ORDER BY `date`");            
                while ($db = mysqli_fetch_assoc($query)) {
                    $activity_object = new Activity();
                    
                    $url = $db['url'];
                    $cover = $db['cover'];
                    $duration = $db['duration'];
                    $date = $db['date'];                 
                    
                    $activity_object->url = $url;
                    $activity_object->cover = $cover;
                    $activity_object->duration = $duration;
                    $activities_array[$date] = $activity_object;
                }
                
                while ($last < $day) {
                    echo '<div class="bg-dark w-100 p-5 card rounded invisible">' . $last . '</div>';
                    $last = $last + 1;
                }

                while ($last < $lastday) {
                    $free = 1;  
                    if ($activities_array[$last - $day + 1]->cover != '') {
                        if ($activities_array[$last - $day + 1]->duration <= 1)
                            echo '<a class="w-100 p-5 card border border-white rounded mb-3 bg-transparent fs-2" href="' . $activities_array[$last - $day + 1]->url . '/" style="background-image: url(' . $activities_array[$last - $day + 1]->cover . ');">' . ($last - $day + 1) . '</a>';
                        else {
                            
                            for ($i = 1; $i <= $activities_array[$last - $day + 1]->duration && $free < $activities_array[$last - $day + 1]->duration; $i = $i + 1)
                                if ($activities_array[$last - $day + 1 + $i]->cover != '')
                                    break;
                                else 
                                    $free = $free + 1;
                                    
                            echo '<a class="w-100 p-5 card border border-white rounded mb-3 bg-transparent fs-2" href="' . $activities_array[$last - $day + 1]->url . '/" style="flex-grow: ' . $free . '; background-image: url(' . $activities_array[$last - $day + 1]->cover . ');">' . ($last - $day + 1 . " - " . ($last - $day + $activities_array[$last - $day + 1]->duration)) . '</a>';
                        }
                    }
                    else
                        echo '<div class="w-100 p-5 card border border-white rounded mb-3 bg-transparent fs-2" style="background-image: url(static/logo/mono%20white.png);">' . ($last - $day + 1) . '</div>';
                        
                    if ($last % 7 == 0)
                        echo '</div><div class="d-flex fl-cont flex-sm-row">';
                    $duration = ($free) ? $free : (($activities_array[$last - $day + 1]->duration > 1) ? $activities_array[$last - $day + 1]->duration : 1);
                    $last = $last + $duration;
                    if (($last - 1) % 7 == 0)
                        echo '</div><div class="d-flex fl-cont flex-sm-row">';
                }
?>
            </div>
        </div>

    </section>

    <div class="invisible p-5"></div>

    <div class="diagonal diagonal_sec p-5 mt-3" id="implica-te">
        <div class="rev-diagonal_sec px-2 text-center">
            <h1 class="fw-bold text-center fs-1 text-white">Implică-te în program!</h1>
            <p class="fs-3 w-75 m-auto">Completează formular de mai jos și noi te vom contacta</p>
            <?php
            
                if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['plan']) && isset($_POST['mesaj'])) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
                    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
                    $mesaj = mysqli_real_escape_string($conn, $_POST['mesaj']);
                    
                    $mesaj_final = $name . " a trimis urmatoarele informatii in formularul de inscriere: Mail: " . $mail . " Plan: " . $plan . " Mesaj: " . $mesaj;
                    
                    mail("frintu.andrei07@gmail.com", "O persoana noua vrea sa se implice!", $mesaj_final, "From: no-reply@targujiuurl.ro");
                    echo "<script>alert('Mesajul tău a fost trimis cu succes!')</script>";
                }
                
            ?>
            <form method="POST">
                <input required name="name" type="text" class="form-control fw-bold mb-2" placeholder="Numele și prenumele tău...">
                <input required name="mail" type="text" class="form-control fw-bold mb-2" placeholder="Adresa ta de E-mail...">
                <input required name="plan" type="text" class="form-control fw-bold mb-2" placeholder="Care este planul tău pentru mâine?">
                <textarea name="mesaj" class="form-control mb-2" placeholder="Mesajul tău..." style="height: 100px"></textarea>
                <button type="submit" class="btn btn-lg btn-outline-light fw-bold">Trimite mesajul</button>
            </form>
        </div>
    </div>

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