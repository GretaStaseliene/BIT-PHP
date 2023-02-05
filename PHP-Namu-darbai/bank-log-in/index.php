<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <?php include('views/header.php'); ?>

   
    <?php

    $page = isset($_GET['page']) ? $_GET['page'] : '';

    switch($page) {
        case 'account':
            include('views/account.php');
            break;
        case 'cards':
            include('views/cards.php');
            break;
        case 'loans':
            include('views/loans.php');
            break;
        case 'pension':
            include('views/pension.php');
            break;
        case 'ebank':
            include('views/log-in.php');
            break;
        case 'admin':
            include('views/admin.php');
            break;
        case 'logout':
            session_destroy();
            include('views/log-in.php');
            break;
        default:
            include('views/log-in.php');
    }

    include('views/footer.php'); 
    
    ?>
</body>
</html>