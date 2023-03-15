<?php

namespace Controllers;

use Model\Videos;
use Model\Comments;

class Video {
    public static function toSingleVideo($id) {
        $videos = new Videos;
        $videos = $videos->singleVideo($id);

        include("views/singleVideo.php");

    }

    public static function processComments() {
        $comments = new Comments();
        $comments->addRecord($_POST);

        $comments = new Comments();
        $comments = $comments->getRecords();

    }
}