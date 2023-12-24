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
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>