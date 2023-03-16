<?php

namespace Controllers;

use Model\Videos;
use Model\Categories;

class Homepage {
    public static function index() {

        if(!empty($_POST['category_name'])) {
            $newCategory = new Categories();
            if(isset($_GET['action']) AND $_GET['action'] === 'add') {
                $newCategory = $newCategory->addRecord($_POST);
                header('Location: ?page=/');
                exit;
            }
        } else {
            $newVideo = new Videos();
            if(!empty($_POST) AND isset($_GET['action']) AND $_GET['action'] === 'add') {
                $newVideo = $newVideo->addRecord($_POST);
                header('Location: ?page=/');
                exit;
            }

        }

        $videos = new Videos();
        $videos = $videos->getRecords();


        $categories = new Categories();
        $categories = $categories->getRecords();

        include 'views/homepage.php';
    }

    public static function byCategory($id) {
        $videos = new Videos();
        $videos = $videos->categoryVideos($id);

        $categories = new Categories();
        $categories = $categories->getRecords();

        include 'views/homepage.php';
    }
}

?>