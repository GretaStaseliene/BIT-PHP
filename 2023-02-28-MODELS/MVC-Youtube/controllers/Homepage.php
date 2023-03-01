<?php

class Homepage {
    public static function index() {
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