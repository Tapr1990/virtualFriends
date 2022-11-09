<?php
    require_once("models/model.database.php");

    Class Comments extends Database {

        public function createComment($post_id, $user_id, $comment) {

            $query = $this->db->prepare("
                INSERT INTO commets
                (post_id, user_id, comment)
                VALUES(?, ?, ?)
            ");

            $query->execute([
                htmlspecialchars(strip_tags(trim($post_id))),
                htmlspecialchars(strip_tags(trim($user_id))),
                htmlspecialchars(strip_tags(trim($comment)))
                
            ]);

            return $this->db->lastInsertId();

        
            
        }

        public function getComments($post_id, $user_id) {
            $query = $this->db->prepare("
                SELECT 
                    commets.post_id,
                    commets.user_id, 
                    commets.comment,
                    users.profile_image,
                    CONCAT(users.first_name, users.last_name) AS username
                FROM 
                    commets
                INNER JOIN
                    users USING(user_id)
                WHERE 
                    commets.post_id = ? AND commets.user_id = ?

            ");
            
            $query->execute([
                $post_id,
                $user_id
            ]);

            $comments = $query->fetchall();

            return $comments;


        }   

        public function countComments() {
            $query = $this->db->prepare("
                SELECT COUNT(comment_id) AS NumberOfComments
                FROM commets
                
            ");

            $query->execute();

            $result = $query->fetchAll();

            return $result[0]["NumberOfComments"];
        }
    }
?>