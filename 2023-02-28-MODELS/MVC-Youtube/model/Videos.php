<?php

namespace Model;

class Videos extends Database {
    public $table = 'videos';

    // public function __construct() {
    //     parent::__construct();
    // }

    function categoryVideos($id) {
        $result = self::$db->query("SELECT * FROM $this->table WHERE category_id = $id");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function searchFor($searchingFor) {
        $result = self::$db->query("SELECT * FROM $this->table WHERE name LIKE '%$searchingFor%'")->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    function singleVideo($id) {
        $result = self::$db->query("SELECT * FROM $this->table WHERE id = $id")->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

}