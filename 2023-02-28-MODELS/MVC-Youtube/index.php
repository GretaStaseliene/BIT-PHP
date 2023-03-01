<?php

// MVC schema: - Model View Controller
// Model - Atsakingi už duomenų paėmimą iš duomenų bazės
// View - Šablonai kurie sukompiliuojami pagal perduodamą informaciją
// Controller - Kontroliuoja prieš tai buvusių dviejų sekcijų veiklą

include ('model/Database.php');
include('model/Categories.php');
include('model/Videos.php');

include ('controllers/Homepage.php');

// function autoload_classes($class) {
//     include 'model/' . $class . '.php';
// }
// spl_autoload_register('autoload_classes');

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

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) {
    case 'category':
        Homepage::byCategory($_GET['id']);
        break;
    default:
        Homepage::index();
}