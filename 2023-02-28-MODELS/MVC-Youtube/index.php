<?php

// MVC schema: - Model View Controller
// Model - Atsakingi už duomenų paėmimą iš duomenų bazės
// View - Šablonai kurie sukompiliuojami pagal perduodamą informaciją
// Controller - Kontroliuoja prieš tai buvusių dviejų sekcijų veiklą

include ('model/Database.php');
include('model/Categories.php');
include('model/Videos.php');

$categories = new Categories();
$videos = new Videos();

echo '<pre>';

// print_r($videos->getRecords());

// $videos->addRecord([
//     'name' => 'Belekas',
//     'video_url' => 'https://youtube.com',
//     'thumbnail_url' => 'https://youtube.com'
// ]);

// $videos->updateRecords(2, [
//     'name' => 'Naujas video',
//     'video_url' => 'https://youtube.com/0',
//     'thumbnail_url' => 'https://youtube.com/1'
// ]);

// $videos->deleteRecords(4);