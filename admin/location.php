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
                            <h1 class="h3 mb-3"><strong>Locations (
                                    <?php $count = getAllLocationCount();
                                    $row = mysqli_fetch_assoc($count);
                                    echo $row['count']; ?>
                                    )</strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LocationModal">Add
                                New Location</button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">


                                <?php
                                $getall = getAllLocation();

                                while ($row = mysqli_fetch_assoc($getall)) {

                                    $location_id = $row['location_id'];
                                    $img = $row['location_image'];
                                    $img_src = "../server/uploads/location/" . $img; ?>

                                    <div class="row one-item mt-2">
                                        <div class="row">
                                            <div class="col-md-10 mt-2">
                                                <script
                                                    src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                                                <img id="images<?php echo $location_id; ?>"
                                                    onclick="upImage(<?php echo $location_id; ?>)" width="200px"
                                                    src='<?php echo $img_src; ?>'>
                                                <form class="w-10" enctype="multipart/form-data" method="POST">
                                                    <div class="mb-3">
                                                        <input class="form-control"
                                                            value="<?php echo $row['location_id'] ?>" name="id"
                                                            type="hidden" id="id">
                                                        <input class="form-control" value="location_id" name="id_fild"
                                                            type="hidden" id="id_fild">
                                                        <input class="form-control" value="location" name="table"
                                                            type="hidden" id="table">
                                                        <input class="form-control" value="location_image" name="field"
                                                            type="hidden" id="field">
                                                        <input style="display: none;"
                                                            onchange="uploadImageLocationEdit(this.form);"
                                                            class="form-control" name="file" type="file"
                                                            id="formFile<?php echo $location_id; ?>">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Location Name : </p>
                                                <div class="form-group">
                                                    <input id="location_name  <?php echo $location_id; ?>" type="text"
                                                        name="location_name"
                                                        onchange="updateData(this, '<?php echo $location_id; ?>', 'location_name', 'location', 'location_id');"
                                                        value="<?php echo $row['location_name']; ?>"
                                                        data-parsley-trigger="change" required=""
                                                        placeholder="Enter Category Name" autocomplete="off"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button"
                                                    onclick="permenantdeleteData(<?php echo $row['location_id']; ?>,'location', 'location_id')"
                                                    class="btn btn-light"> <i class="fa-solid fa-trash"></i>
                                                </button>
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
<div class="modal fade" id="LocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background-color: #050c2a;">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Locations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="location_name" id="location_name"
                                placeholder="Location Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input class="form-control" name="file" type="file" id="file">
                        </div>

                </div>
                <div class="modal-footer " style="background-color: #050c2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addLocation(this.form)" name="submit" class="btn btn-info">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>