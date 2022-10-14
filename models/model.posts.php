<?php
    require_once("models/model.database.php");

    Class Posts extends Database {

        public function createPost($id, $post, $file) {

            //$is_image = 0;

            $query = $this->db->prepare("
                    INSERT INTO posts
                    (user_id, post, image)
                    VALUES(?, ?, ?)
            ");
        
            $query->execute([
                $id,
                $post,
                $file
                //$is_image["is_image"]
            ]);
                
          
                
                
        
            $post = $this->db->lastInsertId();

            return $post;
    
            
        }

 

        public function getPosts() {
            
            $query = $this->db->prepare("
                SELECT post_id, post, image 
                FROM posts
                ORDER BY post_id DESC
            ");

            $query->execute();

            return $query->fetchAll();

           
        }

       
    }

?>