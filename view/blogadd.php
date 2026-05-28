
<?php require("../layout/header.php") ?>

<div class="d-flex justify-content-center mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="card shadow p-3">
            <h5 class="card-title text-center text-white py-3 bg-dark">
            <i class="fas fa-user"></i>    
            Add New Blogs</h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-2">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                 <div class="mb-2">
                    <label for="" class="form-label">Content</label>
                    <textarea type="text" class="form-control" name="content"></textarea>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label d-block">Image</label>
                    <input type="file" class="form-control-sm" name="content">
                </div>
                <button class="btn btn-dark p-2 w-100">Submit</button>
                </form>
            </div>
    </div>
    </div>
</div>
<?php require("../layout/footer.php") ?>