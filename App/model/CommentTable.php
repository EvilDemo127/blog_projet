<?php
namespace Model;

use Database\MySql;
use PDOException;

class CommentTable{
    private $db;

    public function __construct(MySql $sql)
    {
        $this->db =$sql->connect();
    }

    public function addComment($data){
        try {
            $stmt = $this->db->prepare("INSERT INTO comments (comment,author_id,post_id) VALUES (:comment,:author_id,:post_id)");
            $stmt->execute(
                [
                    ':comment'=>$data['comment'],
                    ':author_id'=>$data['author_id'],
                    ':post_id'=>$data['post_id']
                ]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function comment($id){
        try {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE post_id=:post_id");
            $stmt->execute([
                ':post_id'=>$id
            ]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}