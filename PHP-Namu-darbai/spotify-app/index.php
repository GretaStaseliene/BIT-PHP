<?php

session_start();

try {
    $db = new mysqli('localhost', 'root', '', 'spotify');
} catch (Exception $error) {
    echo '<h2>Nepavyko prisijungti prie duomenu bazes</h2>';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <?php include('views/components/header.php'); ?>

    <div class="container">
        <?php if (isset($_GET['message'])) : ?>
            <div class="alert alert-<?= $_GET['status']; ?>"><?= $_GET['message'] ?></div>
        <?php endif; ?>
        <?php

        $page = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($page) {
            case 'register':
                include('views/pages/register.php');
                break;
            case 'login':
                include('views/pages/login.php');
                break;
            case 'admin':
                include('views/pages/admin.php');
                break;
            case 'main':
                include('views/pages/main.php');
                break;
            case 'front-page':
                include('views/pages/front-page.php');
                break;
            case 'logout':
                session_destroy();
                include('views/pages/front-page.php');
                break;
            default:
                include('views/pages/front-page.php');
        }
        ?>
    </div>

    <?php include('views/components/footer.php'); ?>

</body>

</html>