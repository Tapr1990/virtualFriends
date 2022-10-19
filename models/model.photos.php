<?php
    require_once("models/model.database.php");

    Class Photos extends Database {

        public function insertPhotos($data, $user_id) {
            $query = $this->db->prepare("
                INSERT INTO photos
                (user_id, photo)
                VALUES(?, ?) 
            ");

            $query->execute([
                $user_id,
                $data

            ]);

            $result = $this->db->lastInsertId();

            return $result;
        }

        public function getPhotos($user_id) {
            $query = $this->db->prepare("
                SELECT photo_id, photo
                FROM photos
                WHERE user_id = ?
            ");

            $query->execute([ $user_id ]);

            
            $result = $query->fetchAll();

            return $result;
        }

        public function deletePhoto($photo_id) {
            $query = $this->db->prepare("
                DELETE FROM photos
                WHERE photo_id = ?
            ");

            $query->execute([ $photo_id ]);
            
            
            return $query;



        }

    }
?>