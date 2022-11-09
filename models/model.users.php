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


        public function getAllUsers() {
            $query = $this->db->prepare("
                SELECT user_id,  CONCAT(first_name , last_name) AS username, gender, email, date 
                FROM users
                ORDER by user_id desc
            ");
    
            $query->execute();
    
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
                htmlspecialchars(strip_tags(trim($profile_image))),
                htmlspecialchars(strip_tags(trim($user_id)))

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
                htmlspecialchars(strip_tags(trim($data))),
                htmlspecialchars(strip_tags(trim($user_id)))

            ]);

            return $query;
        }

        

        

        public function deleteUser($user_id) {
            $query = $this->db->prepare("
                DELETE FROM users
                WHERE user_id = ?
            ");
            
            $query->execute([ $user_id ]);
            
            
            return $query;
            
            
            
        }

        public function editUser($data, $user_id) {
            
          
            
            
            $query = $this->db->prepare("
                UPDATE 
                    users
                SET 
                    first_name = ?,
                    last_name = ?,
                    gender = ?,
                    email = ?,
                    password = ?
                WHERE 
                    user_id = ?
            ");
            
            $query->execute([
                htmlspecialchars(strip_tags(trim($data["first_name"]))),
                htmlspecialchars(strip_tags(trim($data["last_name"]))),
                htmlspecialchars(strip_tags(trim($data["gender"]))),
                htmlspecialchars(strip_tags(trim($data["email"]))),
                password_hash($data["password"],PASSWORD_DEFAULT),
                $user_id
            ]);
            
            return $query;
            
            
        }

        public function countUsers() {
            $query = $this->db->prepare("
                SELECT COUNT(user_id) AS NumberOfUsers, date
                FROM users
                
            ");

            $query->execute();

            $result = $query->fetchAll();

            return $result[0]["NumberOfUsers"];
        }

        
        public function findUser($name) {
            $query = $this->db->prepare("
                SELECT user_id, profile_image, first_name
                FROM users
                WHERE first_name = ?
            ");

            $query->execute([ 
                $name
            
            ]);

            return $query->fetchAll();

            
        }

        /*public function create($first_name,$last_name,$gender,$email,$password) {
            $query = $this->db->prepare("
                INSERT INTO users
                (first_name, last_name, gender, email, password)
                VALUES(?,?,?,?,?)
            ");

           
            
            $query->execute([
                
                htmlspecialchars(strip_tags(trim($first_name))),
                htmlspecialchars(strip_tags(trim($last_name))),
                htmlspecialchars(strip_tags(trim($gender))),
                htmlspecialchars(strip_tags(trim($email))),
                password_hash($password,PASSWORD_DEFAULT)
                
            ]);
            
            //$url_address = strtolower($data["first_name"]) . "." . strtolower($data["last_name"]);
       

            return $this->db->lastInsertId();

            
        }*/
      
    }
?>