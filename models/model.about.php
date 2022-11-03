<?php
    require_once("models/model.database.php");

    Class About extends Database {

        public function about($user_id, $data) {
            $query = $this->db->prepare("
                INSERT INTO about
                (user_id, country, city, birth_date, school, university, job)
                VALUES(?,?,?,?,?,?,?)
            ");

           
            
            $query->execute([
                $user_id,
                $data["country"],
                $data["city"],
                $data["birth_date"],
                $data["school"],
                $data["university"],
                $data["job"]
            ]);
            
                
            $result = $this->db->lastInsertId();
            
            return $result;
            
       


        }

        public function getAbout($user_id) {
            $query = $this->db->prepare("
                SELECT 
                    user_id, 
                    country,
                    city,
                    birth_date,
                    school,
                    university,
                    job

                FROM 
                    about
                WHERE
                    user_id = ?
            ");

            $query->execute([ $user_id ]);

            return $query->fetch();
        }

    }

    /*
             htmlspecialchars(strip_tags(trim($data["country"]))),
                htmlspecialchars(strip_tags(trim($data["city"]))),
                htmlspecialchars(strip_tags(trim($data["birth_date"]))),
                htmlspecialchars(strip_tags(trim($data["school"]))),
                htmlspecialchars(strip_tags(trim($data["university"]))),
                htmlspecialchars(strip_tags(trim($data["job"])))
    */

?>