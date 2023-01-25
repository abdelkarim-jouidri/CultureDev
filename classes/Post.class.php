<?php
 class Posts extends Database{
    public function create($title, $description , $category , $image) {
        $stmt = $this->db->prepare("INSERT INTO posts (title, description, category_id, image) VALUES (?, ? , ? , ?)");
        $stmt->execute([$title, $description, $category , $image]);
        return $this->db->lastInsertId();
    }
    public function readAll() {
        $stmt = $this->db->prepare("SELECT p.id ,p.title, p.description , p.image , c.name 
                                    FROM posts as p INNER JOIN categories as c 
                                    ON p.category_id = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStatistics(){
        $stmt = $this->db->prepare("SELECT count(*) as count FROM posts");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>