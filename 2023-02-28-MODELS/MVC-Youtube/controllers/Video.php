<?php

namespace Controllers;

use Model\Videos;

class Video {
    public static function toSingleVideo($id) {
        $videos = new Videos;
        $videos = $videos->singleVideo($id);

        include("views/singleVideo.php");
    }
}