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
                $post_id,
                $user_id,
                $comment
                
            ]);

            return $this->db->lastInsertId();

        
            
        }

        public function getComments($post_id, $user_id) {
            $query = $this->db->prepare("
                SELECT 
                    post_id, user_id, comment
                FROM 
                    commets
                WHERE 
                    post_id = ? AND user_id = ?

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