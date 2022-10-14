<?php
    class Database {
        public $db;

        public function __construct() {
            $this->db = new PDO(
                "mysql:host=localhost;dbname=virtual_friends;charset=utf8mb4",
                "root", ""
            );
             

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        }
    }
?>