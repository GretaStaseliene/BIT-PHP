<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assests/style.css">
</head>

<body>
    <div class="container">
        <?php include('views/header.php') ?>

        <?php $page = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($page) {
            case 'signup':
                include('actions/signup.php');
                break;
            case 'login':
                include('actions/login.php');
                break;
            case 'main':
                include('views/main.php');
                break;
            case 'logout':
                session_destroy();
                include('views/front-page.php');
                break;
            default:
                include('views/front-page.php');
        }
        ?>

        <?php include('views/footer.php') ?>
    </div>
</body>

</html>