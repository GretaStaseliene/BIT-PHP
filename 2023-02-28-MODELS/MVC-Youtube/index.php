<?php

// MVC schema: - Model View Controller
// Model - Atsakingi už duomenų paėmimą iš duomenų bazės
// View - Šablonai kurie sukompiliuojami pagal perduodamą informaciją
// Controller - Kontroliuoja prieš tai buvusių dviejų sekcijų veiklą

// include ('model/Database.php');
// include('model/Categories.php');
// include('model/Videos.php');

// include ('controllers/Homepage.php');

function autoload_classes($class)
{
    if (is_file($class . '.php'))
        include $class . '.php';
}
spl_autoload_register('autoload_classes');

// $categories = new Categories();
// $videos = new Videos();

// echo '<pre>';

// print_r($videos->getRecords());

// Video pridejimas
// $videos->addRecord([
//     'name' => 'Belekas',
//     'video_url' => 'https://youtube.com',
//     'thumbnail_url' => 'https://youtube.com'
// ]);

//Video redagavimas
// $videos->updateRecords(2, [
//     'name' => 'Naujas video',
//     'video_url' => 'https://youtube.com/0',
//     'thumbnail_url' => 'https://youtube.com/1'
// ]);

//Video istrynimas
// $videos->deleteRecords(4);

//Kategorijos pridejimas
// $categories->addRecord([
//     'name' => 'Sportas'
// ]);

//Kategoriju susigrazinimas
// print_r($categories->getRecords());
// include 'views/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    
    <?php

    include("views/header.php");

    $page = isset($_GET['page']) ? $_GET['page'] : '';

    switch ($page) {
        case 'category':
            Controllers\Homepage::byCategory($_GET['id']);
            break;
        case 'search':
            Controllers\Search::search();
            break;
        case 'video':
            Controllers\Video::toSingleVideo($_GET['id']);
            break;
        default:
            Controllers\Homepage::index();
    }
    ?>
</body>

</html>