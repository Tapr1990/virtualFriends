<?php
    require_once("models/model.database.php");

    Class Likes extends Database {

        public function getlikes($post_id, $user_id) {
            $query = $this->db->prepare("
                SELECT 
                    like_id, COUNT(like_id) as likes
                FROM 
                    likes
                WHERE 
                    post_id = ? AND user_id = ?

            ");

            $query->execute([
                $post_id,
                $user_id
            ]);

            $likes = $query->fetchall();

            return $likes;
        }

        public function insertlikes($post_id, $user_id) {

            

            $query = $this->db->prepare("
                    INSERT INTO likes
                    (post_id, user_id)
                    VALUES(?, ?)
                    LIMIT 1
            ");
        
            $query->execute([
                $post_id,
                $user_id
                
            ]);
                
          
                
                
        
            $like = $this->db->lastInsertId();

            return $like;
    
            
        }
        
    }

?>