<?php
    // include('neegzistuojantis.php'); // Neradus failo ismes tik ispejima
    // require('neegzistuojantis.php'); // Neradus failo ismes fatal klaida ir toliau nekompiliuos html turinio
    // include_once('views/header.php'); // Nurodo, kad failas gali buti ikeliamas tik viena karta dokumente 
    // require_once('views/header.php); // Nurodo, kad failas gali buti ikeliamas tik viena karta dokumente bei grazina klaida
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parduotuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php include('routeris/views/header.php'); ?>
    <main>
        <?php 
            // Routeris, naviguoti tarp puslapiu
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch($page) {
                case 'blog':
                    include('routeris/views/blog-items.php');
                    break;
                case 'test':
                    include('routeris/views/test.php');
                    break;
                default: 
                    include('routeris/views/new-items.php');
            }
        ?>
    </main>
    <?php include('routeris/views/footer.php'); ?>
</body>
</html>