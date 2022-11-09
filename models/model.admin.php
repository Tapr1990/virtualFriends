<?php

    require_once("models/model.database.php");

    class Admin extends Database {

        public function createAdmin($data) {
            $query = $this->db->prepare("
                INSERT INTO admin
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

        public function loginAdmin($data) {
            $query = $this->db->prepare("
                SELECT admin_id, password 
                FROM admin
                WHERE email = ? 
                ");
                
                $query->execute([
                    htmlspecialchars(strip_tags(trim($data["email"])))
                    
                ]);
                
                $admin = $query->fetch();
                
                if(!empty($admin) && password_verify($data["password"], $admin["password"])){
                    
                    return $admin;
                }
                
            return [];
        }

        public function getAdmin($id) {
            $query = $this->db->prepare("
                SELECT 
                    admin_id, 
                    first_name,
                    last_name,
                    gender,
                    email,
                    date,
                    profile_image,
                    cover_image

                FROM 
                    admin
                WHERE
                    admin_id = ?
            ");

            $query->execute([ $id ]);

            return $query->fetch();
        }
    }
?>