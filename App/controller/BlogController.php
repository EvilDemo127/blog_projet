<?php
namespace Controller;

use Database\MySql;
use Model\BlogTable;


class BlogController{
    private $table;

    public function __construct()
    {
        $this->table =new BlogTable(new MySql());
    }
    public function showPagination($limit,$offset){
        return $this->table->showBlogPagination($limit,$offset);
    }

    public function addBlog($data){
       $this->table->addBlog($data);
       header("location: ../view/blogs.php");
    }

    public function showBlog(){
       return $this->table->showBlogs();
    }

    public function showBlogDetails($id){
        return $this->table->blogDetails($id);
    }

    public function searchBlog($search){
        return $this->table->search($search);
    }

}