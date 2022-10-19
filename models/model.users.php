<?php

    require_once("models/model.database.php");

    class Users extends Database {

        public function createUsers($data) {
            $query = $this->db->prepare("
                INSERT INTO users
                (first_name, last_name, gender, email, password)
                VALUES(?,?,?,?,?)
            ");

           
            
            $query->execute([
                
                htmlspecialchars(strip_tags(trim($data["first_name"]))),
                htmlspecialchars(strip_tags(trim($data["last_name"]))),
                htmlspecialchars(strip_tags(trim($data["gender"]))),
                htmlspecialchars(strip_tags(trim($data["email"]))),
                password_hash($data["password"],PASSWORD_DEFAULT)
                
            ]);
            
            //$url_address = strtolower($data["first_name"]) . "." . strtolower($data["last_name"]);
       

            return $this->db->lastInsertId();
        }

        public function getUser($user_id) {
            $query = $this->db->prepare("
                SELECT 
                    user_id, 
                    first_name,
                    last_name,
                    gender,
                    email,
                    date,
                    profile_image,
                    cover_image

                FROM 
                    users
                WHERE
                    user_id = ?
            ");

            $query->execute([ $user_id ]);

            return $query->fetch();
        }

       /* public function checkUser($user_id) {
            $query = $this->db->prepare("
                SELECT 
                    user_id, 
                    first_name,
                    last_name,       
                FROM 
                    users
                WHERE
                    user_id = ?
            ");

            $query->execute([ $user_id ]);

            return $query->fetch();

        }*/

       

        
        public function loginUser($data) {
            $query = $this->db->prepare("
            SELECT user_id, password 
            FROM users
                WHERE email = ? 
                ");
                
                $query->execute([
                    htmlspecialchars(strip_tags(trim($data["email"])))
                    
                ]);
                
                $user = $query->fetch();
                
                if(!empty($user) && password_verify($data["password"], $user["password"])){
                    
                    return $user;
                }
                
            return [];
        }


        public function getUsers($id) {
            $query = $this->db->prepare("
                SELECT *
                FROM users
                WHERE user_id = ?
            ");
    
            $query->execute([ $id ]);
    
            return $query->fetchAll();
        }
        

        public function getFriends($user_id) {
            $query = $this->db->prepare("
                SELECT *
                FROM users
                WHERE user_id != ?
            ");

            $query->execute([ $user_id ]);

            return $query->fetchAll();
        }

        public function insertProfileImage($profile_image, $user_id) {
            $query = $this->db->prepare("
                UPDATE users
                SET profile_image = ?
                WHERE user_id = ? 
            ");

            $query->execute([
                $profile_image,
                $user_id

            ]);

            return $query;
        }


        public function insertBackgroundImage($data, $user_id) {
            $query = $this->db->prepare("
                UPDATE users
                SET cover_image = ?
                WHERE user_id = ? 
            ");

            $query->execute([
                $data,
                $user_id

            ]);

            return $query;
        }


      
    }
?>