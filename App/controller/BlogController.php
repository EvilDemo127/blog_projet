<?php

namespace Controller;

use Database\MySql;
use Model\BlogTable;


class BlogController
{
    private $table;

    public function __construct()
    {
        $this->table = new BlogTable(new MySql());
    }
    public function showPagination($limit, $offset)
    {
        return $this->table->showBlogPagination($limit, $offset);
    }

    public function addBlog($data)
    {

        if (empty($data['title']) || empty($data['content'])) {
            $err = [];
            if (empty($data['title'])) {
                $err['title'] = "* Title Can't be empty";
                return $err;
            }
            if (empty($data['content'])) {
                $err['content'] = "* Content can't be empty";
                return $err;
            }
        }
        if (empty($data['image'])) {
            $this->table->addBlog($data);
            header("location: ../view/blogs.php");
        } else {
            if ($data['image']['type'] == "image/png" || $data['image']['type'] == "image/jpg" || $data['image']['type'] == "image/jpeg") {
                move_uploaded_file($data['image']['tmp_name'], __DIR__ . "/../../public/assets/images/" . $data['image']['name']);
                $this->table->addBlog($data);
                header("location: ../view/blogs.php");
            }
        }
    }

    public function showBlog()
    {
        return $this->table->showBlogs();
    }

    public function showBlogDetails($id)
    {
        return $this->table->blogDetails($id);
    }

    public function searchBlog($search)
    {
        return $this->table->search($search);
    }
}
