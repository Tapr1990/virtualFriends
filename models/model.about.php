<?php
    require_once("models/model.database.php");

    Class About extends Database {

        public function about($user_id,$country,$city,$birth_date,$school,$university,$job) {
            $query = $this->db->prepare("
                INSERT INTO about
                (user_id, country, city, birth_date, school, university, job)
                VALUES(?,?,?,?,?,?,?)
            ");

           
            
            $query->execute([
                htmlspecialchars(strip_tags(trim($user_id))),
                htmlspecialchars(strip_tags(trim($country))),
                htmlspecialchars(strip_tags(trim($city))),
                htmlspecialchars(strip_tags(trim($birth_date))),
                htmlspecialchars(strip_tags(trim($school))),
                htmlspecialchars(strip_tags(trim($university))),
                htmlspecialchars(strip_tags(trim($job)))
            ]);
            
                
            return $this->db->lastInsertId();
            
            
            
       


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

            return $query->fetchAll();
        }

    }

   
?>