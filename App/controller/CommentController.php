<?php
namespace Controller;

use Database\MySql;
use Model\CommentTable;

class CommentController{
    private $table;
    public function __construct()
    {
        $this->table =new CommentTable(new MySql());
    }

    public function addComment($data){
        if(empty($data['comment'])){
             header("location: ../view/blogdetails.php?id={$data['post_id']}");
        }else{
            $this->table->addComment($data);
            header("location: ../view/blogdetails.php?id={$data['post_id']}");
        }
    }

    public function showComment($id){
        return $this->table->comment($id);
    }
}