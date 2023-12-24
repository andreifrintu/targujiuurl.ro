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

    function text_to_url($text, string $divider = '-') {
        $text = strtolower($text);
        $text = str_replace("ț", "t", $text);
        $text = str_replace("ș", "s", $text);
        $text = str_replace("â", "a", $text);
        $text = str_replace("ă", "a", $text);
        $text = str_replace("î", "i", $text);
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
        $user = mysqli_real_escape_string($conn, $_SESSION['user']);
        $pass = mysqli_real_escape_string($conn, $_SESSION['pass']);

        $query = mysqli_query($conn, "SELECT `id`, `pass` FROM `login` WHERE `user` = '$user'");

        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $storedPassword = $result['pass'];
            if ($pass == $result['pass']) {

                if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['date']) && isset($_POST['duration'])) {
                    $title = mysqli_real_escape_string($conn, $_POST['title']);
                    $url = mysqli_real_escape_string($conn, text_to_url($title));
                    
                    $content = mysqli_real_escape_string($conn, $_POST['content']);
                    $duration = mysqli_real_escape_string($conn, $_POST['duration']);

                    $time = strtotime(mysqli_real_escape_string($conn, $_POST['date']));
                    $day = mysqli_real_escape_string($conn, date('w', $time));

                    switch($day) {
                        case 0 : $day = 7; break;
                        case 1 : $day = 1; break;
                        case 2 : $day = 2; break;
                        case 3 : $day = 3; break;
                        case 4 : $day = 4; break;
                        case 5 : $day = 5; break;
                        case 6 : $day = 6;
                    }

                    $date = mysqli_real_escape_string($conn, date('d', $time));
                    $month = mysqli_real_escape_string($conn, date('m', $time));
                    $year = mysqli_real_escape_string($conn, date('Y', $time));


                    $code = mysqli_real_escape_string($conn, sha1(mt_rand(100000, 999999)));
                    $photo = "/targujiuurl.ro/static/photos/" . $code . ".jpg";
                
                    if ($_FILES['cover']['error'] === UPLOAD_ERR_OK) {
                        $tempFile = $_FILES['cover']['tmp_name'];
                        $targetFile = $_SERVER['DOCUMENT_ROOT'] . $photo;
                        
                        if (move_uploaded_file($tempFile, $targetFile))
                            mysqli_query($conn, "INSERT INTO `activities`(`title`, `cover`, `content`, `duration`, `day`, `date`, `month`, `year`) VALUES ('$title', '$photo', '$content', '$duration', '$day', '$date', '$month', '$year')");
                    }
                }
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard @ targujiuurl.ro</title>
    <link rel="icon" type="image/x-icon" href="/targujiuurl.ro/favicon.ico">

    <link href="/targujiuurl.ro/static/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/9ud3yzwsyhmmz5ouf0oqcxnmco25qvzwdas39r4r8nqt1yee/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="login d-flex align-items-center justify-content-center text-center bg-dark text-white overflow-hidden">

    <div class="container-fluid align-items-center justify-content-center d-flex">
        <div class="px-2 text-center w-sm-100" style="width: 60%;">
            <h1 class="mb-3">Panoul de administrare al paginii<br><b class="text-white">Târgu Jiu - Capitala Tineretului</b></h1>
            <h3 class="text-center fs-5 p-sm-0"><a class="text-galben" href="index.php">Adăugare activitate</a> / <a class="text-galben" href="index.php?postari">Vizualizează activitățile încărcate</a> / <a class="text-galben" href="login.php?logout">Deconectează-te</a></h2>
            <div class="">
                <?php
                    if (!isset($_GET['postari'])) {
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <input required name="title" type="text" class="form-control fw-bold mb-2" placeholder="Titlul activității...">
                    <script>
                        tinymce.init({
                            selector: 'textarea',
                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                        });
                    </script>
                    <textarea required name="content">
                        Conținutul activității...
                    </textarea>
                    <p class="mb-0 fs-6 text-justify">Fotografia de fundal a activității...</p>
                    <input required name="cover" type="file" class="form-control fw-bold mb-2 text-galben" accept="image/*">
                    <p class="mb-0 fs-6 text-justify">Data de desfășurare a activității...</p>
                    <input required name="date" type="date" class="form-control fw-bold mb-2 text-galben">
                    <input name="duration" type="text" class="form-control fw-bold mb-2" placeholder="Durata activității...">
                    <button type="submit" class="btn btn-lg btn-outline-light fw-bold">Publică activitatea</button>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
            } else {
                header("Location: login.php");
            }
        } else {
            header("Location: login.php");
        }

    } else 
        header("Location: login.php");

?>