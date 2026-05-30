<?php

namespace Model;


use Database\MySql;
use PDO;
use PDOException;

class BlogTable
{
    private $db;

    public function __construct(MySql $sql)
    {
        $this->db = $sql->connect();
    }
    public function showBlogPagination($limit, $offset)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addBlog($data)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO posts (title,content,image,author_id) VALUES (:title,:content,:image,:author_id)");
            $stmt->execute(
                [
                    ':title' => $data['title'],
                    ':content' => $data['content'],
                    ':image' => $data['image']['name'],
                    ':author_id' => $data['author_id']
                ]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function showBlogs()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM posts ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function blogDetails($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE id=:id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search($search)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE title LIKE :search OR content LIKE :search");
            $stmt->execute([':search' => '%' . $search . '%']);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
