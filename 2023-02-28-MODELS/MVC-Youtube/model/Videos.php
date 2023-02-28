<?php

class Videos extends Database {
    private $table = 'videos';

    public function __construct() {
        parent::__construct();
    }

    public function getDatabase() {
        return self::$db;
    }

    public function addRecord($data) {
        $keys = implode(', ', array_keys($data));
        $placeholder = implode(', ', array_fill(0, count($data), "'%s'"));

        self::$db->query(
            vsprintf("INSERT INTO $this->table ($keys) VALUES ($placeholder)", $data)
        );

        return $this;
    }

    public function getRecords() {
        return self::$db->query("SELECT * FROM $this->table")->fetch_all(MYSQLI_ASSOC);
    }

    public function updateRecords($id, $data) {
        $values = [];

        foreach($data as $key => $value) {
            $values[] = $key . " = '$value'";
        }

        $query = implode(', ', $values);

        self::$db->query("UPDATE $this->table SET $query WHERE id = $id");
    }

    public function deleteRecords($id) {
        self::$db->query("DELETE FROM $this->table WHERE id = $id");
    }

    public function getRecordId() {
        self::$db->insert_id;
    }

}