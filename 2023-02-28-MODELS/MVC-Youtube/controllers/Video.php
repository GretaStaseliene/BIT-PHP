<?php

namespace Controllers;

use Model\Videos;
use Model\Comments;

class Video {
    public static function toSingleVideo($id) {
        $videos = new Videos;
        $videos = $videos->singleVideo($id);

        $comments = new Comments();
        if(!empty($_POST)) {
            $comments->addRecord($_POST);
            
            header('Location: ?page=video&id=' . $id);
            exit;
        }


        $comments = new Comments();
        $comments = $comments->commentsByCategory($id);

        include("views/singleVideo.php");

    }
}