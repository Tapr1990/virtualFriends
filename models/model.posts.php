<?php
    require_once("models/model.database.php");

    Class Posts extends Database {

        public function createPost($id, $data) {

            

            $query = $this->db->prepare("
                    INSERT INTO posts
                    (user_id, post)
                    VALUES(?, ?)
            ");
        
            $query->execute([
                htmlspecialchars(strip_tags(trim($id))),
                htmlspecialchars(strip_tags(trim($data["post"])))
                
            ]);
                
          
                
                
        
            $post = $this->db->lastInsertId();

            return $post;
    
            
        }

    

        public function getAllPosts() {
            $query = $this->db->prepare("
                SELECT
                    posts.post_id,
                    posts.post, 
                    posts.date,
                    users.profile_image,
                    users.first_name,
                    users.last_name,
                    commets.comment_id,
                    commets.comment
                     
                FROM 
                    posts
                INNER JOIN
                    users ON(posts.user_id = users.user_id)
                INNER JOIN
                    commets ON(posts.post_id = commets.post_id)
                ORDER BY 
                    post_id DESC 
                
            ");
            
            
                
            $query->execute();
            
            $posts = $query->fetchAll();
            
            return $posts;
        }

        
        
        public function getPosts($user_id) {
            
            $query = $this->db->prepare("
            SELECT post_id, user_id, post 
            FROM posts
            WHERE user_id = ?
            ORDER BY post_id DESC 
            ");
            
            $query->execute([ $user_id ]);
            
            $result = $query->fetchAll();
            
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
            
          
            
            $query = $this->db->prepare("
                UPDATE posts
                SET post = ?
                WHERE post_id = ?
            ");
            
            $query->execute([
                htmlspecialchars(strip_tags(trim($post))),
                htmlspecialchars(strip_tags(trim($post_id)))
                
                
                
            ]);
            
            return $query;
            
            
        }

        public function countPosts() {
            $query = $this->db->prepare("
                SELECT COUNT(post_id) AS NumberOfPosts
                FROM posts
                
            ");

            $query->execute();

            $result = $query->fetchAll();

            return $result[0]["NumberOfPosts"];
        }

        public function adminPosts() {
            $query = $this->db->prepare("
                SELECT
                    post_id,
                    user_id,
                    post, 
                    date
                   
                     
                FROM 
                    posts
               
            ");

            $query->execute();
            
            $posts = $query->fetchAll();
            
            return $posts;
        }
            
        

       
    }
    
  
?>