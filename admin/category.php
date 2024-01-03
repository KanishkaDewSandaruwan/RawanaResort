<!DOCTYPE html>
<html lang="en">
<?php include 'template/head.php'; ?>

<body>
    <div class="wrapper">

        <?php include 'template/navbar.php'; ?>

        <div class="main">

            <?php include 'template/topbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="h3 mb-3"><strong>Room Category (
                                    <?php $count = getAllCategorycount();
                                    $row = mysqli_fetch_assoc($count);
                                    echo $row['count']; ?>
                                    )
                                </strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal">Add
                                New Category</button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                                <?php
                                $getall = getAllCategory();

                                while ($row = mysqli_fetch_assoc($getall)) {

                                    $cat_id = $row['cat_id'];
                                    $img = $row['cat_image'];
                                    $img_src = "../server/uploads/category/" . $img; ?>

                                    <div class="row one-item mt-2">
                                        <div class="row">
                                            <div class="col-md-10 mt-2">
                                                <script
                                                    src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                                                <img id="images<?php echo $cat_id; ?>"
                                                    onclick="upImage(<?php echo $cat_id; ?>)" width="200px"
                                                    src='<?php echo $img_src; ?>'>
                                                <form class="w-10" enctype="multipart/form-data" method="POST">
                                                    <div class="mb-3">
                                                        <input class="form-control" value="<?php echo $row['cat_id'] ?>"
                                                            name="id" type="hidden" id="id">
                                                        <input class="form-control" value="cat_id" name="id_fild"
                                                            type="hidden" id="id_fild">
                                                        <input class="form-control" value="category" name="table"
                                                            type="hidden" id="table">
                                                        <input class="form-control" value="cat_image" name="field"
                                                            type="hidden" id="field">
                                                        <input style="display: none;" onchange="uploadImage(this.form);"
                                                            class="form-control" name="file" type="file"
                                                            id="formFile<?php echo $cat_id; ?>">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Category Name : </p>
                                                <div class="form-group">
                                                    <input id="cat_name  <?php echo $cat_id; ?>" type="text" name="cat_name"
                                                        onchange="updateData(this, '<?php echo $cat_id; ?>', 'cat_name', 'category', 'cat_id');"
                                                        value="<?php echo $row['cat_name']; ?>"
                                                        data-parsley-trigger="change" required=""
                                                        placeholder="Enter Category Name" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                            <div class="col-md-1">
                                                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'): ?>

                                                    <td><button type="button"
                                                            onclick="deleteDataCategory(<?php echo $row['cat_id']; ?>,'category', 'cat_id')"
                                                            class="btn btn-light"> <i class="fa-solid fa-trash"></i>
                                                        </button></td>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>


                                <?php } ?>



                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php include 'template/footer.php'; ?>

        </div>
    </div>

    <?php include 'template/footer_script.php'; ?>

</body>

<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background-color: #050c2a;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Room Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="category_name" id="cat_name"
                                placeholder="Category Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input class="form-control" name="file" type="file" id="file">
                        </div>

                </div>
                <div class="modal-footer " style="background-color: #050c2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addCategory(this.form)" name="submit" class="btn btn-info">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>