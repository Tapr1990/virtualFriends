<?php
    require_once("models/model.database.php");

    Class Posts extends Database {

        public function createPost($id, $data) {

            //$is_image = 0;

            $query = $this->db->prepare("
                    INSERT INTO posts
                    (user_id, post)
                    VALUES(?, ?)
            ");
        
            $query->execute([
                $id,
                $data["post"]
                //$is_image["is_image"]
            ]);
                
          
                
                
        
            $post = $this->db->lastInsertId();

            return $post;
    
            
        }

 

        public function getPosts($user_id) {
            
            $query = $this->db->prepare("
                SELECT post_id, user_id, post 
                FROM posts
                WHERE user_id = ?
                ORDER BY post_id DESC limit 10
            ");

            $query->execute([ $user_id ]);

            $result = $query->fetchAll();

            return $result;
           
        }

       
    }

?>