<?php
    require_once("models/model.database.php");

    Class About extends Database {

        public function about($user_id, $country, $city, $birth_date, $school, $university, $job) {
            $query = $this->db->prepare("
                INSERT INTO about
                (user_id, country, city, birth_date, school, university, job)
                VALUES(?,?,?,?,?,?,?)
            ");

           
            
            $query->execute([
                $user_id,
                $country,
                $city,
                $birth_date,
                $school,
                $university,
                $job
                
            ]);
            
            
       

            $result = $this->db->lastInsertId();

            return $result;
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