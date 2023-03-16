<?php

namespace Model;

class Comments extends Database
{
    public $table = 'comments';

    function commentsByCategory($id) {
        return self::$db->query("SELECT * FROM $this->table WHERE video_id = $id")->fetch_all(MYSQLI_ASSOC);;
    }
}
