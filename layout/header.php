<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOG</title>
  <link href="/Blog/public/assets/css/bootstrap.min.css" rel="stylesheet" >
  <script src="/Blog/public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e705754a75.js" crossorigin="anonymous"></script>
  <link href="/Blog/public/assets/css/style.css" rel="stylesheet" >
</head>
<body class="bg-light">
    <div class="container-fluid g-0">
        
        <div class="row g-0" style="min-height: 100vh;">
            
            <!-- Start Left Sidebar (Col-2) -->
            <div class="col-2 bg-dark text-white ">
                <div class="list-group list-group-flush">
                    <li class="list-group-item bg-dark text-white fw-bold py-3 border-secondary">Admin</li>
                    <li class="nav-item dropdown list-group-item list-group-item-action bg-dark     text-white  py-3">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-table"></i>    
                        <span class="d-none d-md-inline">Blogs</span></a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../view/blogs.php"><span class="d-none d-md-inline">Blog</span></a></li>
                        <li><a class="dropdown-item" href="../view/blogadd.php"><span class="d-none d-md-inline">Add Blogs</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-group-item list-group-item-action bg-dark     text-white  py-3">
                        <a class="nav-link " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-user"></i>    
                        <span class="d-none d-md-inline">User</span></a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../view/userlist.php"><span class="d-none d-md-inline">User List</span></a></li>
                        <li><a class="dropdown-item" href="../view/adduser.php"><span class="d-none d-md-inline">Add User</span></a></li>
                        </ul>
                    </li>
                </div>
            </div>
            <!-- End Left Sidebar (Col-2) -->

            <!-- Right Main Content Area (Col-10) -->
            <div class="col-10 d-flex flex-column   bg-white">
                <div>
                    <!-- Top Navbar Area -->
                    <div class="navbar navbar-light bg-light border-bottom px-3 d-flex justify-content-between">
                        <form action="index.php?action=search" method="post" class="w-50">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                                <button type="submit" class="input-group-text bg-white border-start-0">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                        <div>
                            <a href="index.php?action=logout" class="btn btn-danger btn-sm">Logout</a>
                        </div>
                    </div>
                    
                   
                    
                </div> <!-- /Top Navbar End -->
            
                
