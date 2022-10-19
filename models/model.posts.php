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

        public function likePost($data) {

            
            

            $query = $this->db->prepare("
                UPDATE posts
                SET likes = ? + 1
                WHERE post_id = ? limit 1
            ");
        
            $query->execute([
                $data["likes"],
                $data["post_id"]
                
              
            ]);
                
            return $query;
    
            
        }

        public function getLikes($post_id) {

     

            $query = $this->db->prepare("
                SELECT likes
                FROM posts
                WHERE post_id = ? 
            ");
        
            $query->execute([
                $post_id,
                
            ]);
            
            $result = $query->fetchAll();

            return $result;
        }

        public function getAllPosts($userid, $data) {
            $query = $this->db->prepare("
                SELECT post
                FROM posts
                WHERE user_id = ? in(?) limit 30 
            ");

            $query->execute([
                $userid,
                $data
            ]);

            $posts = $query->fetchAll();

            return $posts;
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

        public function getIdPost($post_id) {
            $query = $this->db->prepare("
                SELECT post_id, post 
                FROM posts
                WHERE post_id = ?
              
            ");

            $query->execute([ $post_id ]);

            $result = $query->fetch();

            return $result;
            
        }

        
    

        public function deletePost($post_id) {
            $query = $this->db->prepare("
                DELETE FROM posts
                WHERE post_id = ?
            ");

            $query->execute([ $post_id ]);
            
            
            return $query;



        }

        public function editPost($post, $post_id) {

            //$is_image = 0;
            

            $query = $this->db->prepare("
                UPDATE posts
                SET post = ?
                WHERE post_id = ?
            ");
        
            $query->execute([
                $post,
                $post_id
                
                
                //$is_image["is_image"]
            ]);
                
            return $query;
    
            
        }
     
    }

?>