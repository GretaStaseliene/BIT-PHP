<?php

namespace Model;

abstract class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB = 'youtube';

    public static $db = false;
    public $table = false;

    public $records = [];

    public function __construct() {
        if(self::$db) 
            return;

        try {
            self::$db = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DB);
        } catch (\Exception $e) {
            echo 'Nepavyko prisijungti prie duomenu bazes';
            exit;
        }
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
        return self::$db->insert_id;
    }

    public function getRecordsBy($data, $op = 'AND') {
        $where = '';
        $count = 1;

        foreach($data as $key => $value) {
            $where .= "$key = '$value'";

            if($count < count($data))
                $where .= " $op ";

                $count++;
        }

        $this->records = self::$db->query("SELECT * FROM $this->table WHERE $where")->fetch_all(MYSQLI_ASSOC);

        return $this;
    }

    public function recordExists() {
        return !empty($this->records);
    }
}