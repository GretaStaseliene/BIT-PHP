<?php

class Videos extends Database {
    public $table = 'videos';

    // public function __construct() {
    //     parent::__construct();
    // }

    function categoryVideos($id) {
        $result = self::$db->query("SELECT * FROM $this->table WHERE category_id = $id");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}