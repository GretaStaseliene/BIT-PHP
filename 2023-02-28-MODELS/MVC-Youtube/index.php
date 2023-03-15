<?php

session_start();
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
    
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    switch ($page) {
 
        case 'category':
            Controllers\Homepage::byCategory($_GET['id']);
            break;

        case 'login':
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                Controllers\Authentication::loginIndex();
            } else if($_SERVER['REQUEST_METHOD'] === 'POST') {
                Controllers\Authentication::processLogin();
            }
            break;

        case 'register':
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                Controllers\Authentication::registerIndex();
            } else if($_SERVER['REQUEST_METHOD'] === 'POST') {
                Controllers\Authentication::processRegister();
            }
            break;
            
        case 'logout':
            session_destroy();
            header('Location: ?page=/');

        case 'search':
            Controllers\Search::search();
            break;

        // case 'video':
        //     if($_SERVER['REQUEST_METHOD'] === 'GET'){
        //         Controllers\Video::toSingleVideo($_GET['id']);
        //     } else if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //         Controllers\Video::processComments();
        //     }
        //     break;

        case 'video':
                Controllers\Video::toSingleVideo($_GET['id']);
                Controllers\Video::processComments();
            break;

        default:
            Controllers\Homepage::index();
    }