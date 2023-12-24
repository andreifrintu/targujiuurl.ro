<?php

    /*
    
        Website developed by Andrei Frîntu
        Critical maintenance @ codulluiandrei.ro

        Version:    1.3@main:targujiuurl.ro
        Stage:      testing@subdomain
        Contact:    admin@codulluiandrei.ro

    */

    /* database connection variables */
    include("config.php");
    session_start();
    
    /* init connection */
    $conn = mysqli_connect($db['server'], $db['user'], $db['password'], $db['name']);
    /* check connection activity */
    if (!$conn)
        echo "Conexiunea a eșuat!";

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $query = mysqli_query($conn, "SELECT `id`, `pass` FROM `login` WHERE `user` = '$user'");

        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $storedPassword = $result['pass'];
            if (password_verify($pass, $storedPassword)) {

                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $storedPassword;
                header("Location: index.php");
            } else {
                echo "Parolă sau user greșit!";
            }
        } else {
            echo "Utilizator invalid!";
        }
    
    }
    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
        $user = mysqli_real_escape_string($conn, $_SESSION['user']);
        $pass = mysqli_real_escape_string($conn, $_SESSION['pass']);

        $query = mysqli_query($conn, "SELECT `id`, `pass` FROM `login` WHERE `user` = '$user'");

        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $storedPassword = $result['pass'];
            if ($pass == $result['pass'])
                header("Location: index.php");  
        }

    }
    if (isset($_GET['logout'])) {
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login @ Târgu Jiu - Capitala Tineretului</title>
    <link rel="icon" type="image/x-icon" href="/targujiuurl.ro/favicon.ico">

    <link href="/targujiuurl.ro/static/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="login vh-100 d-flex align-items-center justify-content-center text-center text-white">

    <div class="container-fluid diagonal">
        <div class="rev-diagonal px-2 text-center">
            <h1 class="mb-3">Conectează-te la panoul de administrare al paginii<br><b class="text-white">Târgu Jiu - Capitala Tineretului</b></h1>
            <form method="POST" class="flex-column d-flex gap-2">
                <input name="user" class="form-control fw-bold border border-2 border-white rounded bg-transparent p-2 fs-4 text-white" style="" type="text" autocomplete="off" placeholder="User">
                <input name="pass" class="form-control fw-bold border border-2 border-white rounded bg-transparent p-2 fs-4 text-white" style="" type="password" autocomplete="off" placeholder="Parola">
                <button type="submit" class="btn btn-lg fs-4 btn-outline-light fw-bold">Conectează-te</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>