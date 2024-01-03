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
                            <h1 class="h3 mb-3"><strong>Room Image Gallery (
                                    <?php $count = getAllRoomgalleryImagesCount($_REQUEST['room_id']);
                                    $row = mysqli_fetch_assoc($count);
                                    echo $row['count']; ?>
                                    )
                                </strong></h1>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#RoomGalleryImage">Add
                                New</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill no-background">
                                <div class="row">
                                    <?php
                                    if (isset($_REQUEST['room_id']) && $_REQUEST['room_id'] != '') {
                                        $getall = getAllRoomgalleryImages($_REQUEST['room_id']);

                                        while ($row = mysqli_fetch_assoc($getall)) {

                                            $room_imageid = $row['room_imageid'];
                                            $img = $row['room_image'];
                                            $img_src = "../server/uploads/room_gallery/" . $img; ?>

                                            <div class="col-md-4 mt-4">
                                                <img onclick="permenantdeleteData(<?php echo $row['room_imageid']; ?>, 'room_gallery', 'room_imageid');" width="100%"
                                                    src='<?php echo $img_src; ?>'>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>

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

<div class="modal fade" id="RoomGalleryImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #050c2a;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: white;" id="exampleModalLabel">Room Image Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <input onchange="insertRoomGalleryImage(this.form, <?php echo $_REQUEST['room_id']; ?>);"
                            class="form-control" name="file" type="file" id="formFile">

                    </div>
                </form>
                <div class="modal-footer" style="background-color: #050c2a;">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>